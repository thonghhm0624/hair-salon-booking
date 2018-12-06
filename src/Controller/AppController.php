<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Mailer\Email;
require_once(ROOT .DS. 'src'.DS. 'Lib' . DS .'Mobile_Detect.php');
use Mobile_Detect;
use Cake\I18n\I18n;
use Cake\Routing\Router;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadModel('Stylists');
        $this->loadModel('Branches');
        $this->loadModel('Services');


        $this->response->header(
			array(
				'X-Frame-Options' => 'DENY',
				'X-XSS-Protection'=> 1,
				'Strict-Transport-Security'=>'max-age=15552000; includeSubDomains; preload'
			)
		);

		$this->set('action',$this->request->getParam('action'));
		// set language
		$this->loadComponent('Languages');
		$this->Languages->setLanguageSite(); 
        
		// Detect device
		$Mobile_Detect = new Mobile_Detect();
        $Properties = $Mobile_Detect->getProperties();
        
        $this->web_browser = 'Other';
        $arr_browser = array('Firefox', 'Chrome', 'IE');
        foreach($arr_browser as $browser){
            if($Mobile_Detect->version($browser)){
                $this->web_browser = $browser;
                break;
            }
        }
        
		$this->device_info = 'Desktop';
		$this->device_info_type = '';
		if ($Mobile_Detect->isTablet()) {
			$this->device_info = 'Tablet';
			if ($Mobile_Detect->isiPad())
				$this->device_info_type = 'Ipad';	
			else if ($Mobile_Detect->isAndroidOS())
				$this->device_info_type = 'Android';
			else
				$this->device_info_type = 'others';
			
		}
		else if ($Mobile_Detect->isMobile()) {
			 $this->device_info = 'Mobile';
			 if ($Mobile_Detect->isiPhone())
				$this->device_info_type = 'Iphone';	
			 else if ($Mobile_Detect->isAndroidOS())
				$this->device_info_type = 'Android';	
			 else
				$this->device_info_type = 'others';
		}
		$this->set('device_info', $this->device_info);	
		$this->set('device_info_type', $this->device_info_type);
        $this->set('web_browser', $this->web_browser);
		$this->set('environment', Configure::read('environment'));
        
		// GA account
		$ga_account = Configure::read('ga_account');
		$this->set('ga_account', !empty($ga_account[$this->language]) ? $ga_account[$this->language] : '');   
		
		//Sharing Data
		$share_message= array(
			'site_name' => array(
					'en' => "Gent - Best hair salon for MEN"
			),
			'description' => array(
					'en' => "Gent - Best hair salon for MEN"
			),
			'title' => array(
					'en' => "Gent - Best hair salon for MEN"
			),
			'image' => array(

					'en' => Router::url('/', true) . 'img/logo.jpg'
			),
			'image_twitter' => array(

					'en' => Router::url('/', true) . 'img/logo.jpg'
			),
			'description_twitter' => array(

					'en' => "Website."
			),
			'url' => array(
				'en' =>  Router::url('/en', true)
			)
		);
		$this->set('captchaKey', Configure::read('captchaKey'));
		$this->share_message = $share_message;
		$this->set('share_message',$this->share_message); 
		
		/*$this->loadComponent('Cookie');
		$this->Cookie->config([
			'expires' => '+365 days',
			'encryption' => 'aes',
			'key' => 'BLISS\BLISS_HBPTOJECT_05102016'
			//'httpOnly' => true
		]);
		$this->Cookie->config('path', '/');
		$this->Cookie->configKey('Name'); */
		$stylists_select = $this->Stylists->find('all')->select(['stylist_id','stylist_name'])->toArray();
        $branches_select = $this->Branches->find('all')->select(['branch_id','branch_address'])->toArray();
        $services_select = $this->Services->find('all')->select(['service_id','service_name','service_duration'])->toArray();
        $branches = $this->Branches->find('all')->toArray();
        $this->set('branches',$branches);
        $this->set(compact('services_select'));
        $this->set(compact('branches_select'));
        $this->set(compact('stylists_select'));

        /*GLOBAL SESSION*/
        $session = $this->request->session()->read('response');
        $this->set(compact('session'));
    }
    protected function url($options, $full = true) {
        if (!Configure::check('isLanguageByDomain')) {
            $options['language'] = $this->language;
        }
        return Router::url($options, $full);
    }
}
