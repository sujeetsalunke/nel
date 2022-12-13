<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * ProductColorImages Controller
 *
 * @property \App\Model\Table\ProductColorImagesTable $ProductColorImages
 *
 * @method \App\Model\Entity\ProductColorImage[] paginate($object = null, array $settings = [])
 */
class ProductColorImagesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => []
        ];
        $productColorImages = $this->paginate($this->ProductColorImages);

        $this->set(compact('productColorImages'));
        $this->set('_serialize', ['productColorImages']);
    }

    /**
     * View method
     *
     * @param string|null $id Product Color Image id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $productColorImage = $this->ProductColorImages->get($id, [
            'contain' => ['ProjectDetails']
        ]);

        $this->set('productColorImage', $productColorImage);
        $this->set('_serialize', ['productColorImage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id) {
        if ($this->request->is('post')) {
            $productColorImage = $this->ProductColorImages->newEntity();
            if (isset($this->request->data['image']) && !empty($this->request->data['image'])) {
                $this->request->data['image'] = $this->ProductColorImages->uploadImage($this->request->data['image']);
            }
            $this->request->data['product_detail_id'] = $id;
            $productColorImage = $this->ProductColorImages->patchEntity($productColorImage, $this->request->getData());
            if ($this->ProductColorImages->save($productColorImage)) {
                $this->Flash->success(__('The product color image has been saved.'));

                return $this->redirect(['action' => 'add', $id]);
            }
            $this->Flash->error(__('The product color image could not be saved. Please, try again.'));
            return $this->redirect(['action' => 'add', $id]);
        }
        $productColorImages = $this->ProductColorImages->find('all')->where(['product_detail_id' => $id])->toArray();
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('productColorImages', 'status', 'id', 'productColorImage'));
        $this->set('_serialize', ['productColorImage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Color Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $product_detail_id = null) {
        $productColorImage = $this->ProductColorImages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($this->request->data['image_new']['tmp_name']) && !empty($this->request->data['image_new']['tmp_name'])) {
                //unlink('img/product/details/color_image/' . $productDetail['image_new']);
                $this->request->data['image'] = $this->ProductColorImages->uploadImage($this->request->data['image_new']);
            }
             $this->request->data['product_detail_id'] = $product_detail_id;
            $productColorImage = $this->ProductColorImages->patchEntity($productColorImage, $this->request->getData());
            if ($this->ProductColorImages->save($productColorImage)) {
                $this->Flash->success(__('The product color image has been saved.'));
                return $this->redirect(['action' => 'add', $product_detail_id]);
            }
            $this->Flash->error(__('The product color image could not be saved. Please, try again.'));
        }
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('status','productColorImage', 'projectDetails'));
        $this->set('_serialize', ['productColorImage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Color Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $product_detail_id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $productColorImage = $this->ProductColorImages->get($id);
        if ($this->ProductColorImages->delete($productColorImage)) {
            $this->Flash->success(__('The product color image has been deleted.'));
        } else {
            $this->Flash->error(__('The product color image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'add', $product_detail_id]);
    }

}
