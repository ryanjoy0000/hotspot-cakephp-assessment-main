<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Actors Controller
 *
 * @property \App\Model\Table\ActorsTable $Actors
 */
class ActorsController extends AppController
{
    /**
     * Index method - '/actors'
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // get from the url: /actors?filter=tom
        $filter = $this->request->getQuery('filter'); 

        // Query: fetch related movies for each actor and sort
        $query = $this->Actors->find()->contain(['Movies'])->order(['Actors.name'=> 'ASC']);
        
        // add a filter condition to the query, if present
        if(!empty($filter)){
            $query->where(['Actors.name LIKE' => "%{$filter}%"]);
        }
        
        // get the result from db
        $actors = $query->all();

        // make the variables available to the view template
        $this->set(compact('actors', 'filter'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Actor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $actor = $this->Actors->get($id, contain: ['Movies']);
    //     $this->set(compact('actor'));
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $actor = $this->Actors->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $actor = $this->Actors->patchEntity($actor, $this->request->getData());
    //         if ($this->Actors->save($actor)) {
    //             $this->Flash->success(__('The actor has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The actor could not be saved. Please, try again.'));
    //     }
    //     $movies = $this->Actors->Movies->find('list', limit: 200)->all();
    //     $this->set(compact('actor', 'movies'));
    // }

    /**
     * Edit method
     *
     * @param string|null $id Actor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $actor = $this->Actors->get($id, contain: ['Movies']);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $actor = $this->Actors->patchEntity($actor, $this->request->getData());
    //         if ($this->Actors->save($actor)) {
    //             $this->Flash->success(__('The actor has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The actor could not be saved. Please, try again.'));
    //     }
    //     $movies = $this->Actors->Movies->find('list', limit: 200)->all();
    //     $this->set(compact('actor', 'movies'));
    // }

    /**
     * Delete method
     *
     * @param string|null $id Actor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $actor = $this->Actors->get($id);
    //     if ($this->Actors->delete($actor)) {
    //         $this->Flash->success(__('The actor has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The actor could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
    
}
