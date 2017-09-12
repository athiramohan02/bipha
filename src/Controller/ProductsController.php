<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products */
class ProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

    if (!empty($this->request->data)){
            if(isset($this->request->data['data']['Products']['limit'])){
                $limit = $this->request->data['data']['Products']['limit'];
                $this->request->Session()->write('default_limit', $limit);
            }
        }else{ 
                if($this->request->Session()->check('default_limit'))
                    $limit = $this->request->Session()->read('default_limit');
                else
                    $limit = $this->limits;
            }

  
$search_conditions = array();
        $conditions = array();
        $this->set("search_string", "");
        if(isset($this->request->query['search'])){
            $this->set("search_string", $this->request->query['search']);
            $conditions = array('OR' => array(
            'Products.email LIKE "%'.trim(addslashes($this->request->query['search'])).'%"')); 
        }
 $this->paginate = [  
            'limit' => $limit,
            'contain' => ['Categories'],        
            'conditions' => [
               array_merge($conditions,$search_conditions)
            ],
        ];

        $products = $this->paginate($this->Products);        
        $this->set('_serialize', ['products']);
        $this->set(compact('limit','default_limit_dropdown','products'));
    }
    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'Productfaqs', 'Productimages', 'Testimonials']
        ]);

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
