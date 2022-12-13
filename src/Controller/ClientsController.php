<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 *
 * @method \App\Model\Entity\Client[] paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        // $clients = $this->paginate($this->Clients);
        $clients = $this->Clients->find('all')->toArray();
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('clients', 'status'));
        $this->set('_serialize', ['clients']);
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);

        $this->set('client', $client);
        $this->set('_serialize', ['client']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
            if (isset($this->request->data['desktop_image']) && !empty($this->request->data['desktop_image'])) {
                $this->request->data['desktop_image'] = $this->Clients->uploadImage($this->request->data['desktop_image']);
            }
            if (isset($this->request->data['mobile_image']) && !empty($this->request->data['mobile_image'])) {
                $this->request->data['mobile_image'] = $this->Clients->uploadImage1($this->request->data['mobile_image']);
            }
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('client', 'status'));
        $this->set('_serialize', ['client']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($this->request->data['desktop_image_new']['tmp_name']) && !empty($this->request->data['desktop_image_new']['tmp_name'])) {
                //unlink('img/client/' . $client['desktop_image']);
                $this->request->data['desktop_image'] = $this->Clients->uploadImage($this->request->data['desktop_image_new']);
            }
            if (isset($this->request->data['mobile_image_new']['tmp_name']) && !empty($this->request->data['mobile_image_new']['tmp_name'])) {
                //unlink('img/client/' . $client['mobile_image']);
                $this->request->data['mobile_image'] = $this->Clients->uploadImage1($this->request->data['mobile_image_new']);
            }
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('client', 'status'));
        $this->set('_serialize', ['client']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
