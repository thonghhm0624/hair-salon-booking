<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\Filesystem\Folder;
require_once(ROOT .DS. 'src'.DS. 'Lib' . DS .'image_load.php');
use Cake\I18n\I18n;
use Cake\I18n\Time;
use image_load;
/**
 * Collections Controller
 *
 *
 * @method \Admin\Model\Entity\Collection[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CollectionsController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->loadModel('Collections');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $collections = $this->paginate($this->Collections);

        $this->set(compact('collections'));
    }

    /**
     * View method
     *
     * @param string|null $id Collection id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $collection = $this->Collections->get($id, [
            'contain' => []
        ]);

        $this->set('collection', $collection);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $collection = $this->Collections->newEntity();
        if ($this->request->is('post')) {
            $collection = $this->Collections->patchEntity($collection, $this->request->getData());
            if ($this->Collections->save($collection)) {
                $this->Flash->success(__('The collection has been saved.'));
                if(file_exists($collection->image)){
                    $this->imageSavingHandler($collection);
                    $this->Collections->save($collection);
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The collection could not be saved. Please, try again.'));
        }
        $this->set(compact('collection'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Collection id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $collection = $this->Collections->get($id, [
            'contain' => []
        ]);
        $original_image = $collection->image;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $collection = $this->Collections->patchEntity($collection, $this->request->getData());
            if ($this->Collections->save($collection)) {
                if(file_exists($collection->image) && $original_image != $collection->image){
                    $this->imageSavingHandler($collection);
                    $this->Collections->save($collection);
                }
                $this->Flash->success(__('The collection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The collection could not be saved. Please, try again.'));
        }
        $this->set(compact('collection'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Collection id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $collection = $this->Collections->get($id);
        if ($this->Collections->delete($collection)) {
            $folder = new Folder(WWW_ROOT . 'files/upload/collections/' . $id);
            $folder->delete();
            $this->Flash->success(__('The collection has been deleted.'));
        } else {
            $this->Flash->error(__('The collection could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    function imageSavingHandler($collection){
        $image_path = 'files/upload/collections/' . $collection->id;
        $dir_image = new Folder(WWW_ROOT . $image_path, true, 0755);
        $collection->image =  $this->moveResizeImage(
            $collection->image,
            str_replace('files/upload/temp/', '', $collection->image),
            $image_path);
        $folder = new Folder(WWW_ROOT . 'files/upload/temp');
        $folder->delete();
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
