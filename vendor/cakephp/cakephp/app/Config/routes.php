<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Here, we are connecting "/" (base path) to controller called "Pages",
 * its action called "display", and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
		
	Router::parseExtensions();
	Router::connect("/search", 					   array("controller" => "products", "action" => "search"));
	Router::connect("/product", 				   array("controller" => "products", "action" => "product"));
	Router::connect("/products-list",              array("controller" => "products", "action" => "productsList"));
	Router::connect("/add-product-to-database",    array("controller" => "products", "action" => "addProductToDatabase"));
	Router::connect("/cart",                       array("controller" => "products", "action" => "cart"));
	Router::connect("/return-products-count",      array("controller" => "products", "action" => "returnProductsCount"));
	Router::connect("/inventory",      			   array("controller" => "products", "action" => "inventory"));
	Router::connect("/order",      			   	   array("controller" => "products", "action" => "order"));
	Router::connect("/insert-order-to-db",         array("controller" => "products", "action" => "insertOrderToDB"));
	Router::connect("/delivery-form",         	   array("controller" => "products", "action" => "deliveryForm"));
	Router::connect("/add-products-from-delivery", array("controller" => "products", "action" => "addProductsFromDelivery"));
	Router::connect("/remove-products-form", 	   array("controller" => "products", "action" => "removeProductsForm"));
	Router::connect("/remove-products", 	   	   array("controller" => "products", "action" => "removeProducts"));
	Router::connect("/update-image-form", 	   	   array("controller" => "products", "action" => "updateImageForm"));
	Router::connect("/update-image", 	   	   	   array("controller" => "products", "action" => "updateImage"));
	Router::connect("/invoice", 	   	   	       array("controller" => "products", "action" => "invoice"));

	Router::connect("/profile",                    array("controller" => "profiles", "action" => "profile"));
	Router::connect("/change-email-form",          array("controller" => "profiles", "action" => "changeEmailForm"));
	Router::connect("/send-change-email",          array("controller" => "profiles", "action" => "sendChangeEmail"));
	Router::connect("/change-email",          	   array("controller" => "profiles", "action" => "changeEmail"));

	Router::connect("/about-us", 				   array("controller" => "frontPages", "action" => "aboutUs"));
	Router::connect("/cooperation",                array("controller" => "frontPages", "action" => "cooperation"));
	Router::connect("/contact",                    array("controller" => "frontPages", "action" => "contact"));
	Router::connect("/partnership",                array("controller" => "frontPages", "action" => "partnership"));
	Router::connect("/terms-of-service",           array("controller" => "frontPages", "action" => "termsOfService"));
	Router::connect("/privacy-policy-and-cookies", array("controller" => "frontPages", "action" => "privacyPolicyAndCookies"));
	Router::connect("/generate-hashed-password",   array("controller" => "frontPages", "action" => "generateHashedPassword"));
	Router::connect("/change-language",            array("controller" => "frontPages", "action" => "changeLanguage"));
	Router::connect("/get-sub-categories",         array("controller" => "frontPages", "action" => "getSubCategories"));
	Router::connect("/",                           array("controller" => "frontPages", "action" => "home"));
	Router::connect("/home", 					   array("controller" => "frontPages", "action" => "home"));
	Router::connect("/register", 				   array("controller" => "frontPages", "action" => "registerPage"));
	Router::connect("/login", 					   array("controller" => "frontPages", "action" => "loginPage"));
	Router::connect("/register-employee-page", 	   array("controller" => "frontPages", "action" => "registerEmployeePage"));
	Router::connect("/site-map", 				   array("controller" => "frontPages", "action" => "siteMap"));
	Router::connect("/create-rodo-cookie", 		   array("controller" => "frontPages", "action" => "createRodoCookie"));
	Router::connect("/error-test", 		   		   array("controller" => "frontPages", "action" => "errorTest"));
	Router::connect("/gifts-catalog", 		   	   array("controller" => "frontPages", "action" => "giftsCatalog"));
	Router::connect("/remove-employee-page", 	   array("controller" => "frontPages", "action" => "removeEmployeePage"));
	Router::connect("/ask-for-account", 	   	   array("controller" => "frontPages", "action" => "askForAccount"));
	Router::connect("/forgot-password-page", 	   array("controller" => "frontPages", "action" => "forgotPasswordPage"));

	Router::connect("/logout", 					   array("controller" => "customers", "action" => "logout"));
	Router::connect("/settings", 				   array("controller" => "customers", "action" => "settings"));
	Router::connect("/change-password", 		   array("controller" => "customers", "action" => "changePassword"));
	Router::connect("/login-customer", 			   array("controller" => "customers", "action" => "login"));
	Router::connect("/activate-customer-account",  array("controller" => "customers", "action" => "activateCustomerAccount"));
	Router::connect("/register-customer", 		   array("controller" => "customers", "action" => "register"));
	Router::connect("/register-employee", 	   	   array("controller" => "customers", "action" => "registerEmployee"));
	Router::connect("/list-employees", 	   	   	   array("controller" => "customers", "action" => "listEmployees"));
	Router::connect("/admin-panel", 	   	   	   array("controller" => "customers", "action" => "adminPanel"));
	Router::connect("/grant-admin-privileges", 	   array("controller" => "customers", "action" => "grantAdminPrivileges"));
	Router::connect("/order-history", 	   		   array("controller" => "customers", "action" => "orderHistory"));
	Router::connect("/delete-account", 	   		   array("controller" => "customers", "action" => "deleteAccount"));
	Router::connect("/remove-employee", 	   	   array("controller" => "customers", "action" => "removeEmployee"));
	Router::connect("/orders-report", 	   	   	   array("controller" => "customers", "action" => "ordersReport"));
	Router::connect("/forgot-password", 	   	   array("controller" => "customers", "action" => "forgotPassword"));
	Router::connect("/update-password-page", 	   array("controller" => "customers", "action" => "updatePasswordPage"));
	Router::connect("/update-password", 	   	   array("controller" => "customers", "action" => "updatePassword"));

	Router::connect("/send-email-from-customer",   array("controller" => "mails", "action" => "sendEmailFromCustomer"));
	Router::connect("/send-forgot-password-email", array("controller" => "mails", "action" => "sendForgotPasswordEmail"));

	Router::connect("/order-products",   		   array("controller" => "orders", "action" => "orderProducts"));
	Router::connect("/get-orders",   		   	   array("controller" => "orders", "action" => "getOrders"));
	
/**
 * ...and connect the rest of "Pages" controller"s URLs.
 */
	//Router::connect("/frontPages/*", array("controller" => "frontPages", "action" => "display"));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . "Config" . DS . "routes.php";
