<?php
namespace App\Controller;

use App\Controller\AppController;



/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
        $this->set('_serialize', ['articles']);      
    }


    /**
    *  Paginator Default Short Order 
    */   
        public $paginate = [
        'limit' => 6,
        'order' => ['Articles.created' => 'desc']
        ];

        public function initialize()
        {
                parent::initialize();
                $this->loadComponent('Paginator');
        }
 

    /*
    *  Prev - Next Links
    */
        public function neighbors($id = null) { // @TODO NOT WORKING
            
        $articles = $this->Articles->get($id);
        $nquery = $articles->find('all', [
                'order' => ['Articles.created' => 'DESC']
                ]);
                $next = $nquery->first();

        $pquery = $articles->find('all', [
                'order' => ['Articles.created' => 'ASC']
                ]);
                $pre = $pquery->first();

         $this->set('pre', $pre); 
         $this->set('next', $next); 
        }
         

    /*
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);

        $this->set('article', $article);
        $this->set('_serialize', ['article']);
    }

    /*
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
                             
 //////////////// INTRO IMAGE UPLOAD ///////////// TODO -> ADD VALIDATORS     
$fileName = $this->request->data['img']['name'];
$uploadPath = 'img/article-images/';
$uploadFile = $uploadPath.$fileName;
move_uploaded_file($this->request->data['img']['tmp_name'],$uploadFile);           
 /////////////////////////////////

            $article = $this->Articles->patchEntity($article, $this->request->data);
            
                $article->img= $fileName; /// pass the intro-image filename to db after the patch entity 
                
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
public function edit($id = null)
    {  
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
                    $imageFileName = 'noimage.jpg' ;
            }
}

//$fileName = $this->request->data['img']['name'];
//$uploadPath = 'img/article-images/';
//$uploadFile = $uploadPath.$fileName;
//move_uploaded_file($this->request->data['img']['tmp_name'],$uploadFile);
/////////////////////////////////////////////        
                
  $article = $this->Articles->patchEntity($article, $this->request->data); 

                if (!empty($this->request->data['img']['name'])) {
                  $article->img= $imageFileName; /// pass the intro-image filename to db after the patch entity        
                }
                
 
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
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
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







