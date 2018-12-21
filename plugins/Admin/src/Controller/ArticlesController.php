<?php
namespace Admin\Controller;

use Admin\Controller\AppController;

/**
 * Articles Controller
 *
 *
 * @method \Admin\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->loadModel('Articles');
        $this->loadModel('Categories');
        $categories =  $this->Categories->find('list',['keyField'=>'category_id','valueField'=>'category_name'])->toArray();
        $this->set(compact('categories'));
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $articles = $this->paginate($this->Articles);
        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);

        $this->set('article', $article);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                if(file_exists($article->article_image)){
                    $this->imageSavingHandler($article);
                    $this->Articles->save($article);
                }
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $this->set(compact('article'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $this->set(compact('article'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    function imageSavingHandler($article){
        $image_path = 'files/upload/articles/' . $article->id;
        $dir_image = new Folder(WWW_ROOT . $image_path, true, 0777);
        $article->article_image =  $this->moveResizeImage(
            $article->article_image,
            str_replace('files/upload/temp/', '', $article->article_image),
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
