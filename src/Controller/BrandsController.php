<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * Brands Controller
 *
 * @property \App\Model\Table\BrandsTable $Brands
 *
 * @method \App\Model\Entity\Brand[] paginate($object = null, array $settings = [])
 */
class BrandsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        // $brands = $this->paginate($this->Brands);
        $brands = $this->Brands->find('all')->toArray();
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('brands', 'status'));
        $this->set('_serialize', ['brands']);
    }

    /**
     * View method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $brand = $this->Brands->get($id, [
            'contain' => []
        ]);

        $this->set('brand', $brand);
        $this->set('_serialize', ['brand']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $brand = $this->Brands->newEntity();
        if ($this->request->is('post')) {
            if (isset($this->request->data['image']) && !empty($this->request->data['image'])) {
                $this->request->data['image'] = $this->Brands->uploadImage($this->request->data['image']);
            }
            if (isset($this->request->data['image_desktop']) && !empty($this->request->data['image_desktop'])) {
                $this->request->data['image_desktop'] = $this->Brands->uploadImageDesktop($this->request->data['image_desktop']);
            }
            $brand = $this->Brands->patchEntity($brand, $this->request->getData());
            if ($this->Brands->save($brand)) {
                $this->Flash->success(__('The brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The brand could not be saved. Please, try again.'));
        }
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('brand', 'status'));
        $this->set('_serialize', ['brand']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $brand = $this->Brands->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($this->request->data['image_new']['tmp_name']) && !empty($this->request->data['image_new']['tmp_name'])) {
                //unlink('img/brand/' . $brand['image']);
                $this->request->data['image'] = $this->Brands->uploadImage($this->request->data['image_new']);
            }
            if (isset($this->request->data['new_image_desktop']['tmp_name']) && !empty($this->request->data['new_image_desktop']['tmp_name'])) {
                //unlink('img/brand/' . $brand['image']);
                $this->request->data['image_desktop'] = $this->Brands->uploadImageDesktop($this->request->data['new_image_desktop']);
            }
            $brand = $this->Brands->patchEntity($brand, $this->request->getData());
            if ($this->Brands->save($brand)) {
                $this->Flash->success(__('The brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The brand could not be saved. Please, try again.'));
        }
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('brand', 'status'));
        $this->set('_serialize', ['brand']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $brand = $this->Brands->get($id);
        if ($this->Brands->delete($brand)) {
            $this->Flash->success(__('The brand has been deleted.'));
        } else {
            $this->Flash->error(__('The brand could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
