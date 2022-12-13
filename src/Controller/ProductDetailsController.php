<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * ProductDetails Controller
 *
 * @property \App\Model\Table\ProductDetailsTable $ProductDetails
 *
 * @method \App\Model\Entity\ProductDetail[] paginate($object = null, array $settings = [])
 */
class ProductDetailsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        //   $productDetails = $this->paginate($this->ProductDetails);
        $productDetails = $this->ProductDetails->find('all')->toArray();
        $this->loadModel('Products');
        $Products = $this->Products->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('productDetails', 'status', 'Products'));
        $this->set('_serialize', ['productDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Product Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $productDetail = $this->ProductDetails->get($id, [
            'contain' => []
        ]);

        $this->set('productDetail', $productDetail);
        $this->set('_serialize', ['productDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $productDetail = $this->ProductDetails->newEntity();
        if ($this->request->is('post')) {
            if (isset($this->request->data['cft_img_1']) && !empty($this->request->data['cft_img_1'])) {
                $this->request->data['cft_img_1'] = $this->ProductDetails->uploadImage1($this->request->data['cft_img_1']);
            }
            if (isset($this->request->data['cft_img_2']) && !empty($this->request->data['cft_img_2'])) {
                $this->request->data['cft_img_2'] = $this->ProductDetails->uploadImage2($this->request->data['cft_img_2']);
            }
             if (isset($this->request->data['sizes']) && !empty($this->request->data['sizes'])) {
                $this->request->data['sizes'] = $this->ProductDetails->uploadImageSizes($this->request->data['sizes']);
            }
             if (isset($this->request->data['varient']) && !empty($this->request->data['varient'])) {
                $this->request->data['varient'] = $this->ProductDetails->uploadImageVarient($this->request->data['varient']);
            }
            if (isset($this->request->data['color_image']) && !empty($this->request->data['color_image'])) {
                $this->request->data['color_image'] = $this->ProductDetails->uploadImage3($this->request->data['color_image']);
            }
            if (isset($this->request->data['install_img']) && !empty($this->request->data['install_img'])) {
                $this->request->data['install_img'] = $this->ProductDetails->uploadImage4($this->request->data['install_img']);
            }
            $productDetail = $this->ProductDetails->patchEntity($productDetail, $this->request->getData());
            if ($this->ProductDetails->save($productDetail)) {
                $this->Flash->success(__('The product detail has been saved.'));
                return $this->redirect(['controller' => 'ProductDetails', 'action' => 'index']);
            }
            $this->Flash->error(__('The product detail could not be saved. Please, try again.'));
        }
        $this->loadModel('Products');
        $Products = $this->Products->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('productDetail', 'status', 'Products'));
        $this->set('_serialize', ['productDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $productDetail = $this->ProductDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($this->request->data['cft_img_1_new']['tmp_name']) && !empty($this->request->data['cft_img_1_new']['tmp_name'])) {
                //unlink('img/product/details/cft/' . $productDetail['cft_img_1']);
                $this->request->data['cft_img_1'] = $this->ProductDetails->uploadImage1($this->request->data['cft_img_1_new']);
            }
            if (isset($this->request->data['cft_img_2_new']['tmp_name']) && !empty($this->request->data['cft_img_2_new']['tmp_name'])) {
                //unlink('img/product/details/cft/' . $productDetail['cft_img_2']);
                $this->request->data['cft_img_2'] = $this->ProductDetails->uploadImage2($this->request->data['cft_img_2_new']);
            }
             if (isset($this->request->data['sizes_new']['tmp_name']) && !empty($this->request->data['sizes_new']['tmp_name'])) {
                $this->request->data['sizes'] = $this->ProductDetails->uploadImageSizes($this->request->data['sizes_new']);
            }
             if (isset($this->request->data['varient_new']['tmp_name']) && !empty($this->request->data['varient_new']['tmp_name'])) {              
                $this->request->data['varient'] = $this->ProductDetails->uploadImageVarient($this->request->data['varient_new']);
            }
            if (isset($this->request->data['color_image_new']['tmp_name']) && !empty($this->request->data['color_image_new']['tmp_name'])) {
                //unlink('img/product/details/csn/' . $productDetail['csn_img_1']);
                $this->request->data['color_image'] = $this->ProductDetails->uploadImage3($this->request->data['color_image_new']);
            }
            if (isset($this->request->data['install_img_new']['tmp_name']) && !empty($this->request->data['install_img_new']['tmp_name'])) {
                $this->request->data['install_img'] = $this->ProductDetails->uploadImage4($this->request->data['install_img_new']);
            }
            $productDetail = $this->ProductDetails->patchEntity($productDetail, $this->request->getData());
            if ($this->ProductDetails->save($productDetail)) {
                $this->Flash->success(__('The product detail has been saved.'));
                return $this->redirect(['controller' => 'ProductDetails', 'action' => 'index']);
            }
            $this->Flash->error(__('The product detail could not be saved. Please, try again.'));
        }
        $this->loadModel('Products');
        $Products = $this->Products->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('productDetail', 'status', 'Products'));
        $this->set('_serialize', ['productDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $productDetail = $this->ProductDetails->get($id);
        if ($this->ProductDetails->delete($productDetail)) {
            $this->Flash->success(__('The product detail has been deleted.'));
        } else {
            $this->Flash->error(__('The product detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
