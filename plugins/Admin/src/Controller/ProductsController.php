<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\Core\Configure;
use Cake\Filesystem\Folder;
require_once(ROOT .DS. 'src'.DS. 'Lib' . DS .'image_load.php');
use Cake\I18n\I18n;
use Cake\I18n\Time;
use image_load;
/**

/**
 * Products Controller
 *
 *
 * @method \Admin\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function initialize(){
        parent::initialize();
        $this->loadModel('Products');
        $this->loadModel('ProductTypes');
        $this->loadModel('Collections');
        $this->loadModel('ProductDescriptions');
    }
    public function index()
    {
        $products = $this->paginate($this->Products);
        $product_types = $this->ProductTypes->find('list',['keyField'=>'id','valueField'=>'name'])->toArray();
        $collections = $this->Collections->find('list',['keyField'=>'id','valueField'=>'name'])->toArray();
        $color_group = Configure::read('color_group');


        $this->set(compact('product_types'));
        $this->set(compact('collections'));
        $this->set(compact('color_group'));
        $this->set(compact('products'));
    }

    public function active_fields(){
        $this->autoRender = false;
        $id = $this->request->data['id'];
        $field = $this->request->data['field'];

        $product = $this->Products->find('all', ['conditions' => array('id' => $id)])->first();

        $live = $product->$field;

        $change = $live == 1 ? "0" : "1";
        $product->$field = $change;

        $this->Products->save($product);
        echo $change;
    }
    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        $product_types = $this->ProductTypes->find('list',['keyField'=>'id','valueField'=>'name'])->toArray();
        $collections = $this->Collections->find('list',['keyField'=>'id','valueField'=>'name'])->toArray();
        $color_group = Configure::read('color_group');
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                if(file_exists($product->image)){
                    $this->imageSavingHandler($product);
                    $this->Products->save($product);
                }
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
        $this->set(compact('product_types'));
        $this->set(compact('collections'));
        $this->set(compact('color_group'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        $product_types = $this->ProductTypes->find('list',['keyField'=>'id','valueField'=>'name'])->toArray();
        $collections = $this->Collections->find('list',['keyField'=>'id','valueField'=>'name'])->toArray();
        $color_group = Configure::read('color_group');
        $original_image = $product->image;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                if(file_exists($product->image) && $original_image != $product->image){
                    $this->imageSavingHandler($product);
                    $this->Products->save($product);
                }
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
        $this->set(compact('product_types'));
        $this->set(compact('collections'));
        $this->set(compact('color_group'));
    }

    public function deleteUnamedJar(){

    }
    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            //delete upload folder
            $folder = new Folder(WWW_ROOT . 'files/upload/products/' . $id);
            $folder->delete();
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    function imageSavingHandler($product){
        $image_path = 'files/upload/products/' . $product->id;
        $dir_image = new Folder(WWW_ROOT . $image_path, true, 0777);
        $product->image =  $this->moveResizeImage(
            $product->image,
            str_replace('files/upload/temp/', '', $product->image),
            $image_path);
        $folder = new Folder(WWW_ROOT . 'files/upload/temp');
        $folder->delete();
        $folder = new Folder(WWW_ROOT . 'files/upload/temp', true, 0777);

    }
    function moveResizeImage($image_path = null, $file_name= null, $thumb_path = null){
        if(file_exists($image_path))
        {
            $img = new image_load();
            $img->load($image_path);
//            $img->resize_to_width(600);
            $img->save($thumb_path.'/'.$file_name,100);
            return $thumb_path.'/'.$file_name;
        }
    }
}
