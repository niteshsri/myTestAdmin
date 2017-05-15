<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BusinessCategory Controller
 *
 * @property \App\Model\Table\BusinessCategoryTable $BusinessCategory
 */
class BusinessCategoryController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $businessCategory = $this->paginate($this->BusinessCategory);

        $this->set(compact('businessCategory'));
        $this->set('_serialize', ['businessCategory']);
    }

    /**
     * View method
     *
     * @param string|null $id Business Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $businessCategory = $this->BusinessCategory->get($id, [
            'contain' => ['UserBusinessBasicDetails']
        ]);

        $this->set('businessCategory', $businessCategory);
        $this->set('_serialize', ['businessCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $businessCategory = $this->BusinessCategory->newEntity();
        if ($this->request->is('post')) {
            $businessCategory = $this->BusinessCategory->patchEntity($businessCategory, $this->request->getData());
            if ($this->BusinessCategory->save($businessCategory)) {
                $this->Flash->success(__('The business category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business category could not be saved. Please, try again.'));
        }
        $this->set(compact('businessCategory'));
        $this->set('_serialize', ['businessCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Business Category id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $businessCategory = $this->BusinessCategory->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $businessCategory = $this->BusinessCategory->patchEntity($businessCategory, $this->request->getData());
            if ($this->BusinessCategory->save($businessCategory)) {
                $this->Flash->success(__('The business category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business category could not be saved. Please, try again.'));
        }
        $this->set(compact('businessCategory'));
        $this->set('_serialize', ['businessCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Business Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $businessCategory = $this->BusinessCategory->get($id);
        if ($this->BusinessCategory->delete($businessCategory)) {
            $this->Flash->success(__('The business category has been deleted.'));
        } else {
            $this->Flash->error(__('The business category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
