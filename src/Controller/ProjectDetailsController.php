<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * ProjectDetails Controller
 *
 * @property \App\Model\Table\ProjectDetailsTable $ProjectDetails
 *
 * @method \App\Model\Entity\ProjectDetail[] paginate($object = null, array $settings = [])
 */
class ProjectDetailsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        //  $projectDetails = $this->paginate($this->ProjectDetails);
        $projectDetails = $this->ProjectDetails->find('all')->toArray();
        $this->loadModel('Projects');
        $Projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('projectDetails', 'status', 'Projects'));
        $this->set('_serialize', ['projectDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Project Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $projectDetail = $this->ProjectDetails->get($id, [
            'contain' => []
        ]);

        $this->set('projectDetail', $projectDetail);
        $this->set('_serialize', ['projectDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $projectDetail = $this->ProjectDetails->newEntity();
        if ($this->request->is('post')) {
            if (isset($this->request->data['image']) && !empty($this->request->data['image'])) {
                $this->request->data['image'] = $this->ProjectDetails->uploadImage($this->request->data['image']);
            }
            $this->request->data['project_id'] = $this->request->data['project_id'];
            $projectDetail = $this->ProjectDetails->patchEntity($projectDetail, $this->request->getData());
            if ($this->ProjectDetails->save($projectDetail)) {
                $this->Flash->success(__('The project detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project detail could not be saved. Please, try again.'));
        }
        $this->loadModel('Projects');
        $Projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('projectDetail', 'status', 'Projects'));
        $this->set('_serialize', ['projectDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $projectDetail = $this->ProjectDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //  debug($this->request->data);
            $this->request->data['project_id'] = $this->request->data['project_id'];
            if (isset($this->request->data['image_new']['tmp_name']) && !empty($this->request->data['image_new']['tmp_name'])) {
                //unlink('img/project/details/' . $projectDetail['image']);
                $this->request->data['image'] = $this->ProjectDetails->uploadImage($this->request->data['image_new']);
            }
            $projectDetail = $this->ProjectDetails->patchEntity($projectDetail, $this->request->data);

            if ($this->ProjectDetails->save($projectDetail)) {
                $this->Flash->success(__('The project detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project detail could not be saved. Please, try again.'));
        }
        $this->loadModel('Projects');
        $Projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('projectDetail', 'status', 'Projects'));
        $this->set('_serialize', ['projectDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $projectDetail = $this->ProjectDetails->get($id);
        if ($this->ProjectDetails->delete($projectDetail)) {
            $this->Flash->success(__('The project detail has been deleted.'));
        } else {
            $this->Flash->error(__('The project detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
