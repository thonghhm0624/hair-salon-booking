<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\Core\Configure;

/**
 * Stylists Controller
 *
 *
 * @method \Admin\Model\Entity\Stylist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StylistsController extends AppController
{
    public $stylist_status = [];
    public function initialize(){
        parent::initialize();
        $this->loadModel('Stylists');
        $this->loadModel('Branches');
        $this->stylist_status = Configure::read('stylist_status');
        $branches = $this->Branches->find('list',['keyField'=>'branch_id','valueField'=>'branch_address'])->toArray();
        $this->set('stylist_status', $this->stylist_status);
        $this->set(compact('branches'));
        $this->set(compact('stylist_status'));
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $stylists = $this->paginate($this->Stylists);

        $this->set(compact('stylists'));
    }

    /**
     * View method
     *
     * @param string|null $id Stylist id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stylist = $this->Stylists->get($id, [
            'contain' => []
        ]);

        $this->set('stylist', $stylist);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stylist = $this->Stylists->newEntity();
        if ($this->request->is('post')) {
            $stylist = $this->Stylists->patchEntity($stylist, $this->request->getData());
            if ($this->Stylists->save($stylist)) {
                $this->Flash->success(__('The stylist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stylist could not be saved. Please, try again.'));
        }
        $this->set(compact('stylist'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stylist id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stylist = $this->Stylists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stylist = $this->Stylists->patchEntity($stylist, $this->request->getData());
            if ($this->Stylists->save($stylist)) {
                $this->Flash->success(__('The stylist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stylist could not be saved. Please, try again.'));
        }
        $this->set(compact('stylist'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stylist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stylist = $this->Stylists->get($id);
        if ($this->Stylists->delete($stylist)) {
            $this->Flash->success(__('The stylist has been deleted.'));
        } else {
            $this->Flash->error(__('The stylist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
