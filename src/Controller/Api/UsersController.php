<?php
namespace App\Controller\Api;

use App\Controller\Api\ApiController as ApiController;
use App\Controller\Api\ApiHelper;
use Cake\Utility\Security;
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
    $this->Auth->allow(['index']);
  }

  public function approveUserDetails()
  {
    if (!$this->request->is(['post'])) {
      throw new MethodNotAllowedException(__('BAD_REQUEST'));
    }
    $requestData = $this->request->data;
    if(!$requestData){
      throw new BadRequestException(__('BAD_REQUEST'));
    }
    if(!isset($requestData['data_m']) || (isset($requestData['data_m']) && empty($requestData['data_m']))){
      throw new BadRequestException(__('Kindly provide merchant id'));
    }
     if(!isset($requestData['data_type']) || (isset($requestData['data_type']) && empty($requestData['data_type']))){
      throw new BadRequestException(__('Kindly provide type'));
    }
   
    if(!isset($requestData['data_status'])){
      throw new BadRequestException(__('Kindly provide application status'));
    }
    if(!$requestData['data_status'] && (!isset($requestData['data_remark']) || (isset($requestData['data_remark']) && empty($requestData['data_remark'])))){
      throw new BadRequestException(__('Kindly provide decline remark'));
    }
    $reqData = [];
    if($requestData['data_type'] == 'user'){
      $reqData['id'] = $requestData['data_m'];
      $reqData['emp_id'] = $this->Auth->user('id');
      $reqData['is_approved'] = $requestData['data_status'];
      $reqData['remark'] = (isset($requestData['data_remark']))?$requestData['data_remark']:null;
    }
    if($requestData['data_type'] == 'bank'){
       if(!isset($requestData['data_id']) || (isset($requestData['data_id']) && empty($requestData['data_id']))){
      throw new BadRequestException(__('Kindly provide data id'));
    }
      $reqData['id'] = $requestData['data_m'];
      $reqData['emp_id'] = $this->Auth->user('id');
      $reqData['bank_data']['bank_id'] = $requestData['data_id'];
      $reqData['bank_data']['is_approved'] = $requestData['data_status'];
      $reqData['bank_data']['remark'] =  (isset($requestData['data_remark']))?$requestData['data_remark']:null;
    }
    if($requestData['data_type'] == 'business'){
       if(!isset($requestData['data_id']) || (isset($requestData['data_id']) && empty($requestData['data_id']))){
      throw new BadRequestException(__('Kindly provide data id'));
    }
      $reqData['id'] = $requestData['data_m'];
      $reqData['emp_id'] = $this->Auth->user('id');
      $reqData['bank_data']['business_id'] = $requestData['data_id'];
      $reqData['business_data']['is_approved'] = $requestData['data_status'];
      $reqData['business_data']['remark'] =  (isset($requestData['data_remark']))?$requestData['data_remark']:null;
    }
    $this->loadComponent('MerchantPanel');
        $updateData = $this->MerchantPanel->updateMerchantInfo($requestData['data_m'],$reqData);
    $data =array();
    $this->set('data',$updateData);
    $this->set('_serialize', ['data']);
  }
  
}
