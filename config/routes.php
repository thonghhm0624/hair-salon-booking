<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('Route');

Router::scope('/', function ($routes) {
	$routes->extensions(['json']);
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

	$routes->connect('/',['controller' => 'Frontend', 'action' => 'index']);

	//SEARCHING
	$routes->connect('/stylistsbybranch',['controller' => 'Frontend', 'action' => 'stylistsByBranch']);

	//LOGIN & LOGOUT
    $routes->connect('/login',['controller' => 'Frontend', 'action' => 'login']);
    $routes->connect('/logout',['controller' => 'Frontend', 'action' => 'logout']);

    //USER FUNCTIONS
    $routes->connect('/user/',['controller' => 'Frontend', 'action' => 'user']);
    $routes->connect('/user/:userfunction',['controller' => 'Frontend', 'action' => 'user'], ['pass'=>['userfunction']]);
    $routes->connect('/update/:information/',['controller' => 'Frontend', 'action' => 'updateinformation'], ['pass'=>['information']]);

    //RESERVATION
    $routes->connect('/reserve',['controller' => 'Frontend', 'action' => 'reserve']);
    $routes->connect('/reservationtimehandler/',['controller' => 'Frontend', 'action' => 'reservationtimehandler']);
    $routes->connect('/reservationtimecheckconflict/',['controller' => 'Frontend', 'action' => 'reservationtimecheckconflict']);

    //articles
    $routes->connect('/articles',['controller' => 'Frontend', 'action' => 'articles']);
    $routes->connect('/articles/:page',['controller' => 'Frontend', 'action' => 'articles'],['pass'=>['page']]);
    $routes->connect('/searchArticles',['controller' => 'Frontend', 'action' => 'searchArticles']);
    $routes->connect('/searchArticles/:args/:page',['controller' => 'Frontend', 'action' => 'searchArticles'],['pass'=>['args','page']]);
    $routes->connect('/articles/category/:category/:page',['controller' => 'Frontend', 'action' => 'articles_by_category'],['pass'=>['category','page']]);
    $routes->connect('/articles/details/:articleID',['controller' => 'Frontend', 'action' => 'article_details'],['pass'=>['articleID']]);

    //products
    $routes->connect('/products',['controller' => 'Frontend', 'action' => 'products']);
    $routes->connect('/products/:page',['controller' => 'Frontend', 'action' => 'products'],['pass'=>['page']]);
    $routes->connect('/searchProducts',['controller' => 'Frontend', 'action' => 'searchProducts']);
    $routes->connect('/searchProducts/:args/:page',['controller' => 'Frontend', 'action' => 'searchProducts'],['pass'=>['args','page']]);
    $routes->connect('/products/category/',['controller' => 'Frontend', 'action' => 'products_by_category']);
    $routes->connect('/products/category/:category/:page',['controller' => 'Frontend', 'action' => 'products_by_category'],['pass'=>['category','page']]);
    $routes->connect('/products/details/',['controller' => 'Frontend', 'action' => 'product_details']);
    $routes->connect('/products/details/:productID',['controller' => 'Frontend', 'action' => 'product_details'],['pass'=>['productID']]);

    //introduction
    $routes->connect('/introduction',['controller' => 'Frontend', 'action' => 'introduction']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */


    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `InflectedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'InflectedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'InflectedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('InflectedRoute');
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
