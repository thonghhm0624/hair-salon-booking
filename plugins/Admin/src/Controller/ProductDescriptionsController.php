<?php
namespace Admin\Controller;

use Admin\Controller\AppController;

/**
 * ProductDescriptions Controller
 *
 *
 * @method \Admin\Model\Entity\ProductDescription[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductDescriptionsController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->loadModel('ProductDescriptions');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $productDescriptions = $this->paginate($this->ProductDescriptions);

        $this->set(compact('productDescriptions'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Description id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productDescription = $this->ProductDescriptions->get($id, [
            'contain' => []
        ]);

        $this->set('productDescription', $productDescription);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productDescription = $this->ProductDescriptions->newEntity();
        if ($this->request->is('post')) {
            $productDescription = $this->ProductDescriptions->patchEntity($productDescription, $this->request->getData());
            if ($this->ProductDescriptions->save($productDescription)) {
                $this->Flash->success(__('The product description has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product description could not be saved. Please, try again.'));
        }
        $this->set(compact('productDescription'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Description id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productDescription = $this->ProductDescriptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productDescription = $this->ProductDescriptions->patchEntity($productDescription, $this->request->getData());
            if ($this->ProductDescriptions->save($productDescription)) {
                $this->Flash->success(__('The product description has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product description could not be saved. Please, try again.'));
        }
        $this->set(compact('productDescription'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Description id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productDescription = $this->ProductDescriptions->get($id);
        if ($this->ProductDescriptions->delete($productDescription)) {
            $this->Flash->success(__('The product description has been deleted.'));
        } else {
            $this->Flash->error(__('The product description could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
