<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Media Controller
 *
 * @property \App\Model\Table\MediaTable $Media
 */
class MediaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $media = $this->paginate($this->Media);

        $this->set(compact('media'));
        $this->set('_serialize', ['media']);
    }

        public function findex()
    {
        $this->viewBuilder()->layout(false);
        $media = $this->paginate($this->Media);

        $this->set(compact('media'));
        $this->set('_serialize', ['media']);
    }

    
    
    /**
     * View method
     *
     * @param string|null $id Media id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $media = $this->Media->get($id, [
            'contain' => []
        ]);

        $this->set('media', $media);
        $this->set('_serialize', ['media']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $media = $this->Media->newEntity();
        if ($this->request->is('post')) {
            $media = $this->Media->patchEntity($media, $this->request->data);
            if ($this->Media->save($media)) {
                $this->Flash->success(__('The media has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The media could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('media'));
        $this->set('_serialize', ['media']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Media id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $media = $this->Media->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $media = $this->Media->patchEntity($media, $this->request->data);
            if ($this->Media->save($media)) {
                $this->Flash->success(__('The media has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The media could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('media'));
        $this->set('_serialize', ['media']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Media id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $media = $this->Media->get($id);
        if ($this->Media->delete($media)) {
            $this->Flash->success(__('The media has been deleted.'));
        } else {
            $this->Flash->error(__('The media could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
