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
}
