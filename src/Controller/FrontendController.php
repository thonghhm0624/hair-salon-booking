<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Mailer\Email;
use Cake\Routing\Router;
use App\Controller\AppController;
require_once(ROOT .DS. 'src'.DS. 'Lib' . DS .'image_load.php');
use image_load;



class FrontendController extends AppController {
	//public $layout = 'frontend';	
	public $paginate = [
        'limit' => 3,
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Categories');
        $this->loadModel('Reservations');
        $categories = $this->Categories->find('all')->toArray();
        $this->set('categories',$categories);
		$this->viewBuilder()->layout('frontend');
        $this->response->disableCache();
		$this->set('webroot_full', Router::url('/', true));
    }

	public function index() {
        $this->render('home');
    }

    //FUNCTIONS ABOUT ARTICLES
	public function articles($page = 1) {
        $this->loadModel('Articles');
        if ($this->request->is('post')) {
            $search = $this->request->getData()['searchForArticles'];
            $articles = $this->paginate($this->Articles->find('all')->where(
                [
                    'OR'=>[
                        'article_title LIKE'=> '%'.$search.'%',
                        'article_content LIKE'=> '%'.$search.'%',
                        'article_keyword LIKE'=> '%'.$search.'%',
                    ]
                ]
            ),['page'=>$page]);
        }

        else {
            $articles = $this->paginate($this->Articles,['page'=>$page]);
        }


        $this->set('collapse_articles',true);
        $this->set('collapse_products',false);

        $this->set('article', null);
        $this->set('articles',$articles);
        $this->set('product',null);
        $this->set('products',null);

        $this->set('category', null);
        $this->render('explore');

    }

    public function articles_by_category($category = null, $page = 1) {
        $this->loadModel('Articles');
        if ($category != null) {
            $articles = $this->paginate($this->Articles->find('all')->where(
                [
                    'article_category_id = ' => $category
                ]
            ),['page'=>$page]);
        }

        $this->set('collapse_products',true);
        $this->set('collapse_articles',false);

        $this->set('articles',$articles);

        $this->set('article', null);
        $this->set('articles',$articles);
        $this->set('product',null);
        $this->set('products',null);

        $this->set('category', $category);
        $this->render('explore');
    }

    public function article_details($articleID = 0) {
        $this->loadModel('Articles');
        $article = $this->Articles->find('all')->where(
            [
                'article_id = ' => $articleID
            ]
        )->first();

        $this->set('collapse_products',true);
        $this->set('collapse_articles',false);

        $this->set('article', $article);
        $this->set('articles', null);
        $this->set('product', null);
        $this->set('products', null);

        $this->set('category', null);
        $this->render('explore');
    }


    //FUNCTIONS ABOUT PRODUCTS
    public function products($page = 1) {
        $this->loadModel('Products');
        if ($this->request->is('post')) {
            $search = $this->request->getData()['searchForProducts'];
            $products = $this->paginate($this->Products->find('all')->where(
                [
                    'OR'=>[
                        'product_title LIKE'=> '%'.$search.'%',
                        'product_content LIKE'=> '%'.$search.'%',
                        'product_keyword LIKE'=> '%'.$search.'%',
                    ]
                ]
            ),['page'=>$page]);
        }

        else {
            $products = $this->paginate($this->Products,['page'=>$page]);
        }

        $this->set('collapse_products',true);
        $this->set('collapse_articles',false);


        $this->set('article', null);
        $this->set('articles', null);
        $this->set('product',null);
        $this->set('products',$products);

        $this->set('category', null);
        $this->render('explore');
    }

    public function products_by_category($category = null, $page = 1) {
        $this->loadModel('Products');
        if ($category != null) {
            $products = $this->paginate($this->Products->find('all')->where(
                [
                    'product_category_id = ' => $category
                ]
            ),['page'=>$page]);
        }

        $this->set('collapse_products',true);
        $this->set('collapse_articles',false);

        $this->set('article', null);
        $this->set('articles', null);
        $this->set('product',null);
        $this->set('products',$products);

        $this->set('category', $category);
        $this->render('explore');
    }

    public function product_details($productID = 0) {
        $this->loadModel('Products');
        $product = $this->Products->find('all')->where(
            [
                'product_id = ' => $productID
            ]
        )->first();

        $this->set('collapse_products',true);
        $this->set('collapse_articles',false);

        $this->set('article', null);
        $this->set('articles', null);
        $this->set('product',$product);
        $this->set('products', null);

        $this->set('category', null);
        $this->render('explore');
    }


    public function introduction() {
        $this->render('about');
    }

    public function logout(){
        $session = $this->request->getSession();
        $session->delete('login_type');
        $session->delete('login_user');
        $session->delete('response');
        return $this->redirect(['action' => 'index']);
    }

    public function reserve(){
        $this->autoRender = false;
        $this->loadModel('Customers');
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $phone = $data['phonenumber'];
            $store = $data['store'];
            $stylist = $data['stylist'];
            $service = $data['service'];
            $date = $data['date'];
            $time = $data['time'];

            $can_be_added = 0;
            $response = [
                'status'=>0,
                'message'=>'Fail',
            ];
            $customer = $this->Customers->find('all')->where([
                    'customer_id' => $phone
                ])->select('customer_id')->first();
            if (!empty($customer)) {
                $can_be_added = 1;
            }
            else if (empty($customer)) {
                $new_customer = $this->Customers->newEntity();
                $new_customer->customer_id = $phone;
                if ($this->Customers->save($new_customer)) {
                    $can_be_added = 1;
                }
            }
            else {

            }

            if ($can_be_added != 0) {
                $reservation = $this->Reservations->newEntity();
                $reservation->reservation_status = 0;
                $reservation->reservation_date = $date;
                $reservation->reservation_time = $time;
                $reservation->service_id = $service;
                $reservation->branch_id = $store;
                $reservation->customer_id = $phone;
                $reservation->stylist_id = $stylist;
                if ($this->Reservations->save($reservation)){
                    $response = [
                        'status'=>1,
                        'message'=>'Success',
                    ];
                }
            }

            $this->response->withType('json');
            $this->response->body(json_encode($response));
            return  $this->response;

        }
    }

    public function login(){
        $this->autoRender = false;
        $this->loadModel('Customers');
        $this->loadModel('Stylists');
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $phone = $data['phonenumber'];
            $password = $data['password'];
            $login_type = $data['login_type'];
            $response = [
                'status'=>0,
                'message'=>'Dang nhap that bai!',
            ];
            if($login_type == 'customer'){
                $customer = $this->Customers->find('all')->where([
                    'customer_id' => $phone,
                    'customer_password'=> $password
                ])->select(['customer_id','customer_name','customer_status'])->first();
                if(!empty($customer)){
                    $session = $this->request->getSession();
                    $session->write('login_type',$login_type);
                    $session->write('login_user',$customer);
                    $response = [
                        'status'=> 1,
                        'message'=>'Dang nhap thanh cong!',
                        'data' =>[
                            'login_user' =>[
                                'name'=>$session->read('login_user')['customer_name'],
                                'id' => $session->read('login_user')['customer_id'],
                                'image'=> '',
                            ],
                            'login_type' =>$session->read('login_type')
                        ]
                    ];
                    $session->write('response',$response);
                }else{
                    $response = [
                        'status'=>0,
                        'message'=>'So dien thoai hoac mat khau khong dung, vui long nhap lai!'
                    ];
                }
            } else if($login_type == 'stylist'){
                $stylist = $this->Stylists->find('all')->where([
                    'stylist_phone' => $phone,
                    'stylist_password'=> $password
                ])->select(['stylist_id','stylist_branch_id','stylist_name','stylist_image','stylist_status','stylist_phone'])->first();
                if(!empty($stylist)){
                    $session = $this->request->getSession();
                    $session->write('login_type',$login_type);
                    $session->write('login_user',$stylist);
                    $response = [
                        'status'=> 1,
                        'message'=>'Dang nhap thanh cong!',
                        'data' =>[
                            'login_user' => [
                                'name'=>$session->read('login_user')['stylist_name'],
                                'id' => $session->read('login_user')['stylist_phone'],
                                'image'=> $session->read('login_user')['stylist_image'],
                            ],
                            'login_type' =>$session->read('login_type')
                        ]
                    ];

                    $session->write('response',$response);


                }else{
                    $response = [
                        'status'=>0,
                        'message'=>'So dien thoai hoac mat khau khong dung, vui long nhap lai!'
                    ];
                }
            }
            $this->response->withType('json');
            $this->response->body(json_encode($response));
            return  $this->response;
        }
    }

    public function stylistsByBranch ()
    {
        $this->autoRender = false;
        $this->loadModel('Stylists');
        $response = [
            'status' => 0,
            'message' => 'No stylist!',
        ];
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $branch_id = $data['store'];
            $stylists = $this->Stylists->find('all')->where([
                'stylist_branch_id' => $branch_id
            ])->select('stylist_id', 'stylist_name')->toArray();

            if (!empty($stylists)) {
                $response = [
                    'status' => 1,
                    'message' => 'Got stylist(s)',
                    'data' => [
                        'stylists' => $stylists
                    ]
                ];
            }
        }
        $this->response->withType('json');
        $this->response->body(json_encode($response));
        return $this->response;
    }

}
