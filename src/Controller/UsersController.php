<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public $helpers = ['SocialShare.SocialShare'];

    public function index() {
        $users = $this->Users->find('all')->toArray();
        // $users = $this->paginate($this->Users);
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('users', 'status'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['code'] = substr(str_shuffle(str_repeat('ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890', 5)), 0, 5);
            $this->request->data['is_verified'] = 1;
            $this->request->data['name'] = strtolower($this->request->data['name']);
            $this->request->data['name'] = ucfirst($this->request->data['name']);
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('user', 'status'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['name'] = strtolower($this->request->data['name']);
            $this->request->data['name'] = ucfirst($this->request->data['name']);
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        Configure::load('new_era_industry');
        $status = Configure::read('new_era_industry.status');
        $this->set(compact('user', 'status'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function changeStatus($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }
        if ($this->Users->save($user)) {
            if ($user->status == 0) {
                $this->Flash->success(__('The user has been deactivated.'));
            } else {
                $this->Flash->success(__('The user has been activated.'));
            }
            return $this->redirect(['action' => 'index']);
        } else {
            if ($user->status == 0) {
                $this->Flash->success(__('The user could not be deactivated.'));
            } else {
                $this->Flash->success(__('The user could not be activated.'));
            }
        }
    }

    public function login() {
        $this->viewBuilder()->layout(false);
        if ($this->request->is('post')) {
            // echo '<pre>';print_r($this->request->data('password'));
            // $password = $this->request->data('password');
            // $hasher = new DefaultPasswordHasher();
            // $this->request->data['password'] = $hasher->hash($password);
            // echo '<pre>';print_r($this->request->data('password'));exit;
            $user = $this->Auth->identify();

            if (!empty($user)) {
                if ($user['status'] == 1) {
                    $this->Auth->setUser($user);
                    $find_role = $this->Users->find('all')->where(['Users.id' => $user['id']])->first();
                    $this->Flash->success(__('Login successfully.'), 'success');
                    if ($find_role['role'] == 1 || $find_role['role'] == 2) {
                        $this->redirect(array('controller' => 'Users', 'action' => 'index'));
                    }
                } else {
                    $this->Flash->error(__('Now your account has been deactivated.'), 'error');
                    return $this->redirect($this->referer());
                }
            } else {
                $this->Flash->error(__('You are not New Era Industry user !, Please register first'), 'error');
                return $this->redirect($this->referer());
            }
        }
    }

    public function logout() {
        $session = $this->request->session();
        $session->destroy();
        return $this->redirect(array('controller' => 'Users', 'action' => 'login'));
    }

    public function checkEmail($email_id, $user_id = null) {
        $this->viewBuilder()->layout(false);
        if (!empty($user_id)) {
            if ($users_data = $this->Users->find('all', array('conditions' => array('email' => $email_id, 'id' => $user_id)))->first()) {
                $result = 0;
            } else {
                $result = 1;
            }
        } else if ($users_data = $this->Users->find('all', array('conditions' => array('email' => $email_id)))->first()) {
            $result = 1;
        } else {
            $result = 0;
        }
        $this->set(compact('result'));
        $this->render('filter');
    }

    public function home() {
        $this->viewBuilder()->layout(false);
        $this->loadModel('Sliders');
        $this->loadModel('CmsPages');
        $this->loadModel('Brands');
        $this->loadModel('Products');
        $this->loadModel('Clients');
        $this->loadModel('Projects');
        $slider = $this->Sliders->find('all')->where(['status' => 1])->toArray();
        $CmsPages = $this->CmsPages->find('all')->where(['status' => 1, 'id' => 1])->first();
        $Brands = $this->Brands->find('all')->where(['status' => 1])->toArray();
        $Products = $this->Products->find('all')->where(['status' => 1, 'home_active' => 1])->order(['created' => 'ASC'])->toArray();
        $Clients = $this->Clients->find('all')->where(['status' => 1])->toArray();
        $Projects = $this->Projects->find('all')->where(['status' => 1])->limit(14)->order(['created' => 'DESC'])->toArray();
        $this->set(compact('slider', 'CmsPages', 'Brands', 'Products', 'Clients', 'Projects'));
    }

    public function homeDesktop() {
        $this->viewBuilder()->layout(false);
        $this->loadModel('Sliders');
        $this->loadModel('CmsPages');
        $this->loadModel('Brands');
        $this->loadModel('Products');
        $this->loadModel('Clients');
        $this->loadModel('Projects');
        $slider = $this->Sliders->find('all')->where(['status' => 1])->toArray();
        $CmsPages = $this->CmsPages->find('all')->where(['status' => 1, 'id' => 1])->first();
        $Brands = $this->Brands->find('all')->where(['status' => 1])->toArray();
        $Products = $this->Products->find('all')->where(['status' => 1, 'home_active' => 1])->order(['created' => 'ASC'])->toArray();
        $Clients = $this->Clients->find('all')->where(['status' => 1])->toArray();
        $Projects = $this->Projects->find('all')->where(['status' => 1])->limit(14)->order(['created' => 'DESC'])->toArray();
        $this->set(compact('slider', 'CmsPages', 'Brands', 'Products', 'Clients', 'Projects'));
    }

    public function aboutUs() {
        $this->viewBuilder()->layout(false);
        $this->loadModel('AboutUs');
        $about_us = $this->AboutUs->find('all')->where(['status' => 1])->first();
        $this->set(compact('about_us'));
    }

    public function desktopAboutUs() {
        //echo'1111';exit;
        $this->viewBuilder()->layout(false);
        $this->loadModel('AboutUs');
        $this->loadModel('Brands');
        $about_us = $this->AboutUs->find('all')->where(['status' => 1])->first();
        $Brands = $this->Brands->find('all')->where(['status' => 1])->toArray();
        $this->set(compact('Brands', 'about_us'));
    }
    
    public function neLLc() {
        $this->viewBuilder()->layout(false);
        $this->set(compact('nellc'));
    }
    
    public function DneLLc() {
        $this->viewBuilder()->layout(false);
        $this->set(compact('d-nellc'));
    }
    
    public function neLFze() {
        $this->viewBuilder()->layout(false);
        $this->set(compact('nel-fze'));
    }
    
    public function DneLFze() {
        $this->viewBuilder()->layout(false);
        $this->set(compact('d-nel-fze'));
    }

    public function products() {
        $this->viewBuilder()->layout(false);
        $this->loadModel('Products');
        if ($this->request->is('post')) {
            //  dd($this->request->data);
            if (!empty($this->request->data) && isset($this->request->data)) {
                $product = $this->Products->find('all')->where(['status' => 1, 'name LIKE' => '%' . $this->request->data['search'] . '%'])->order(['created' => 'ASC'])->toArray();
            }
        } else {
            $product = $this->Products->find('all')->where(['status' => 1])->order(['created' => 'ASC'])->toArray();
        }
        $this->set(compact('product'));
    }

    public function dProductsList() {
        $this->viewBuilder()->layout(false);
        $this->loadModel('Products');
        if ($this->request->is('post')) {
            //  dd($this->request->data);
            if (!empty($this->request->data) && isset($this->request->data)) {
                $product = $this->Products->find('all')->where(['status' => 1, 'name LIKE' => '%' . $this->request->data['search'] . '%'])->order(['created' => 'ASC'])->toArray();
            }
        } else {
            $product = $this->Products->find('all')->where(['status' => 1])->order(['created' => 'ASC'])->toArray();
        }
        $this->set(compact('product'));
    }

    public function productDetails($product_id) {
        $this->viewBuilder()->layout(false);
        $this->loadModel('Products');
        $this->loadModel('ProductDetails');
        $this->loadModel('ProductColorImages');
        $product = $this->Products->find('all')->where(['status' => 1, 'id' => $product_id])->first();
        $product_details = $this->ProductDetails->find('all')->where(['status' => 1, 'product_id' => $product_id])->toArray();
        // $ProductColorImagesCFT = $this->ProductColorImages->find('all')->where(['product_detail_id' => $product_details['id'], 'type' => 1])->toArray();
        // $ProductColorImagesCSN = $this->ProductColorImages->find('all')->where(['product_detail_id' => $product_details['id'], 'type' => 2])->toArray();
        $this->set(compact('ProductColorImagesCSN', 'ProductColorImagesCFT', 'product', 'product_details'));
    }

    public function dProductDetails($product_id) {
        $this->viewBuilder()->layout(false);
        $this->loadModel('Products');
        $this->loadModel('ProductDetails');
        $this->loadModel('ProductColorImages');
        $product = $this->Products->find('all')->where(['status' => 1, 'id' => $product_id])->first();
        $product_details = $this->ProductDetails->find('all')->where(['status' => 1, 'product_id' => $product_id])->toArray();
        //dd($product_details);
        //$ProductColorImagesCFT = $this->ProductColorImages->find('all')->where(['product_detail_id' => $product_details['id'], 'type' => 1])->toArray();
        //$ProductColorImagesCSN = $this->ProductColorImages->find('all')->where(['product_detail_id' => $product_details['id'], 'type' => 2])->toArray();
        $this->set(compact('ProductColorImagesCSN', 'ProductColorImagesCFT', 'product', 'product_details'));
    }

    public function gallery($project_id = null, $material_id = null) {
        ini_set('memory_limit', '800M');

        $this->viewBuilder()->layout(false);
        $this->loadModel('Materials');
        $this->loadModel('Categories');
        $this->loadModel('Products');
        $this->loadModel('Projects');
        $this->loadModel('Galleries');
        $project = $this->Projects->find('all')->where(['status' => 1])->toArray();
        $materials = $this->Materials->find('all')->where(['status' => 1])->toArray();
        $categories = $this->Categories->find('all')->where(['status' => 1])->toArray();
        $project_list = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['status' => 1])->toArray();
        $material_list = $this->Materials->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['status' => 1])->toArray();
        $category_list = $this->Categories->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['status' => 1])->toArray();
        if (!empty($project_id)) {
            $galleries = $this->Galleries->find('all')->where(['project_id' => $project_id, 'status' => 1])->toArray();
            //dd($galleries);
        } elseif (!empty($material_id)) {
            $galleries = $this->Galleries->find('all')->where(['material_id' => $material_id, 'status' => 1])->toArray();
            // dd($galleries);
        } else {
            $galleries = $this->Galleries->find('all')->where(['status' => 1])->toArray();
            //dd($galleries);
        }
        $this->set(compact('material_id', 'project_id', 'product_id', 'categories', 'materials', 'category_list', 'material_list', 'project_list', 'galleries', 'project'));
    }

    public function dGallery($project_id = null, $material_id = null) {
        $this->viewBuilder()->layout(false);
        $this->loadModel('Materials');
        $this->loadModel('Categories');
        $this->loadModel('Products');
        $this->loadModel('Projects');
        $this->loadModel('Galleries');
        $project = $this->Projects->find('all')->where(['status' => 1])->toArray();
        $materials = $this->Materials->find('all')->where(['status' => 1])->toArray();
        $categories = $this->Categories->find('all')->where(['status' => 1])->toArray();
        $project_list = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['status' => 1])->toArray();
        $material_list = $this->Materials->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['status' => 1])->toArray();
        $category_list = $this->Categories->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['status' => 1])->toArray();
        $conditions = array();
        if (!empty($project_id)) {
            $conditions['project_id'] = $project_id;
            $conditions['status'] = 1;
            
            //  $galleries = $this->Galleries->find('all')->where(['project_id' => $project_id, 'status' => 1])->toArray();
            //dd($galleries);
        } elseif (!empty($material_id)) {
            $conditions['material_id'] = $material_id;
            $conditions['status'] = 1;
            //  $galleries = $this->Galleries->find('all')->where(['product_id' => $product_id, 'status' => 1])->toArray();
            // dd($galleries);
        } else {
            $conditions['status'] = 1;
            // $galleries = $this->Galleries->find('all')->where(['status' => 1])->toArray();
            //dd($galleries);
        }
//        debug($conditions);
//        $this->paginate = [
//            'conditions' => [$conditions],
//           // 'limit' => 12,
//        ];
        // $galleries = $this->paginate($this->Galleries)->toArray();
        $order=array('order'=>array('id'=>'desc'));
        $galleries = $this->Galleries->find('all',$order)->where($conditions)->limit(2000)->toArray();
        if (!empty($galleries)) {
            $last_id = $galleries[count($galleries) - 1];
        }
        //dd($galleries);
        $this->set(compact('material_id', 'last_id', 'material_id', 'project_id', 'product_id', 'categories', 'materials', 'category_list', 'material_list', 'project_list', 'galleries', 'project'));
    }

    public function queryUser() {
        ini_set('max_execution_time', 3000000);
        $this->viewBuilder()->layout(false);
        $this->loadModel('Queries');
        if ($_POST) {
            $Queries = $this->Queries->newEntity();
            if (!empty($_POST['name'])) {
                $this->request->data['name'] = $_POST['name'];
            }
            if (!empty($_POST['email'])) {
                $this->request->data['email'] = $_POST['email'];
            }
            if (!empty($_POST['subject'])) {
                $this->request->data['subject'] = $_POST['subject'];
            }
            $this->request->data['phone'] = $_POST['phone'];
            if (!empty($_POST['msg'])) {
                $this->request->data['msg'] = $_POST['msg'];
            }
            $this->request->data['status'] = 1;
            $Queries = $this->Queries->patchEntity($Queries, $this->request->getData());
            if ($this->Queries->save($Queries)) {
                $result = 1;
            } else {
                $result = 0;
            }
        } else {
            $result = 0;
        }
        $this->set(compact('result'));
        $this->render('filter');
    }

    public function galleryFilter($project_id, $material_id, $category_id) {
        $this->viewBuilder()->layout(false);
        $whr = [];
        if (!empty($project_id)) {
            $whr['project_id'] = $project_id;
        }
        if (!empty($material_id)) {
            $whr['material_id'] = $material_id;
        }
        if (!empty($category_id)) {
            $whr['category_id'] = $category_id;
        }
        $this->loadModel('Materials');
        $this->loadModel('Categories');
        $this->loadModel('Products');
        $this->loadModel('Projects');
        $this->loadModel('Galleries');
        $project = $this->Projects->find('all')->where(['status' => 1])->toArray();
        $materials = $this->Materials->find('all')->where(['status' => 1])->toArray();
        $categories = $this->Categories->find('all')->where(['status' => 1])->toArray();
        $project_list = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['status' => 1])->toArray();
        $material_list = $this->Materials->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['status' => 1])->toArray();
        $category_list = $this->Categories->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['status' => 1])->toArray();
        $galleries = $this->Galleries->find('all')->where([$whr])->toArray();
        $this->set(compact('project_id', 'product_id', 'categories', 'materials', 'category_list', 'material_list', 'project_list', 'galleries', 'project'));
    }

    public function dGalleryFilter($project_id, $material_id, $category_id) {
        $this->viewBuilder()->layout(false);
        $whr = [];
        if (!empty($project_id)) {
            $whr['project_id'] = $project_id;
        }
        if (!empty($material_id)) {
            $whr['material_id'] = $material_id;
        }
        if (!empty($category_id)) {
            $whr['category_id'] = $category_id;
        }
        $whr['status'] = 1;
        $this->loadModel('Materials');
        $this->loadModel('Categories');
        $this->loadModel('Products');
        $this->loadModel('Projects');
        $this->loadModel('Galleries');
        $project = $this->Projects->find('all')->where(['status' => 1])->toArray();
        $materials = $this->Materials->find('all')->where(['status' => 1])->toArray();
        $categories = $this->Categories->find('all')->where(['status' => 1])->toArray();
        $project_list = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['status' => 1])->toArray();
        $material_list = $this->Materials->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['status' => 1])->toArray();
        $category_list = $this->Categories->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['status' => 1])->toArray();
//        $this->paginate = [
//            'conditions' => [$whr],
//                // 'limit' => 12,
//        ];
//        $galleries = $this->paginate($this->Galleries)->toArray();
        $galleries = $this->Galleries->find('all')->where($whr)->toArray();
        $this->set(compact('project_id', 'product_id', 'categories', 'materials', 'category_list', 'material_list', 'project_list', 'galleries', 'project'));
    }

    public function sessionDataWidth($screenWidth = null) {
        $this->viewBuilder()->layout(false);
        $scrren_width['screenWidth'] = $screenWidth;
        if ($this->request->Session()->check('scrren_width_data')) {
            $scrren_width['flag'] = 0;
            $scrren_w = $this->request->Session()->read('scrren_width_data');
            if ($scrren_w['screenWidth'] <= '1024') {
                if ($scrren_w['flag'] == 0) {
                    $result = 0;
                } else {
                    $result = 1;
                }
            } else {
                if ($scrren_w['flag'] == 0) {
                    $result = 0;
                } else {
                    $result = 1;
                }
            }
        } else {
            $scrren_width['flag'] = 1;
            $result = 1;
        }
        $this->request->Session()->write('scrren_width_data', $scrren_width);
        $this->set(compact('result'));
        $this->render('filter');
    }

    public function loadMoreD($gallery_id, $project_id, $material_id) {
        $this->viewBuilder()->layout(false);
        $this->viewBuilder()->layout(false);
        $whr = [];
        if (!empty($project_id)) {
            $whr['project_id'] = $project_id;
        }
        if (!empty($material_id)) {
            $whr['material_id'] = $material_id;
        }
        if (!empty($gallery_id)) {
            $whr['id >'] = $gallery_id;
        }
        $whr['status'] = 1;
        $this->loadModel('Materials');
        $this->loadModel('Categories');
        $this->loadModel('Products');
        $this->loadModel('Projects');
        $this->loadModel('Galleries');
        $project = $this->Projects->find('all')->where(['status' => 1])->toArray();
        $materials = $this->Materials->find('all')->where(['status' => 1])->toArray();
        $categories = $this->Categories->find('all')->where(['status' => 1])->toArray();
        $project_list = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['status' => 1])->toArray();
        $material_list = $this->Materials->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['status' => 1])->toArray();
        $category_list = $this->Categories->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['status' => 1])->toArray();
        $galleries = $this->Galleries->find('all')->where($whr)->limit(20)->toArray();
        // dd($galleries);
        if (!empty($galleries)) {
            $last_id = $galleries[count($galleries) - 1];
        }
        $url = Router::url('/', true);
        $result = '';
        foreach ($galleries as $key => $value_gallery) {
            $g_v_d = "'" . $value_gallery['image'] . "','" . $project_list[$value_gallery['project_id']] . "','" . $value_gallery['location'] . "','" . $category_list[$value_gallery['category_id']] . "'";
            $result = $result . '<div class="grid-item">
            <div class="glr_Img" data-aos="fade-in" data-aos-once="true" data-aos-duration="700">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#galleryPopup" onclick="gallerModels('. $g_v_d .');" data-target="#galleryPopup">
                    <img src="' . $url . 'img/gallery/' . $value_gallery['image'] . '" width="200" height="200" alt="Gallery" />
                </a>
            </div>
        </div>';
        }
        if (count($galleries) == 20) {
            $result = $result . '<div id="delete_id_a" class="load-more-list"><a onclick="loadMoreImages(' . $last_id['id'] . ',' . $project_id . ',' . $material_id . ')" style="left: 551px; top: 1396px;">Load More</a> </div>';
        }
        $this->set(compact('result'));
        $this->render('filter');
    }

    public function details($id = null) {
        $this->viewBuilder()->layout(false);
        $this->loadModel('Projects');
        $project = $this->Projects->find('all')->where(['status' => 1, 'id' => $id])->first();
        //dd($project);
        $this->set(compact('product', 'project', 'id'));
    }

    public function beforeFilter(Event $event1) {
        parent::beforeFilter($event1);
        $this->Auth->allow(['details', 'loadMoreD', 'dGalleryFilter', 'dGallery', 'dProductDetails', 'dProductsList', 'desktopAboutUs', 'sessionDataWidth', 'homeDesktop', 'galleryFilter', 'gallery', 'productDetails', 'products', 'aboutUs', 'neLLc', 'neLFze', 'DneLLc', 'DneLFze', 'queryUser', 'home', 'changeStatus', 'login', 'logout', 'add', 'checkEmail']);
    }

}
