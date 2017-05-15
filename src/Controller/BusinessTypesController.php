<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BusinessTypes Controller
 *
 * @property \App\Model\Table\BusinessTypesTable $BusinessTypes
 */
class BusinessTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $businessTypes = $this->paginate($this->BusinessTypes);

        $this->set(compact('businessTypes'));
        $this->set('_serialize', ['businessTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Business Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $businessType = $this->BusinessTypes->get($id, [
            'contain' => ['UserBusinessBasicDetails']
        ]);

        $this->set('businessType', $businessType);
        $this->set('_serialize', ['businessType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $businessType = $this->BusinessTypes->newEntity();
        if ($this->request->is('post')) {
            $businessType = $this->BusinessTypes->patchEntity($businessType, $this->request->getData());
            if ($this->BusinessTypes->save($businessType)) {
                $this->Flash->success(__('The business type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business type could not be saved. Please, try again.'));
        }
        $this->set(compact('businessType'));
        $this->set('_serialize', ['businessType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Business Type id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $businessType = $this->BusinessTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $businessType = $this->BusinessTypes->patchEntity($businessType, $this->request->getData());
            if ($this->BusinessTypes->save($businessType)) {
                $this->Flash->success(__('The business type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business type could not be saved. Please, try again.'));
        }
        $this->set(compact('businessType'));
        $this->set('_serialize', ['businessType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Business Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $businessType = $this->BusinessTypes->get($id);
        if ($this->BusinessTypes->delete($businessType)) {
            $this->Flash->success(__('The business type has been deleted.'));
        } else {
            $this->Flash->error(__('The business type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
