<?php
namespace App\Controller\MerchantApi;

use App\Controller\MerchantApi\ApiController;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Network\Exception\ConflictException;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\InternalErrorException;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Collection\Collection;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Routing\Router;

/**
* Legacy Redemptions Controller
*
* @property \App\Model\Table\LegacyRedemptionsTable $legacyRedemptions
*/
class UsersController extends ApiController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}
	public function view($id)
	{
		if (!$this->request->is(['get'])) {
			throw new MethodNotAllowedException(__('BAD_REQUEST'));
		}
		$user = $this->Users->findById($id)->contain(['UserAddress','UserBusinessBasicDetails.UserBusinessContactDetails'])->first();
		if(!$user){
			throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','User'));
		}
		$data =array();
		$data['status']=true;
		$data['data']=$user;
		$this->set('data',$data['data']);
		$this->set('status',$data['status']);
		$this->set('_serialize', ['status','data']);
	}
	public function index()
	{
		if (!$this->request->is(['get'])) {
			throw new MethodNotAllowedException(__('BAD_REQUEST'));
		}
		$user = $this->Users->find()->contain(['UserAddress','UserBusinessBasicDetails.UserBusinessContactDetails'])->toArray();
		$data =array();
		$data['status']=true;
		$data['data']=$user;
		$this->set('data',$data['data']);
		$this->set('status',$data['status']);
		$this->set('_serialize', ['status','data']);
	}
	public function edit($id)
	{
		if (!$this->request->is(['get'])) {
			throw new MethodNotAllowedException(__('BAD_REQUEST'));
		}
		$requestData = $this->request->data;
		$user = $this->Users->findById($id)->first();
		if(!$user){
			throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','User'));
		}
		$data =array();
		$data['status']=true;
		$data['data']=$user;
		$this->set('data',$data['data']);
		$this->set('status',$data['status']);
		$this->set('_serialize', ['status','data']);
	}
}
