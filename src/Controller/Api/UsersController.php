<?php
namespace App\Controller\Api\User;

use App\Controller\Api\User\ApiController;
use App\Controller\Api\ApiHelper;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Network\Exception\ConflictException;
use Cake\Network\Exception\InternalErrorException;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;
use Cake\I18n\Time;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\Log\Log;

/**
* Users Controller
*
* @property \App\Model\Table\UsersTable $Users
*/
class UsersController extends ApiController
{

  const USER_LABEL='user';

  public function initialize()
  {
    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->Auth->allow(['login']);
    $this->Auth->allow(['add','login','fbLogin','forgotPassword','resetPassword','bulkAdd']);
  }

  public function index()
  {
    if (!$this->request->is(['get'])) {
      throw new MethodNotAllowedException(__('BAD_REQUEST'));
    }
    $userId = $this->Auth->user('id');
    $vendorId = $this->request->query('vendor_id');
    $user = $this->Users->findById($userId)->contain(['SocialProfiles','UserCards','Activities.Vendors','Activities.Services','Activities.RewardMethods','Activities.UserInstantRedemptions',
    'Activities' => [
      'strategy' => 'select',
      'queryBuilder' => function ($q) use ($vendorId) {
        if($vendorId){
          return $q->where(['Activities.vendor_id'=>$vendorId])->order(['Activities.created' =>'DESC']);
        }else{
          return $q->order(['Activities.created' =>'DESC']);
        }
      }
      ]])->first();
      if(!$user){
        throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','User'));
      }

      if($vendorId){
        $this->loadModel('Vendors');
        $vendor = $this->Vendors->findById($vendorId)->first();
        if(!$vendor){
          throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','Vendor'));
        }
      }
      $this->loadModel('RewardMethods');
      $this->loadModel('RewardCredits');
      //find reward methods
      $rewardMethods = $this->RewardMethods->find()->where(['status'=>1])->toArray();
      $walletCreditId = null;
      $storeCreditId = null;
      foreach($rewardMethods as $rewardMethod){
        if($rewardMethod->name == 'wallet_credit'){
          $walletCreditId = $rewardMethod->id;
        }
        if($rewardMethod->name == 'store_credit'){
          $storeCreditId = $rewardMethod->id;
        }
        if(!empty($walletCreditId) && !empty($storeCreditId)){
          break;
        }
      }
      //find wallet credit
      $userWalletCredit = $this->RewardCredits->find()->where(['user_id'=>$userId,'reward_method_id'=>$walletCreditId,'RewardCredits.status'=>1,'RewardCredits.vendor_id'=>$vendorId])->contain(['Vendors']);
      //find store credit
      if($vendorId){
        $userStoreCredit = $this->RewardCredits->find()->where(['user_id'=>$userId,'reward_method_id'=> $storeCreditId,'RewardCredits.status'=>1,'RewardCredits.vendor_id'=>$vendorId])
        ->contain(['Vendors']);
      }else{
        $userStoreCredit = $this->RewardCredits->find()->where(['user_id'=>$userId,'reward_method_id'=> $storeCreditId,'RewardCredits.status'=>1])
        ->contain(['Vendors']);
      }

      $user['totalWalletCredits'] = $userWalletCredit->sumOf('points');
      $user['walletCredits'] = $userWalletCredit->toArray();
      $user['totalStoreCredits'] = $userStoreCredit->sumOf('points');
      $user['storeCredits'] = $userStoreCredit->toArray();
      if($user->guardian_email){
        $linkedAccount = $this->Users->find('all')->where(
        ['OR'=>
        [
          ['email'=>$user->guardian_email],
          ['guardian_email'=>$user->guardian_email]
        ],'id != '=>$user->id
      ]);
    }else{
      $linkedAccount = $this->Users->find('all')->where(['guardian_email'=>$user->email,'id != '=>$user->id]);
    }
    $linkedAccount = ($linkedAccount->toArray());
    $user['linkedAccount'] = $linkedAccount;
    $data =array();
    $data['status']=true;
    $data['data']=$user;
    $this->set('data',$data['data']);
    $this->set('status',$data['status']);
    $this->set('_serialize', ['status','data']);
  }

  /**
  * @api {POST} /api/user/register Registrer new User
  * @apiDescription Registrer new User.
  * @apiVersion 1.1.0
  * @apiName RegisterNewUser
  * @apiGroup User Apis
  *
  * @apiParam {String} name User's Name.
  * @apiParam {String} username Username.
  * @apiParam {String} password contains user's password.
  * @apiParam {String} [email] contains user's email.
  * @apiParam {String} [phone] contains user's phone number.
  * @apiParam {Boolean} [status] Vendor's Status: Enabled or Disabled, By Default Enabled.
  * @apiSuccess {Boolean} status status of the request.
  * @apiSuccess {Array} data cotains response.
  * @apiSuccess {Integer} id cotains user's id.
  *
  * @apiSuccessExample Success-Response:
  * HTTP/1.1 200 OK
  * {
  *     "response": {
  *         "status": true,
  *         "data": {
  *             "id": 11
  *         }
  *     }
  * }
  **/
  public function add()
  {
    if (!$this->request->is(['post'])) {
      throw new MethodNotAllowedException(__('BAD_REQUEST'));
    }
    if(!$this->request->data){
      throw new BadRequestException(__('Request Data not found. Kindly Provide valid Request Data.'));
    }
    $data = $this->request->data;
    if(!isset($data['vendor_id'])){
      throw new BadRequestException(__('MANDATORY_FIELD_MISSING','vendor_id'));
    }
    if((isset($data['vendor_id']) && empty($data['vendor_id']))){
      throw new BadRequestException(__('EMPTY_NOT_ALLOWED','vendor_id'));
    }
    $this->loadModel('Vendors');
    $validateVendor  = $this->Vendors->find()->where(['id'=>$data['vendor_id'],'status'=>1])->first();
    if(!$validateVendor){
      throw new BadRequestException(__('INVALID_VENDOR'));
    }
    if(isset($this->request->data['fb_identifier']) && !empty($this->request->data['fb_identifier'])){
      $userData = $this->Users->findByFbIdentifier($this->request->data['fb_identifier'])->first();
      if($userData){
        throw new ConflictException(__('This Facebook account is already linked with other account. Kindly logIn.'));
      }else{
        $this->request->data['password'] = '12345678';
      }
    }
    if(isset($data['is_email_verified'])){
      throw new BadRequestException(__('ATTR_NOT_ALLOWED','is_email_verified'));
    }
    if(!isset($data['email'])){
      if(!isset($data['username'])){
        throw new BadRequestException(__('MANDATORY_FIELD_MISSING','username'));
      }
      if((isset($data['username']) && empty($data['username']))){
        throw new BadRequestException(__('EMPTY_NOT_ALLOWED','username'));
      }
      if(!isset($data['guardian_email'])){
        throw new BadRequestException(__('MANDATORY_FIELD_MISSING','guardian_email'));
      }
      if((isset($data['guardian_email']) && empty($data['guardian_email']))){
        throw new BadRequestException(__('EMPTY_NOT_ALLOWED','guardian_email'));
      }
    }else{
      if(empty($data['email'])){
        throw new BadRequestException(__('EMPTY_NOT_ALLOWED','email'));
      }
      if(isset($data['username'])){
        throw new BadRequestException(__('ATTR_NOT_ALLOWED','username'));
      }
      if(isset($data['guardian_email'])){
        throw new BadRequestException(__('ATTR_NOT_ALLOWED','guardian_email'));
      }
      $checkExisting = $this->_checkExistingUser($data['email'], $data['vendor_id']);
      if($checkExisting){
        $checkExisting->message = "User already exists. New Vendor user created.";
        $data['status']=true;
        $data['data'] = $checkExisting;
        $this->set('data',$data['data']);
        $this->set('status',$data['status']);
        $this->set('_serialize', ['status','data']);
        return;
      }

      $this->request->data['username']=$data['email'];
    }
    $vendorId = $data['vendor_id'];
    if($vendorId){
      $this->request->data['vendor_users'] = [['vendor_id'=>$vendorId]];
    }
    $associations = ['VendorUsers'];
    if(isset($this->request->data['card_number']) && !empty($this->request->data['card_number'])){
      $cardSeriesData = $this->Vendors->VendorCardSeries->findByVendorId($vendorId)->contain(['ResellerCardSeries'])->first();
      $cardData = array();
      $cardData['series'] ='asdasw'; $cardSeriesData->reseller_card_series->series;
      $cardData['vendor_card_series_id'] = $cardSeriesData->id;
      $cardData['vendor_id'] = $vendorId;
      $cardData['complete_card_number'] ='asdasw'. sprintf("%010d", $this->request->data['card_number']);
      $cardData['card_number'] = sprintf("%010d", $this->request->data['card_number']);
      unset($this->request->data['card_number']);
      $this->request->data['user_cards'] = [$cardData];
      $associations[] = 'UserCards';
    }

    $userData = $this->Users->newEntity($this->request->data,[
      'associated' => $associations]);
    $userData = $this->Users->patchEntity($userData, $this->request->data,[
      'associated' => $associations]);
    if($userData->errors()){
      $this->_sendErrorResponse($userData->errors());
    }

    if ($this->Users->save($userData,['associated' => $associations])) {
      //return response
      $data =array();
      $data['status']=true;
      $data['data'] =$userData;
      $this->set('data',$data['data']);
      $this->set('status',$data['status']);
      $this->set('_serialize', ['status','data']);
    } else {
      if($userData->errors()){
        $this->_sendErrorResponse($userData->errors());
      }else{
        throw new InternalErrorException(__('INTERNAL_SERVER_ERROR'));
      }

    }

  }


  private function _checkExistingUser($userEmail, $vendorId){

    $user = $this->Users
                 ->findByEmail($userEmail)
                 ->contain(['VendorUsers'=> function($q) use($vendorId){
                                              return $q->where(['vendor_id' => $vendorId]);
                                            }
                  ])
                 ->first();
    //Normal flow should be followed if user does not exist or user exists and is associated with the vendor
    if(!$user || (isset($user['vendor_users']) && $user['vendor_users'])){
      return false;
    }

    $vendorUser = [
                    'user_id' => $user->id,
                    'vendor_id' => $vendorId
                  ];

    $vendorUser = $this->Users->VendorUsers->newEntity($vendorUser);

    if(!$this->Users->VendorUsers->save($vendorUser)){

      throw new InternalErrorException("User could not be associated with this Vendor");
    }

    unset($user->vendor_users);

    return $user;

  }
  /**
  * @api {post} /api/user/login Login User
  * @apiVersion 1.1.0
  * @apiName login
  * @apiGroup User Apis
  *
  * @apiParam {String} username username.
  * @apiParam {String} password Users Password.
  *
  * @apiSuccess {Boolean} status status of the request.
  * @apiSuccess {Number} id ID of the User.
  * @apiSuccess {String} token  Auth Token.
  *
  * @apiSuccessExample Success-Response:
  *     HTTP/1.1 200 OK
  *     {
  *      "response": {
  *                    "status": true,
  *                    "data": {
  *                             "id": 7,
  *                             "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjcsImV4cCI6MTQ3MDc0NDI5MX0.i1Jxt5__1oOlmltXoOVIC-17f4rM48nl4uzkahWmU1c"
  *                            }
  *                  }
  *     }
  *
  */
  public function login()
  {
    if (!$this->request->is(['post'])) {
      throw new MethodNotAllowedException(__('BAD_REQUEST'));
    }
    $authToken =  $this->request->header('Authorization');
    if(!$authToken){
      throw new UnauthorizedException(__('INVALID_TOKEN_PROVIDED'));
    }
    $authToken = explode(' ', $authToken);
    //validate basic token
    if(!isset($authToken[0]) || (isset($authToken[0]) && empty($authToken[0])) || strtolower($authToken[0])!='basic'){
      throw new UnauthorizedException(__('INVALID_TOKEN_PROVIDED'));
    }
    if(!isset($authToken[1]) || (isset($authToken[1]) && empty($authToken[1]))){
      throw new UnauthorizedException(__('INVALID_TOKEN_PROVIDED'));
    }
    //check for token element which will be present at 1st index
    $authToken = $authToken[1];
    //decode token
    $resellerTokenData = base64_decode($authToken,true);

    //extract client id and client secret
    $resellerTokenData = explode(':',$resellerTokenData);
    //validate token data
    if(!ApiHelper::strictValidate($resellerTokenData,'0') && !ApiHelper::strictValidate($resellerTokenData,'1')){
      throw new UnauthorizedException(__('INVALID_TOKEN_PROVIDED'));
    }
    $this->request->data['username'] = $resellerTokenData[0];
    $this->request->data['password'] = $resellerTokenData[1];
    // pr($this->request);

    $data =array();
    $user = $this->Auth->identify();

    if (!$user) {
      throw new NotFoundException(__('LOGIN_FAILED'));
    }
    //if user is identified and his role is User then create user session

    //find role id
    $this->loadModel('Roles');
    //verify user role
    $user['role']=$query = $this->Roles->find('RolesById',['role' =>$user['role_id']])->select(['name','label'])->first();
    //if user role is not USER the logout
    // $X = $this->Auth->logout();
    if( empty($query) || $query->name!=self::USER_LABEL){
      throw new UnauthorizedException(__('UNAUTHORIZED_REQUEST'));
    }else{
      // if user is disabled then log out
      if((!$user['status'])){
        throw new UnauthorizedException(__('UNAUTHORIZED_REQUEST_USER_DISABLED'));
      }
      //login user, create a token and create session for the user
      $time = time() + 900;
      $expTime = Time::createFromTimestamp($time);
      $expTime = $expTime->format('Y-m-d H:i:s');
      $data['status']=true;
      $data['data']['id']=$user['id'];
      $data['data']['token']=JWT::encode([
          'sub' => $user['id'],
          'exp' =>  $time,
          'application_mode'=>Configure::read('PeopleHub.application_mode'),
          'application_env'=>Configure::read('PeopleHub.application_env'),
          'aplicaition_base_url'=>$this->request->env('REQUEST_SCHEME').'://'.$this->request->env('SERVER_NAME').$this->request->base,
          'ref_base_url'=>$this->request->header('Referer')
          ],Security::salt());
      $data['data']['expires']=$expTime;
      $this->set('data',$data['data']);
      $this->set('status',$data['status']);
      $this->set('_serialize', ['status','data']);
    }


  }


  public function switchUserAccount()
  {
    if (!$this->request->is(['post'])) {
      throw new MethodNotAllowedException(__('BAD_REQUEST'));
    }

    if(!$this->request->data){
      throw new BadRequestException(__('Request Data not found. Kindly Provide valid Request Data.'));
    }
    $reqData = $this->request->data;

    if(!isset($reqData['account_id'])){
      throw new BadRequestException(__('MANDATORY_FIELD_MISSING','account_id'));
    }
    if(isset($reqData['account_id']) && empty($reqData['account_id'])){
      throw new BadRequestException(__('EMPTY_NOT_ALLOWED','account_id'));
    }
    $id = $this->Auth->user('id');
    $data =array();
    $user = $this->Users->findById($id)->first();
    if(!$user){
      throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','User'));
    }
    // pr($user);die;
    if($user->guardian_email){
      $linkedAccount = $this->Users->find('all')->where(
      ['OR'=>
      [
        ['email'=>$user->guardian_email],
        ['guardian_email'=>$user->guardian_email]
      ],'id != '=>$user->id,'status'=>1
      ])->all();
    }else{
      $linkedAccount = $this->Users->find('all')->where(['guardian_email'=>$user->email,'id != '=>$user->id,'status'=>1])->all();
    }
    // pr($linkedAccount);die;
    $collection = new Collection($linkedAccount);
    $accounts = $collection->extract('id')->toArray();

    if(!in_array($reqData['account_id'], $accounts)){
      throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','User Account'));
    }
    $user = $this->Users->findById($reqData['account_id'])->first();

    // if user is disabled then log out
    if((!$user['status'])){
      throw new UnauthorizedException(__('UNAUTHORIZED_REQUEST_USER_DISABLED'));
    }
    //login user, create a token and create session for the user
    $time = time() + 900;
    $expTime = Time::createFromTimestamp($time);
    $expTime = $expTime->format('Y-m-d H:i:s');
    $data['status']=true;
    $data['data']['id']=$user->id;
    $data['data']['token']=JWT::encode(['sub' => $user->id,'exp' =>  $time],Security::salt());
    $data['data']['expires']=$expTime;
    $this->set('data',$data['data']);
    $this->set('status',$data['status']);
    $this->set('_serialize', ['status','data']);
  }

  /**
  * @api {post} /api/user/fbLogin Login User Via Facebook
  * @apiVersion 1.1.0
  * @apiName fbLogin
  * @apiGroup User Apis
  *
  * @apiParam {String} fbId contains facebook id.
  *
  * @apiSuccess {Boolean} status status of the request.
  * @apiSuccess {Number} id ID of the User.
  * @apiSuccess {String} token  Auth Token.
  *
  * @apiSuccessExample Success-Response:
  *     HTTP/1.1 200 OK
  *     {
  *      "response": {
  *                    "status": true,
  *                    "data": {
  *                             "id": 7,
  *                             "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjcsImV4cCI6MTQ3MDc0NDI5MX0.i1Jxt5__1oOlmltXoOVIC-17f4rM48nl4uzkahWmU1c"
  *                            }
  *                  }
  *     }
  *
  */
  public function fbLogin()
  {
    if (!$this->request->is(['post'])) {
      throw new MethodNotAllowedException(__('BAD_REQUEST'));
    }

    if(!$this->request->data){
      throw new BadRequestException(__('Request Data not found. Kindly Provide valid Request Data.'));
    }
    $data = $this->request->data;

    if(!isset($data['fbId'])){
      throw new BadRequestException(__('MANDATORY_FIELD_MISSING','fbId'));
    }
    if(isset($data['fbId']) && empty($data['fbId'])){
      throw new BadRequestException(__('EMPTY_NOT_ALLOWED','fbId'));
    }
    $user = $this->Users->find()->where(['fb_identifier'=>$this->request->data['fbId'] ])->first();
    if (!$user) {
      throw new NotFoundException(__('LOGIN_FAILED'));
    }
    //if user is identified and his role is User then create user session

    //find role id
    $this->loadModel('Roles');
    //verify user role
    $user['role']=$query = $this->Roles->find('RolesById',['role' =>$user['role_id']])->select(['name','label'])->first();
    //if user role is not USER the logout
    $this->Auth->logout();
    if( empty($query) || $query->name!=self::USER_LABEL){
      throw new UnauthorizedException(__('UNAUTHORIZED_REQUEST'));
    }else{
      // if user is disabled then log out
      if(!$user['status']){
        throw new UnauthorizedException(__('UNAUTHORIZED_REQUEST_USER_DISABLED'));
      }
      //login user, create a token and create session for the user
      $time = Time::createFromTimestamp(time() + 900);
      $time = $time->format('Y-m-d H:i:s');
      $data['status']=true;
      $data['data']['id']=$user['id'];
      $data['data']['token']=JWT::encode(['sub' => $user['id'],'exp' =>  time() + 604800],Security::salt());
      $data['data']['expires']=$time;
      Cache::write($data['data']['token'],$user['id'],'u_t');
      $this->set('data',$data['data']);
      $this->set('status',$data['status']);
      $this->set('_serialize', ['status','data']);
    }


  }

  /**
  * @api {post} /users/logout Logout User
  * @apiVersion 1.1.0
  * @apiName logout
  * @apiGroup User Apis
  *
  * @apiHeader {String} token users's Access Token
  * @apiSuccessExample Success-Response:
  *     HTTP/1.1 200 OK
  *     {
  *   "response": {
  *   "status": true,
  *   "data": {
  *          "message": "User Logged out Successfully"
  *          }
  *      }
  *   }
  */

  /**
  * This method is used to logout user and to remove session
  * @return Mixed return array if user is logged out else throws error
  */
  public function logout()
  {

    if (!$this->request->is(['post'])) {
      throw new MethodNotAllowedException(__('BAD_REQUEST'));
    }
    //validate token
    $userId = $this->Auth->user('id');
    $this->Auth->logout();
    $data =array();
    $data['status']=true;
    $data['data']['message']='User Logged out Successfully';
    $this->set('data',$data['data']);
    $this->set('status',$data['status']);
    $this->set('_serialize', ['status','data']);

  }

  /**
  * Edit method
  *
  * @param string|null $id User id.
  * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function edit($id = null)
  {
    if (!$this->request->is(['put'])) {
      throw new MethodNotAllowedException(__('BAD_REQUEST'));
    }

    $userId = $this->Auth->user('id');

    if(!$this->request->data){
      throw new BadRequestException(__('Request Data not found. Kindly Provide valid Request Data.'));
    }
    $user = $this->Users->findById($id)->first();
    if(!$user){
      throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','User'));
    }
    if(isset($this->request->data['fb_identifier']) && !empty($this->request->data['fb_identifier'])){
      $userData = $this->Users->findByFbIdentifier($this->request->data['fb_identifier'])->first();
      if($userData){
        if($userData->id != $id){
          throw new ConflictException(__('This Facebook account is already linked with other account. Kindly Logout with current Facebook account.'));
        }
      }
    }
    if(isset($this->request->data['username'])){
      if((isset($this->request->data['username']) && empty($this->request->data['username']))){
        throw new BadRequestException(__('EMPTY_NOT_ALLOWED','username'));
      }
      //if((isset($this->request->data['phone']) && empty($this->request->data['phone']))){
      //throw new BadRequestException(__('EMPTY_NOT_ALLOWED','phone'));
      //}
      //if(!isset($this->request->data['reason']) && !$user->reason){
      //throw new BadRequestException(__('MANDATORY_FIELD_MISSING','reason'));
      //}
      //if((isset($this->request->data['reason']) && empty($this->request->data['reason']))){
      //throw new BadRequestException(__('EMPTY_NOT_ALLOWED','reason'));
      //}
      if(!isset($this->request->data['guardian_email']) && !$user->guardian_email){
        throw new BadRequestException(__('MANDATORY_FIELD_MISSING','guardian_email'));
      }
      if((isset($this->request->data['guardian_email']) && empty($this->request->data['guardian_email']))){
        throw new BadRequestException(__('EMPTY_NOT_ALLOWED','guardian_email'));
      }
      $this->request->data['email'] = null;
    }else if(isset($this->request->data['email'])){
      if(empty($this->request->data['email'])){
        throw new BadRequestException(__('EMPTY_NOT_ALLOWED','email'));
      }
      if(isset($this->request->data['username'])){
        throw new BadRequestException(__('ATTR_NOT_ALLOWED','username'));
      }
      //if(isset($this->request->data['reason'])){
      //throw new BadRequestException(__('ATTR_NOT_ALLOWED','reason'));
      //}
      if(isset($this->request->data['guardian_email'])){
        throw new BadRequestException(__('ATTR_NOT_ALLOWED','guardian_email'));
      }
      //if(isset($this->request->data['relationship_id'])){
      //throw new BadRequestException(__('ATTR_NOT_ALLOWED','relationship_id'));
      //}
      $this->request->data['reason'] = null;
      $this->request->data['guardian_email'] =null;
      $this->request->data['relationship_id'] = null;
      $this->request->data['username']=$this->request->data['email'];
    }else{
      if(isset($this->request->data['password'])){
        $hasher = new DefaultPasswordHasher();
        if(!isset($this->request->data['old_password'])){
          throw new BadRequestException(__('MANDATORY_FIELD_MISSING','old_password'));
        }
        if((isset($this->request->data['old_password']) && empty($this->request->data['old_password']))){
          throw new BadRequestException(__('EMPTY_NOT_ALLOWED','old_password'));
        }
        if(($this->request->data['old_password']) == ($this->request->data['password'])){
          throw new BadRequestException(__('You are not allowed to use old password as new password.'));
        }
        if(! preg_match("/^[A-Za-z0-9~!@#$%^*&;?.+_]{8,}$/", $this->request->data['password'])){
          throw new BadRequestException(__('Only numbers 0-9, alphabets a-z A-Z and special characters ~!@#$%^*&;?.+_ are allowed.'));
        }
        if(!$hasher->check($this->request->data['old_password'],$user->password)){
          throw new BadRequestException(__('UNAUTHORIZED_PROVIDE_OLD_PASSWORD'));
        }
      }
      if(isset($this->request->data['old_password'])){
        if(!isset($this->request->data['password'])){
          throw new BadRequestException(__('MANDATORY_FIELD_MISSING','password'));
        }
        if((isset($this->request->data['password']) && empty($this->request->data['password']))){
          throw new BadRequestException(__('EMPTY_NOT_ALLOWED','password'));
        }
      }
    }

    $user = $this->Users->patchEntity($user, $this->request->data);

    if($user->errors()){
      $this->_sendErrorResponse($user->errors());
    }
    if ($this->Users->save($user)) {
      $data =array();
      $data['status']=true;
      $data['data']=$user;
      $this->set('data',$data['data']);
      $this->set('status',$data['status']);
      $this->set('_serialize', ['status','data']);
    }else{
      if($user->errors()){
        $this->_sendErrorResponse($user->errors());
      }else{
        throw new InternalErrorException(__('INTERNAL_SERVER_ERROR'));
      }


    }
  }

  /**
  * Delete method
  *
  * @param string|null $id User id.
  * @return \Cake\Network\Response|null Redirects to index.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function delete($id = null)
  {
    throw new NotFoundException(__('BAD_REQUEST'));
  }

  /**
  * View method
  *
  * @param string|null $id User id.
  * @return \Cake\Network\Response|null Redirects to index.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function view($id = null)
  {
    throw new NotFoundException(__('BAD_REQUEST'));
  }

  protected function _createResetPasswordHash($userId,$uuid){
    $this->loadModel('ResetPasswordHashes');
    $hasher = new DefaultPasswordHasher();
    $reqData = ['user_id'=>$userId,'hash'=> $hasher->hash($uuid)];
    $createPasswordhash = $this->ResetPasswordHashes->newEntity($reqData);
    $createPasswordhash = $this->ResetPasswordHashes->patchEntity($createPasswordhash,$reqData);
    if($this->ResetPasswordHashes->save($createPasswordhash)){
      return $createPasswordhash->hash;
    }else{
      Log::write('error','error in creating resetpassword hash for user id '.$userId);
      Log::write('error',$createPasswordhash);
    }
    return false;
  }

  public function forgotPassword()
  {
    if (!$this->request->is('post')) {
      throw new MethodNotAllowedException(__('BAD_REQUEST'));
    }
    $data = $this->request->data;
    if(isset($data['ref']) && empty($data['ref'])){
      throw new BadRequestException(__('EMPTY_NOT_ALLOWED','ref'));
    }
    if(!isset($data['ref'])){
      throw new BadRequestException(__('MANDATORY_FIELD_MISSING','ref'));
    }
    if(isset($data['username']) && empty($data['username'])){
      throw new BadRequestException(__('EMPTY_NOT_ALLOWED','username'));
    }
    if(!isset($data['username'])){
      throw new BadRequestException(__('MANDATORY_FIELD_MISSING','username'));
    }
    $username = $this->request->data['username'];
    $user = $this->Users->find('all')->where(['username'=>$username])->first();
    if(!$user){
      throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','Username'));
    }
    $activeEmail = $user->email;
    if(!$activeEmail){
      $activeEmail = $user->guardian_email;
    }

    $this->loadModel('ResetPasswordHashes');
    $checkExistPasswordHash = $this->ResetPasswordHashes->find()->where(['user_id'=>$user->id])->first();

    if(empty($checkExistPasswordHash)){
      $resetPwdHash = $this->_createResetPasswordHash($user->id,$user->uuid);
    }else{
      $resetPwdHash = $checkExistPasswordHash->hash;
      $time = new Time($checkExistPasswordHash->created);
      if(!$time->wasWithinLast(1)){
        $this->ResetPasswordHashes->delete($checkExistPasswordHash);
        $resetPwdHash =$this->_createResetPasswordHash($user->id,$user->uuid);
      }
    }

    $url = urlencode($data['ref'].'reset-password?reset-token='.$resetPwdHash);
    $data =array();
    $data['status']=true;
    $data['data']['token']=$resetPwdHash;
    $data['data']['url']=$url;
    $data['data']['name']=$user->name;
    $data['data']['email']=$activeEmail;

    $this->set('data',$data['data']);
    $this->set('status',$data['status']);
    $this->set('_serialize', ['status','data']);
  }


  public function resetPassword()
  {
    if ($this->request->is('post')) {
      $uuid = (isset($this->request->data['reset-token']))?$this->request->data['reset-token']:'';
      if(!$uuid){
        throw new BadRequestException(__('BAD_REQUEST'));
      }
      $password = (isset($this->request->data['new_password']))?$this->request->data['new_password']:'';
      if(!$password){
        throw new BadRequestException(__('PROVIDE_PASSWORD'));
      }
      $cnfPassword = (isset($this->request->data['cnf_password']))?$this->request->data['cnf_password']:'';
      if(!$cnfPassword){
        throw new BadRequestException(__('CONFIRM_PASSWORD'));
      }
      if($password !== $cnfPassword){
        throw new BadRequestException(__('MISMATCH_PASSWORD'));
      }

      $this->loadModel('ResetPasswordHashes');
      $checkExistPasswordHash = $this->ResetPasswordHashes->find()->where(['hash'=>$uuid])->first();
      if(!$checkExistPasswordHash){
        throw new BadRequestException(__('INVALID_RESET_PASSWORD'));
      }

      $userUpdate = $this->Users->findById($checkExistPasswordHash->user_id)->first();
      if(!$userUpdate){
        throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','User'));
      }
      if(! preg_match("/^[A-Za-z0-9~!@#$%^*&;?.+_]{8,}$/", $password)){
        throw new BadRequestException(__('PASSWORD_CONDITION'));
      }
      $isContainChars = false;
      for( $i = 0; $i <= strlen($userUpdate->username)-3; $i++ ) {
        $char = substr( $userUpdate->username, $i, 3 );
        if(strpos($password,$char,0) !== false ){
          $isContainChars = true;
          break;
        }
      }
      if($isContainChars){
        throw new BadRequestException(__('PASSWORD_USER_CONDITION'));
      }
      $fullname = $userUpdate->full_name;
      for( $i = 0; $i <= strlen($fullname)-3; $i++ ) {
        $char = substr( $fullname, $i, 3 );
        if(strpos($password,$char,0) !== false ){
          $isContainChars = true;
          break;
        }
      }
      if($isContainChars){
        throw new BadRequestException(__('PASSWORD_NAME_CONDITION'));
      }
      $this->loadModel('UserOldPasswords');
      $hasher = new DefaultPasswordHasher();
      $userOldPasswordCheck = $this->UserOldPasswords->find('all')->where(['user_id'=>$checkExistPasswordHash->user_id])->toArray();
      foreach ($userOldPasswordCheck as $key => $value) {
        if($hasher->check( $password,$value['password'])){
          throw new BadRequestException(__('SIX_EARLIER_PASSWORD'));
        }
      }
      // pr($userUpdate);die;
      $reqData = ['password'=>$password];
      $this->loadModel('UserOldPasswords');
      $userOldPasswordCheck = $this->UserOldPasswords->find('all')->where(['user_id'=>$checkExistPasswordHash->user_id])->toArray();
      $hasher = new DefaultPasswordHasher();
      foreach ($userOldPasswordCheck as $key => $value) {
        // pr($value);die;
        if($hasher->check( $password,$value['password'])){
          throw new BadRequestException(__('PASSWORD_LIMIT'));
        }
      }
      $userUpdate = $this->Users->patchEntity($userUpdate,$reqData);
      // pr($userUpdate);die;
      if($this->Users->save($userUpdate)){

        $reqData = ['user_id'=>$checkExistPasswordHash->user_id,'password'=>$password];

        $userOldPasswordCheck = $this->UserOldPasswords->newEntity($reqData);
        $userOldPasswordCheck = $this->UserOldPasswords->patchEntity($userOldPasswordCheck, $reqData);
        if($this->UserOldPasswords->save($userOldPasswordCheck)){
          $userOldPasswordCheck = $this->UserOldPasswords->find('all')->where(['user_id'=>$checkExistPasswordHash->user_id]);
          if($userOldPasswordCheck->count() > 6){
            $userOldPasswordCheck =$userOldPasswordCheck->order('created ASC')->first();
            $userOldPasswordCheck = $this->UserOldPasswords->delete($userOldPasswordCheck);

          }
          $this->ResetPasswordHashes->delete($checkExistPasswordHash);
        }else{
          // pr($userOldPasswordCheck->errors());die;
          //log password not changed
          // throw new BadRequestException(__('can not use earlier used 6 passwords'));
        }
        $data =array();
        $data['status']=true;
        $data['data']['id']=$userUpdate->id;
        $data['data']['message']=(__('NEW_PASSWORD_UPDATED'));
        $this->set('data',$data['data']);
        $this->set('status',$data['status']);
        $this->set('_serialize', ['status','data']);
      }else{
        throw new BadRequestException(__('KINDLY_PROVIDE_VALID_DATA'));
      }
    }
  }


}
