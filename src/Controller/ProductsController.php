<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[] paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        // $products = $this->paginate($this->Products);
        $products = $this->Products->find('all')->toArray();
        Configure::load('new_era_industry');
        $this->loadModel('Projects');
        $this->loadModel('Projects');
        $status = Configure::read('new_era_industry.status');
        $projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $this->set(compact('products', 'status', 'projects'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            if (isset($this->request->data['image']) && !empty($this->request->data['image'])) {
                $this->request->data['image'] = $this->Products->uploadImage($this->request->data['image']);
            }
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->loadModel('Projects');
        $this->loadModel('Materials');
        $materials = $this->Materials->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $this->set(compact('materials', 'product', 'status', 'projects'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($this->request->data['image_new']['tmp_name']) && !empty($this->request->data['image_new']['tmp_name'])) {
                //unlink('img/product/main/' . $product['image']);
                $this->request->data['image'] = $this->Products->uploadImage($this->request->data['image_new']);
            }
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->loadModel('Projects');
        $this->loadModel('Materials');
        $materials = $this->Materials->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $this->set(compact('materials', 'product', 'status', 'projects'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function changeStatus($id = null) {
        $Products = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($Products->home_active == 1) {
            $Products->home_active = 0;
        } else {
            $Products->home_active = 1;
        }
        if ($this->Products->save($Products)) {
            if ($Products->home_active == 0) {
                $this->Flash->success(__('The Product has been deactivated.'));
            } else {
                $this->Flash->success(__('The Product has been activated.'));
            }
            return $this->redirect(['action' => 'index']);
        } else {
            if ($Products->home_active == 0) {
                $this->Flash->success(__('The Product could not be deactivated.'));
            } else {
                $this->Flash->success(__('The Product could not be activated.'));
            }
        }
    }

    public function beforeFilter(Event $event1) {
        parent::beforeFilter($event1);
        $this->Auth->allow(['changeStatus']);
    }

}
