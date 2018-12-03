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
        'limit' => 6,
    ];
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Products');

		$this->viewBuilder()->layout('frontend');
        $this->response->disableCache();
		$this->set('webroot_full', Router::url('/', true));
    }

	public function index() {
        $this->render('home');
    }
	public function articles() {
        $this->set('collapse_articles',true);
        $this->set('collapse_products',false);
        $this->render('explore');

    }
    public function products($page = 1) {
        $products = $this->paginate($this->Products,['page'=>$page]);

        if ($this->request->is('post')) {
            $search = $this->request->getData()['searchForContent'];
            $products = $this->Products->find('all')->where(
                [
                    'OR'=>[
                        'product_title LIKE'=> '%'.$search.'%',
                        'product_content LIKE'=> '%'.$search.'%',
                        'product_keyword LIKE'=> '%'.$search.'%',
                    ]
                ]
            )->toArray();
        }


        $this->set('collapse_products',true);
        $this->set('collapse_articles',false);

        $this->set('products',$products);

        $this->render('products');
    }

    public function introduction() {
        $this->render('about');
    }
}
