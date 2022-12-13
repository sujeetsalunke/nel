<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * CmsPages Controller
 *
 * @property \App\Model\Table\CmsPagesTable $CmsPages
 *
 * @method \App\Model\Entity\CmsPage[] paginate($object = null, array $settings = [])
 */
class CmsPagesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        // $cmsPages = $this->paginate($this->CmsPages);
        $cmsPages = $this->CmsPages->find('all')->toArray();
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('cmsPages', 'status'));
        $this->set('_serialize', ['cmsPages']);
    }

    /**
     * View method
     *
     * @param string|null $id Cms Page id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $cmsPage = $this->CmsPages->get($id, [
            'contain' => []
        ]);

        $this->set('cmsPage', $cmsPage);
        $this->set('_serialize', ['cmsPage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $cmsPage = $this->CmsPages->newEntity();
        if ($this->request->is('post')) {
            $cmsPage = $this->CmsPages->patchEntity($cmsPage, $this->request->getData());
            if ($this->CmsPages->save($cmsPage)) {
                $this->Flash->success(__('The cms page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cms page could not be saved. Please, try again.'));
        }
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('cmsPage', 'status'));
        $this->set('_serialize', ['cmsPage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cms Page id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $cmsPage = $this->CmsPages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cmsPage = $this->CmsPages->patchEntity($cmsPage, $this->request->getData());
            if ($this->CmsPages->save($cmsPage)) {
                $this->Flash->success(__('The cms page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cms page could not be saved. Please, try again.'));
        }
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('cmsPage', 'status'));
        $this->set('_serialize', ['cmsPage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cms Page id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $cmsPage = $this->CmsPages->get($id);
        if ($this->CmsPages->delete($cmsPage)) {
            $this->Flash->success(__('The cms page has been deleted.'));
        } else {
            $this->Flash->error(__('The cms page could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
