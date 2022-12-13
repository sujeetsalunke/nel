<?php

namespace App\Controller;

use Cake\Core\Configure;
use App\Controller\AppController;

/**
 * Sliders Controller
 *
 * @property \App\Model\Table\SlidersTable $Sliders
 *
 * @method \App\Model\Entity\Slider[] paginate($object = null, array $settings = [])
 */
class SlidersController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $sliders = $this->Sliders->find('all')->toArray();
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('status', 'sliders'));
        $this->set('_serialize', ['sliders']);
    }

    /**
     * View method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $slider = $this->Sliders->get($id, [
            'contain' => []
        ]);

        $this->set('slider', $slider);
        $this->set('_serialize', ['slider']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $slider = $this->Sliders->newEntity();
        if ($this->request->is('post')) {
            if (isset($this->request->data['image']) && !empty($this->request->data['image'])) {
                $this->request->data['image'] = $this->Sliders->uploadImage($this->request->data['image']);
            }
            $slider = $this->Sliders->patchEntity($slider, $this->request->getData());
            if ($this->Sliders->save($slider)) {
                $this->Flash->success(__('The slider has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The slider could not be saved. Please, try again.'));
        }
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('status', 'slider'));
        $this->set('_serialize', ['slider']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $slider = $this->Sliders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (isset($this->request->data['image_new']['tmp_name']) && !empty($this->request->data['image_new']['tmp_name'])) {
                //unlink('img/slider/' . $gallery['image']);
                $this->request->data['image'] = $this->Sliders->uploadImage($this->request->data['image_new']);
            }
            $slider = $this->Sliders->patchEntity($slider, $this->request->getData());
            if ($this->Sliders->save($slider)) {
                $this->Flash->success(__('The slider has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The slider could not be saved. Please, try again.'));
        }
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('status', 'slider'));
        $this->set('_serialize', ['slider']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $slider = $this->Sliders->get($id);
        if ($this->Sliders->delete($slider)) {
            $this->Flash->success(__('The slider has been deleted.'));
        } else {
            $this->Flash->error(__('The slider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
