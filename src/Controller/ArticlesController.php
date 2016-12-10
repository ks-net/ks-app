<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Csrf');
    }

    /**
     *  Paginator Default Short Order
     */
    public $paginate = [
        'limit' => 6,
        'order' => ['Articles.created' => 'desc']
    ];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
        $this->set('_serialize', ['articles']);
    }

    /*
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function view($id = null) {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);

        $this->set('article', $article);
        $this->set('_serialize', ['article']);

        /*
         *  Articles Next-Previous links
         */

        $nquery = $this->Articles->find('all')
                ->where(['Articles.id >' => $id])
                ->where(['Articles.published' => 1]);
        $prev = $nquery->first();

        $pquery = $this->Articles->find('all')
                ->where(['Articles.id <' => $id])
                ->where(['Articles.published' => 1]);
        $next = $pquery->last();

        $this->set('next', $next);
        $this->set('prev', $prev);
    }

    /*
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */

    public function add() {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {

            //////////////// INTRO IMAGE UPLOAD ///////////// TODO -> ADD VALIDATORS
            $fileName = $this->request->data['img']['name'];
            $uploadPath = 'img/article-images/';
            $uploadFile = $uploadPath . $fileName;
            move_uploaded_file($this->request->data['img']['tmp_name'], $uploadFile);
            /////////////////////////////////

            $article = $this->Articles->patchEntity($article, $this->request->data);

            $article->img = $fileName; /// pass the intro-image filename to db after the patch entity

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('article'));
        $this->set('_serialize', ['article']);
    }

    /*
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function edit($id = null) {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);

        $this->set('title', 'Edit Article');
        $this->viewBuilder()->layout('default');
        if ($this->request->is(['patch', 'post', 'put'])) {

            //////////////// INTRO IMAGE UPLOAD ///////////// TODO -> ADD VALIDATORS
            if (!empty($this->request->data['img']['name'])) {
                $file = $this->request->data['img']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
                $setNewFileName = time() . "_" . rand(000000, 999999);

//only process if the extension is valid
                if (in_array($ext, $arr_ext)) {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/article-images/' . $setNewFileName . '.' . $ext);

                    //prepare the filename for database entry
                    $imageFileName = $setNewFileName . '.' . $ext;
                } else {
                    $imageFileName = 'noimage.jpg';
                }
            }

//$fileName = $this->request->data['img']['name'];
//$uploadPath = 'img/article-images/';
//$uploadFile = $uploadPath.$fileName;
//move_uploaded_file($this->request->data['img']['tmp_name'],$uploadFile);
/////////////////////////////////////////////

            $article = $this->Articles->patchEntity($article, $this->request->data);

            if (!empty($this->request->data['img']['name'])) {
                $article->img = $imageFileName; /// pass the intro-image filename to db after the patch entity
            }


            if ($this->Articles->save($article)) {

                if (isset($this->request->data['save1'])) {
                    $this->Flash->success(__('All changes have been Applied...'));
                    return $this->redirect(['action' => 'edit', $id]);
                } else if (isset($this->request->data['save2'])) {
                    $this->Flash->success(__('The article has been Saved.'));
                    return $this->redirect(['action' => 'index']);
                } else if (isset($this->request->data['save3'])) {
                    $this->Flash->default(__('The article has been Saved... To add a New One fill the form fields bellow...'));
                    return $this->redirect(['action' => 'add']);
                }
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('article'));
        $this->set('_serialize', ['article']);
    }

    /*
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
