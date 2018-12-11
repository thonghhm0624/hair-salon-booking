<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use App\Controller\AppController;
require_once(ROOT .DS. 'src'.DS. 'Lib' . DS .'image_load.php');
use image_load;
use function Sodium\add;


class FrontendController extends AppController
{
    //public $layout = 'frontend';
    public $paginate = [
        'limit' => 12,
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Categories');
        $this->loadModel('Reservations');
        $categories = $this->Categories->find('all')->toArray();
        $this->set('categories', $categories);
        $this->viewBuilder()->layout('frontend');
        $this->response->disableCache();
        $this->set('webroot_full', Router::url('/', true));
    }

    public function index()
    {
        $this->render('home');
    }

    //FUNCTIONS ABOUT ARTICLES
    public function articles($page = 1)
    {
        $this->loadModel('Articles');
        if ($this->request->is('post')) {
            $search = $this->request->getData()['searchForArticles'];
            $articles = $this->paginate($this->Articles->find('all')->where(
                [
                    'OR' => [
                        'article_title LIKE' => '%' . $search . '%',
                        'article_content LIKE' => '%' . $search . '%',
                        'article_keyword LIKE' => '%' . $search . '%',
                    ]
                ]
            ), ['page' => $page]);
        } else {
            $articles = $this->paginate($this->Articles, ['page' => $page]);
        }


        $this->set('collapse_articles', true);
        $this->set('collapse_products', false);

        $this->set('article', null);
        $this->set('articles', $articles);
        $this->set('product', null);
        $this->set('products', null);

        $this->set('category', null);
        $this->render('explore');

    }

    public function articles_by_category($category = null, $page = 1)
    {
        $this->loadModel('Articles');
        if ($category != null) {
            $articles = $this->paginate($this->Articles->find('all')->where(
                [
                    'article_category_id = ' => $category
                ]
            ), ['page' => $page]);
        }

        $this->set('collapse_products', true);
        $this->set('collapse_articles', false);

        $this->set('articles', $articles);

        $this->set('article', null);
        $this->set('articles', $articles);
        $this->set('product', null);
        $this->set('products', null);

        $this->set('category', $category);
        $this->render('explore');
    }

    public function article_details($articleID = 0)
    {
        $this->loadModel('Articles');
        $article = $this->Articles->find('all')->where(
            [
                'article_id = ' => $articleID
            ]
        )->first();

        $this->set('collapse_products', true);
        $this->set('collapse_articles', false);

        $this->set('article', $article);
        $this->set('articles', null);
        $this->set('product', null);
        $this->set('products', null);

        $this->set('category', null);
        $this->render('explore');
    }


    //FUNCTIONS ABOUT PRODUCTS
    public function products($page = 1)
    {
        $this->loadModel('Products');
        if ($this->request->is('post')) {
            $search = $this->request->getData()['searchForProducts'];
            $products = $this->paginate($this->Products->find('all')->where(
                [
                    'OR' => [
                        'product_title LIKE' => '%' . $search . '%',
                        'product_content LIKE' => '%' . $search . '%',
                        'product_keyword LIKE' => '%' . $search . '%',
                    ]
                ]
            ), ['page' => $page]);
        } else {
            $products = $this->paginate($this->Products, ['page' => $page]);
        }

        $this->set('collapse_products', true);
        $this->set('collapse_articles', false);


        $this->set('article', null);
        $this->set('articles', null);
        $this->set('product', null);
        $this->set('products', $products);

        $this->set('category', null);
        $this->render('explore');
    }

    public function products_by_category($category = null, $page = 1)
    {
        $this->loadModel('Products');
        if ($category != null) {
            $products = $this->paginate($this->Products->find('all')->where(
                [
                    'product_category_id = ' => $category
                ]
            ), ['page' => $page]);
        }

        $this->set('collapse_products', true);
        $this->set('collapse_articles', false);

        $this->set('article', null);
        $this->set('articles', null);
        $this->set('product', null);
        $this->set('products', $products);

        $this->set('category', $category);
        $this->render('explore');
    }

    public function product_details($productID = 0)
    {
        $this->loadModel('Products');
        $product = $this->Products->find('all')->where(
            [
                'product_id = ' => $productID
            ]
        )->first();

        $this->set('collapse_products', true);
        $this->set('collapse_articles', false);

        $this->set('article', null);
        $this->set('articles', null);
        $this->set('product', $product);
        $this->set('products', null);

        $this->set('category', null);
        $this->render('explore');
    }


    public function introduction()
    {
        $this->render('about');
    }

    public function logout()
    {
        $session = $this->request->getSession();
        $session->delete('login_type');
        $session->delete('login_user');
        $session->delete('response');
        return $this->redirect(['action' => 'index']);
    }

    public function reserve()
    {
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
                'status' => 0,
                'message' => 'Fail',
            ];
            $customer = $this->Customers->find('all')->where([
                'customer_id' => $phone
            ])->select('customer_id')->first();
            if (!empty($customer)) {
                $can_be_added = 1;
            } else if (empty($customer)) {
                $new_customer = $this->Customers->newEntity();
                $new_customer->customer_id = $phone;
                if ($this->Customers->save($new_customer)) {
                    $can_be_added = 1;
                }
            } else {

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
                if ($this->Reservations->save($reservation)) {
                    $response = [
                        'status' => 1,
                        'message' => 'Success',
                    ];
                }
            }

            $this->response->withType('json');
            $this->response->body(json_encode($response));
            return $this->response;

        }
    }

    public function login()
    {
        $this->autoRender = false;
        $this->loadModel('Customers');
        $this->loadModel('Stylists');
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $phone = $data['phonenumber'];
            $password = $data['password'];
            $login_type = $data['login_type'];
            $response = [
                'status' => 0,
                'message' => 'Dang nhap that bai!',
            ];
            if ($login_type == 'customer') {
                $customer = $this->Customers->find('all')->where([
                    'customer_id' => $phone,
                    'customer_password' => $password
                ])->select(['customer_id', 'customer_name', 'customer_status'])->first();
                if (!empty($customer)) {
                    $session = $this->request->getSession();
                    $session->write('login_type', $login_type);
                    $session->write('login_user', $customer);
                    $response = [
                        'status' => 1,
                        'message' => 'Dang nhap thanh cong!',
                        'data' => [
                            'login_user' => [
                                'name' => $session->read('login_user')['customer_name'],
                                'id' => $session->read('login_user')['customer_id'],
                                'image' => '',
                            ],
                            'login_type' => $session->read('login_type')
                        ]
                    ];
                    $session->write('response', $response);
                } else {
                    $response = [
                        'status' => 0,
                        'message' => 'So dien thoai hoac mat khau khong dung, vui long nhap lai!'
                    ];
                }
            } else if ($login_type == 'stylist') {
                $stylist = $this->Stylists->find('all')->where([
                    'stylist_phone' => $phone,
                    'stylist_password' => $password
                ])->select(['stylist_id', 'stylist_branch_id', 'stylist_name', 'stylist_image', 'stylist_status', 'stylist_phone'])->first();
                if (!empty($stylist)) {
                    $session = $this->request->getSession();
                    $session->write('login_type', $login_type);
                    $session->write('login_user', $stylist);
                    $response = [
                        'status' => 1,
                        'message' => 'Dang nhap thanh cong!',
                        'data' => [
                            'login_user' => [
                                'name' => $session->read('login_user')['stylist_name'],
                                'id' => $session->read('login_user')['stylist_phone'],
                                'image' => $session->read('login_user')['stylist_image'],
                                'stylist_primary_id' => $session->read('login_user')['stylist_id'],
                            ],
                            'login_type' => $session->read('login_type')
                        ]
                    ];

                    $session->write('response', $response);


                } else {
                    $response = [
                        'status' => 0,
                        'message' => 'So dien thoai hoac mat khau khong dung, vui long nhap lai!'
                    ];
                }
            }
            $this->response->withType('json');
            $this->response->body(json_encode($response));
            return $this->response;
        }
    }

    //stylists by branch
    public function stylistsByBranch()
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
                'stylist_branch_id' => $branch_id,
                'stylist_status' => 1
            ])->select(['stylist_id', 'stylist_name'])->toArray();

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

    //user functions
    public function user($userfunction = 'changeinfo')
    {
        $this->set('userfunction', $userfunction);

        if ($userfunction = 'history') {
            $session = $this->request->session();
            $sessionData = $session->read('response');
            $this->loadModel("Reservations");
            $this->loadModel("Branches");
            $this->loadModel('Services');
            $services = $this->Services->find('list', ['keyField' => 'service_id', 'valueField' => 'service_name'])->toArray();
            $branches = $this->Branches->find('list', ['keyField' => 'branch_id', 'valueField' => 'branch_address'])->toArray();
            if ($sessionData['data']['login_type'] == 'customer') {
                $user_id = $sessionData['data']['login_user']['id'];
                $this->loadModel('Stylists');
                $reservations = $this->Reservations->find('all')->where([
                    'customer_id' => $user_id,
                    'reservation_status' => 3
                ])->toArray();
                $stylists = $this->Stylists->find('list', ['keyField' => 'stylist_id', 'valueField' => 'stylist_name'])->toArray();
                $this->set('reservations', $reservations);
                $this->set('stylists', $stylists);
                $this->set('services', $services);
                $this->set('branches', $branches);
            }
            else if ($sessionData['data']['login_type'] = 'stylist') {
                $user_id = $sessionData['data']['login_user']['stylist_primary_id'];
                $this->loadModel('Customers');
                $reservations = $this->Reservations->find('all')->where([
                    'stylist_id' => $user_id,
                    'reservation_status' => 3
                ])->toArray();
                $customers = $this->Customers->find('list', ['keyField' => 'customer_id', 'valueField' => 'customer_name'])->toArray();
                $this->set('reservations', $reservations);
                $this->set('customers', $customers);
                $this->set('services', $services);
                $this->set('branches', $branches);
            }
        }
        $this->render('account_information');
    }

    public function updateinformation($information = 'name')
    {
        $this->autoRender = false;
        $session = $this->request->session();
        $sessionData = $session->read('response');
        $phone = $sessionData['data']['login_user']['id'];
        $type = $sessionData['data']['login_type'];
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $response = [
                'status' => 0,
                'message' => 'Fail',
            ];
            if ($information == 'name') {
                $name = $data['name'];
                if ($type == 'customer') {
                    $this->loadModel('Customers');
                    $this->Customers->id = $phone;
                    $customersTable = TableRegistry::get('Customers');
                    $customer = $customersTable->get($phone); //
                    $customer->customer_name = $name;
                    if ($customersTable->save($customer)) {
                        $session->write('login_user', $customer);
                        $response = [
                            'status' => 1,
                            'message' => 'Update successfully!',
                            'data' => [
                                'login_user' => [
                                    'name' => $session->read('login_user')['customer_name'],
                                    'id' => $session->read('login_user')['customer_id'],
                                    'image' => '',
                                ],
                                'login_type' => $session->read('login_type')
                            ]
                        ];
                        $session->write('response', $response);
                    }
                } else if ($type == 'stylist') {
                    $this->loadModel('Stylists');
                    $stylist_id = ($this->Stylists->find('all')->where([
                        'stylist_phone' => $phone
                    ])->first())['stylist_id'];
                    $this->Stylists->id = $stylist_id;
                    $stylistsTable = TableRegistry::get('Stylists');
                    $stylist = $stylistsTable->get($stylist_id); //
                    $stylist->stylist_name = $name;
                    if ($stylistsTable->save($stylist)) {
                        $session->write('login_user', $stylist);
                        $response = [
                            'status' => 1,
                            'message' => 'Update successfully!',
                            'data' => [
                                'login_user' => [
                                    'name' => $session->read('login_user')['stylist_name'],
                                    'id' => $session->read('login_user')['stylist_phone'],
                                    'image' => $session->read('login_user')['stylist_image'],
                                    'stylist_primary_id' => $session->read('login_user')['stylist_id'],
                                ],
                                'login_type' => $session->read('login_type')
                            ]
                        ];
                        $session->write('response', $response);
                    }
                }
            } else if ($information == 'password') {
                $password = $data['password'];
                if ($type == 'customer') {
                    $this->loadModel('Customers');
                    $this->Customers->id = $phone;
                    $customersTable = TableRegistry::get('Customers');
                    $customer = $customersTable->get($phone); //
                    $customer->customer_password = $password;
                    if ($customersTable->save($customer)) {
                        $response = [
                            'status' => 1,
                            'message' => 'Update successfully!',
                        ];
                    }
                } else if ($type == 'stylist') {
                    $this->loadModel('Stylists');
                    $stylist_id = ($this->Stylists->find('all')->where([
                        'stylist_phone' => $phone
                    ])->first())['stylist_id'];
                    $this->Stylists->id = $stylist_id;
                    $stylistsTable = TableRegistry::get('Stylists');
                    $stylist = $stylistsTable->get($stylist_id); //
                    $stylist->stylist_password = $password;
                    if ($stylistsTable->save($stylist)) {
                        $response = [
                            'status' => 1,
                            'message' => 'Update successfully!',
                        ];
                    }
                }
            }

            $this->response->withType('json');
            $this->response->body(json_encode($response));
            return $this->response;
        }
    }

    public function reservationtimehandler()
    {
        $this->autoRender = false;
        $this->loadModel('Reservations');
        $response = [
            'status' => 0,
            'time_conflict' => 0,
            'message' => 'Fail',
        ];
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $stylist = $data['stylist'];
            $date = $data['date'];

            $time_and_status = $this->Reservations->find('all')->where([
                'stylist_id' => $stylist,
                'reservation_date' => $date,
            ])->toArray();

            if (!empty($time_and_status)) {
                $this->loadModel('Services');
                $times_to_be_conflicted = [];
                foreach ($time_and_status as $time) {
                    if (($time['reservation_status'] != 3 && $time['reservation_status'] != 4)) {
                        $service_duration = $this->Services->find('all')->where([
                            'service_id' => $time['service_id']
                        ])->first();
                        $time_conflict = intval($time['reservation_time']);
                        $time_service_duration = intval($service_duration['service_duration']);
                        for ($i = 1; $i <= $time_service_duration; $i++) {
                            $__time = $time_conflict + $i - 1;
                            if ($__time > 20)
                                array_push($times_to_be_conflicted, 20);
                            else
                                array_push($times_to_be_conflicted, $__time);
                        }
                    }
                }
                if (!empty($times_to_be_conflicted)) {
                    $response = [
                        'status' => 1,
                        'message' => 'Successful!',
                        'time_conflict' => 1,
                        'data' => [
                            'times_to_be_conflicted' => $times_to_be_conflicted
                        ]
                    ];
                }
            } else {
                $response = [
                    'status' => 1,
                    'message' => 'Successfully',
                    'time_conflict' => 0,
                ];
            }
        }
        $this->response->withType('json');
        $this->response->body(json_encode($response));
        return $this->response;
    }

    public function reservationtimecheckconflict()
    {
        $this->autoRender = false;
        $this->loadModel('Reservations');
        $response = [
            'status' => 0,
            'message' => 'Failed to retrieve information',
        ];
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $stylist = $data['stylist'];
            $date = $data['date'];
            $duration = intval($data['duration']);
            $new_time = intval($data['new_time']);
            $time_and_status = $this->Reservations->find('all')->where([
                'stylist_id' => $stylist,
                'reservation_date' => $date,
            ])->toArray();
            if (!empty($time_and_status)) {
                $any_time_conflict = false;
                foreach ($time_and_status as $time) {
                    if (($time['reservation_status'] != 3 && $time['reservation_status'] != 4)) {
//                        $time_conflict = intval($time['reservation_time']);
                        for ($i = 1; $i <= $duration; $i++) {
                            $__time = $new_time + $i - 1;
                            if ($__time == intval($time['reservation_time'])) {
                                $any_time_conflict = true;
                                break 2;
                            }
                        }
                    }
                }
                if ($any_time_conflict) {
                    $response = [
                        'status' => 2,
                        'message' => 'There is/are time conflict(s)',
                    ];
                } else {
                    $response = [
                        'status' => 1,
                        'message' => 'No time conflict',
                    ];
                }
            } else {
                $response = [
                    'status' => 1,
                    'message' => 'No time conflict',
                ];
            }
        }

        $this->response->withType('json');
        $this->response->body(json_encode($response));
        return $this->response;
    }
}

