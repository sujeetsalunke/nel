<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;

/**
 * Galleries Controller
 *
 * @property \App\Model\Table\GalleriesTable $Galleries
 *
 * @method \App\Model\Entity\Gallery[] paginate($object = null, array $settings = [])
 */
class GalleriesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $galleries = $this->Galleries->find('all',array('order'=>'id DESC'))->toArray();
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->loadModel('Materials');
        $this->loadModel('Categories');
        $this->loadModel('Products');
        $product = $this->Products->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $materials = $this->Materials->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $categories = $this->Categories->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $this->loadModel('Projects');
        $projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $this->set(compact('projects', 'galleries', 'status', 'product', 'materials', 'categories'));
        $this->set('_serialize', ['galleries']);
    }

    /**
     * View method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        // $gallery = $this->Galleries->get($id, [
        //     'contain' => ['Projects', 'Materials', 'Categories']
        // ]);
            // $gallery->order(['id' => 'ASC']);
        // $this->set('gallery', $gallery);
        // $this->set('_serialize', ['gallery']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        if ($this->request->is('post')) {
            if (!empty($this->request->data['data']['image'])) {
                foreach ($this->request->data['data']['image'] as $key => $value) {
                    $gallery = $this->Galleries->newEntity();
                    if (isset($value) && !empty($value)) {
                        $this->request->data['image'] = $this->Galleries->uploadImage($value);
                    }
                    $this->request->data['project_id'] = $this->request->data['project_id'];
                    $this->request->data['material_id'] = $this->request->data['material_id'];
                    $this->request->data['category_id'] = $this->request->data['category_id'];
                    $this->request->data['location'] = $this->request->data['location'];
                    $this->request->data['status'] = $this->request->data['status'];
                    if (!empty($this->request->data['product_id']) && isset($this->request->data['product_id'])) {
                        $this->request->data['product_id'] = $this->request->data['product_id'];
                    }
                    $gallery = $this->Galleries->patchEntity($gallery, $this->request->getData());
                    if ($this->Galleries->save($gallery)) {
                        
                    }
                }
                $this->Flash->success(__('The gallery has been saved.'));
            } else {
                $this->Flash->error(__('The gallery could not be saved. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        }
        $product = $this->Galleries->find('list');
        $materials = $this->Galleries->Materials->find('list');
        $categories = $this->Galleries->Categories->find('list');
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->loadModel('Projects');
        $projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $this->set(compact('projects', 'gallery', 'product', 'materials', 'categories', 'status'));
        $this->set('_serialize', ['gallery']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $gallery = $this->Galleries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($this->request->data['image_new']['tmp_name']) && !empty($this->request->data['image_new']['tmp_name'])) {
                //unlink('img/gallery/' . $gallery['image']);
                $this->request->data['image'] = $this->Galleries->uploadImage($this->request->data['image_new']);
            }
            $gallery = $this->Galleries->patchEntity($gallery, $this->request->getData());
            if ($this->Galleries->save($gallery)) {
                $this->Flash->success(__('The gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gallery could not be saved. Please, try again.'));
        }
        //$product = $this->Galleries->Products->find('list')->where(['project_id' => $gallery['project_id']]);
        $materials = $this->Galleries->Materials->find('list');
        $categories = $this->Galleries->Categories->find('list');
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->loadModel('Projects');
        $projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        $this->set(compact('projects', 'gallery', 'product', 'materials', 'categories', 'status'));
        $this->set('_serialize', ['gallery']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $gallery = $this->Galleries->get($id);
        if ($this->Galleries->delete($gallery)) {
            $this->Flash->success(__('The gallery has been deleted.'));
        } else {
            $this->Flash->error(__('The gallery could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function dropdwnFill($id = NULL) {
        $this->loadModel('Materials');
        $this->loadModel('Categories');
        $result = array();
        $materials = $this->Materials->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['product_id' => $id])->toArray();
        $categories = $this->Categories->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['product_id' => $id])->toArray();
        $result['materials'] = $materials;
        $result['categories'] = $categories;
        $this->set(compact('result'));
        $this->render('filter');
    }

    public function dropdwnFillProduct($id = NULL) {
        $this->loadModel('Products');
        $projects = $this->Products->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['project_id' => $id])->toArray();
        $this->set(compact('projects'));
        $this->render('filter');
    }

    public function beforeFilter(Event $event1) {
        parent::beforeFilter($event1);
        $this->Auth->allow(['dropdwnFillProduct', 'dropdwnFill']);
    }

}
