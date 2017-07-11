<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 */
class MerchantsController extends AppController
{

  public function initialize()
  {
    parent::initialize();
    $this->Auth->allow(['index','view']);
  }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->loadComponent('MerchantPanel');
        $users = $this->MerchantPanel->ViewAllMerchants();
        if($users->status){
          $users = $users->data;
        }
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id)
    {
      $this->loadComponent('MerchantPanel');
      $user = $this->MerchantPanel->ViewMerchantInfo($id);

      if($user->status){
        $user = $user->data;
      }
      $this->set(compact('user'));
      $this->set('_serialize', ['user']);
    }
 /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function updateBankDetail()
    {
      $this->loadComponent('MerchantPanel');
      $user = $this->MerchantPanel->ViewMerchantInfo($id);

      if($user->status){
        $user = $user->data;
      }
      $this->set(compact('user'));
      $this->set('_serialize', ['user']);
    }

    
}
