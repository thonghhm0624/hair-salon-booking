<?php
namespace Admin\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;
use Cake\Routing\Router;

class AppController extends BaseController
{

    public $helpers = ['Admin.JqueryUpload'];
    public function initialize()
    {
        $this->viewBuilder()->layout('Admin.admin');
        $this->loadComponent('Flash');
        $this->loadComponent('Csrf');
        $this->response->header(
            array(
                'X-Frame-Options' => 'DENY',
                'X-XSS-Protection'=> 1,
                'Strict-Transport-Security'=>'max-age=15552000; includeSubDomains; preload'
            )
        );
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
                //'plugin' => 'Admin'
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index',
                //'plugin' => 'Admin'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                //'plugin' => 'Admin',
                //'home'
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email']
                ]
            ] ,
            //'storage' => 'Session',
            'authError' => 'You can not access that page',
            'authorize' => ['Controller']
        ]);
    }
    //public $logged_in = false;
    public $current_user = null;
    public function beforeFilter(Event $event)
    {

        $this->current_user = $this->Auth->user();
        //$this->set('logged_in', $this->logged_in);
        $this->set('current_user', $this->current_user);
        $this->set('menu_items', [
            'Users' =>  [
                'text' => 'Users', 'link' => Router::url(['controller' => 'users','action' => 'index']), 'allow_access' => ['admin']
            ],
            'Branches' =>  [
                'text' => 'Branches', 'link' => Router::url(['controller' => 'Branches','action' => 'index']), 'allow_access' => ['admin']
            ],
            'Articles' =>  [
                'text' => 'Articles', 'link' => Router::url(['controller' => 'Articles','action' => 'index']), 'allow_access' => ['admin']
            ],
            'Categories' =>  [
                'text' => 'Categories', 'link' => Router::url(['controller' => 'Categories','action' => 'index']), 'allow_access' => ['admin']
            ],
            'Products' =>  [
                'text' => 'Products', 'link' => Router::url(['controller' => 'Products','action' => 'index']), 'allow_access' => ['admin']
            ],
            'Stylists' =>  [
                'text' => 'Stylists', 'link' => Router::url(['controller' => 'Stylists','action' => 'index']), 'allow_access' => ['admin']
            ],
            'Customers' =>  [
                'text' => 'Customers', 'link' => Router::url(['controller' => 'Customers','action' => 'index']), 'allow_access' => ['admin']
            ],
            'Reservations' =>  [
                'text' => 'Reservations', 'link' => Router::url(['controller' => 'Reservations','action' => 'index']), 'allow_access' => ['admin']
            ]
        ]);
        $this->set('active_menu_item', $this->request->params['controller']);
        if (in_array($this->request->action, ['active_fields','publish_fields','slug_unique','update_status'])) {
            $this->eventManager()->off($this->Csrf);
        }
        $SessionExprieTime = $this->request->session()->read('Admin.SessionExprieTime');
        if(!empty($SessionExprieTime))
        {
            if($SessionExprieTime <= time())
            {
                if($SessionExprieTime <= time())
                {
                    $controller = $this->request->params['controller'];
                    $action = $this->request->params['action'];
                    $avoid_action = array('validateSessionExprie','sessionLogout','login');
                    if( $controller != 'Users' || ($controller == 'Users' && !in_array($action,$avoid_action)))
                    {
                        $this->Auth->logout();
                    }
                }
            }
        }
        $this->set('SessionExprieIn', $this->createSessionExprie());
    }
    function createSessionExprie(){
        $controller = $this->request->params['controller'];
        $action = $this->request->params['action'];
        $avoid_action = array('validateSessionExprie','sessionLogout','login');
        if( $controller != 'Users' || ($controller == 'Users' && !in_array($action,$avoid_action)))
        {
            $time = time();
            $SessionExprieTime = strtotime(date('Y-m-d H:i:s') . " + 20 minutes");
            $this->request->session()->write('Admin.SessionExprieTime',$SessionExprieTime);
            $SessionExprieIn = $SessionExprieTime - $time;
            return $SessionExprieIn;
        }
        return '';
    }
    public function isAuthorized($user){
        return true;
    }

}