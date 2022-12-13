<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * AboutUs Controller
 *
 * @property \App\Model\Table\AboutUsTable $AboutUs
 *
 * @method \App\Model\Entity\AboutU[] paginate($object = null, array $settings = [])
 */
class AboutUsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        //   $aboutUs = $this->paginate($this->AboutUs);
        $aboutUs = $this->AboutUs->find('all')->toArray();
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('aboutUs', 'status'));
        $this->set('_serialize', ['aboutUs']);
    }

    /**
     * View method
     *
     * @param string|null $id About U id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $aboutU = $this->AboutUs->get($id, [
            'contain' => []
        ]);

        $this->set('aboutU', $aboutU);
        $this->set('_serialize', ['aboutU']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $aboutU = $this->AboutUs->newEntity();
        if ($this->request->is('post')) {
            if (isset($this->request->data['image_1']) && !empty($this->request->data['image_1'])) {
                $this->request->data['image_1'] = $this->AboutUs->uploadImage1($this->request->data['image_1']);
            }
            if (isset($this->request->data['image_2']) && !empty($this->request->data['image_2'])) {
                $this->request->data['image_2'] = $this->AboutUs->uploadImage2($this->request->data['image_2']);
            }
            $aboutU = $this->AboutUs->patchEntity($aboutU, $this->request->getData());
            if ($this->AboutUs->save($aboutU)) {
                $this->Flash->success(__('The about u has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The about u could not be saved. Please, try again.'));
        }
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('aboutU', 'status'));
        $this->set('_serialize', ['aboutU']);
    }

    /**
     * Edit method
     *
     * @param string|null $id About U id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $aboutU = $this->AboutUs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($this->request->data['image_1_new']['tmp_name']) && !empty($this->request->data['image_1_new']['tmp_name'])) {
                //unlink('img/about_us/' . $aboutU['image_1']);
                $this->request->data['image_1'] = $this->AboutUs->uploadImage1($this->request->data['image_1_new']);
            }
            if (isset($this->request->data['image_2_new']['tmp_name']) && !empty($this->request->data['image_2_new']['tmp_name'])) {
                //unlink('img/about_us/' . $aboutU['image_2']);
                $this->request->data['image_2'] = $this->AboutUs->uploadImage2($this->request->data['image_2_new']);
            }
            $aboutU = $this->AboutUs->patchEntity($aboutU, $this->request->getData());
            if ($this->AboutUs->save($aboutU)) {
                $this->Flash->success(__('The about u has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The about u could not be saved. Please, try again.'));
        }
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('aboutU', 'status'));
        $this->set('_serialize', ['aboutU']);
    }

    /**
     * Delete method
     *
     * @param string|null $id About U id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $aboutU = $this->AboutUs->get($id);
        if ($this->AboutUs->delete($aboutU)) {
            $this->Flash->success(__('The about u has been deleted.'));
        } else {
            $this->Flash->error(__('The about u could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
