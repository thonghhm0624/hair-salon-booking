<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\Core\Configure;

/**
 * Reservations Controller
 *
 *
 * @method \Admin\Model\Entity\Reservation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReservationsController extends AppController
{
    public $reservation_status = [];
    public $service_time = [];
    public function initialize(){
        parent::initialize();
        $this->loadModel('Reservations');
        $this->loadModel('Customers');
        $this->loadModel('Stylists');
        $this->loadModel('Services');

        $this->reservation_status = Configure::read('reservation_status');
        $this->service_time = Configure::read('service_time');
        $stylists =  $this->Stylists->find('list',['keyField'=>'stylist_id','valueField'=>'stylist_name'])->toArray();
        $services =  $this->Services->find('list',['keyField'=>'service_id','valueField'=>'service_name'])->toArray();

        $this->set('reservation_status',$this->reservation_status);
        $this->set('service_time',$this->service_time);
        $this->set(compact('stylists'));
        $this->set(compact('services'));
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $reservations = $this->paginate($this->Reservations);
        $this->set(compact('reservations'));
    }

    /**
     * View method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservation = $this->Reservations->get($id, [
            'contain' => []
        ]);

        $this->set('reservation', $reservation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reservation = $this->Reservations->newEntity();
        if ($this->request->is('post')) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
        }
        $this->set(compact('reservation'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reservation = $this->Reservations->get($id, [
            'contain' => []
        ]);
        if($reservation->reservation_status == 3){
            return $this->redirect(['action' => 'index']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());
            if ($this->Reservations->save($reservation)) {
                if($reservation->reservation_status == 3){
                    $customer = $this->Customers->where(['customer_id'=>$reservation->customer_id])->first();
                    if(!empty($customer)){
                        $customer->customer_status = 1;
                        $this->Customers->save($customer);
                    }
                }
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
        }
        $this->set(compact('reservation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservation = $this->Reservations->get($id);
        if ($this->Reservations->delete($reservation)) {
            $this->Flash->success(__('The reservation has been deleted.'));
        } else {
            $this->Flash->error(__('The reservation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
