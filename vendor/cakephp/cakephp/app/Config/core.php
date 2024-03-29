<?php
/**
 * This is core configuration file.
 *
 * Use it to configure core behavior of Cake.
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

//setLocale(LC_ALL, 'deu');
Configure::write('Config.language', "");
Configure::write('Config.max_per_page', 8);

/**
 * CakePHP Debug Level:
 *
 * Production Mode:
 * 	0: No error messages, errors, or warnings shown. Flash messages redirect.
 *
 * Development Mode:
 * 	1: Errors and warnings shown, model caches refreshed, flash messages halted.
 * 	2: As in 1, but also with full debug messages and SQL output.
 *
 * In production mode, flash messages redirect after a time interval.
 * In development mode, you need to click the flash message to continue.
 */
	Configure::write('debug', 2);
	Configure::write("hierarchy", array(
		"admin-panel" => [5, 4, 3, 2, 1],
		"list-employees" => [5, 4, 3],
		"inventory" => [5, 4, 1],
		"remove-employee-page" => [5, 4],
		"orders-report" => [5, 4, 2],
		"add-product-to-database" => [5, 4, 1],
		"delivery-form" => [5, 4, 1],
		"update-employee-page" => [5, 4, 3],
		"remove-customer" => [5, 4],
		"holidays-approval-form" => [5, 3],
		"remove-products-form" => [5, 4, 1],
		"edit-product-form" => [5, 4, 1],
		"grant-admin-privileges-form" => 5,
		"revoke-admin-privileges-form" => 5,
		"product" => [5, 4, 3, 2, 1, 0],
		"search" => [5, 4, 3, 2, 1, 0],
		"products-list" => [5, 4, 3, 2, 1, 0],
		"cart" => [5, 4, 3, 2, 1, 0],
		"return-products-count" => [5, 4, 3, 2, 1],
		"order" => [5, 4, 3, 2, 1, 0],
		"add-products-from-delivery" => [5, 4, 1],
		"remove-products" => [5, 4, 1],
		"update-image-form" => [5, 4, 1],
		"update-image" => [5, 4, 1],
		"invoice" => [5, 4, 3, 2, 1, 0],
		"edit-product" => [5, 4, 1],
		"discount-random-products" => [5],
		"profile" => [5, 4, 3, 2, 1],
		"change-email-form" => [5, 4, 3, 2, 1, 0],
		"send-change-email" => [5, 4, 3, 2, 1, 0],
		"change-email" => [5, 4, 3, 2, 1, 0],
		"change-address-form" => [5, 4, 3, 2, 1, 0],
		"change-address" => [5, 4, 3, 2, 1, 0],
		"change-password-form" => [5, 4, 3, 2, 1, 0],
		"about-us" => [5, 4, 3, 2, 1, 0],
		"cooperation" => [5, 4, 3, 2, 1, 0],
		"contact" => [5, 4, 3, 2, 1, 0],
		"partnership" => [5, 4, 3, 2, 1, 0],
		"terms-of-service-pol" => [5, 4, 3, 2, 1, 0],
		"terms-of-service-eng" => [5, 4, 3, 2, 1, 0],
		"privacy-policy-and-cookies-pol" => [5, 4, 3, 2, 1, 0],
		"privacy-policy-and-cookies-eng" => [5, 4, 3, 2, 1, 0],
		"generate-hashed-password" => [5],
		"change-language" => [5, 4, 3, 2, 1, 0],
		"get-sub-categories" => [5, 4, 3, 2, 1, 0],
		"home" => [5, 4, 3, 2, 1, 0],
		"register" => [5, 4, 3, 2, 1, 0],
		"login" => [5, 4, 3, 2, 1, 0],
		"register-employee-page" => [5, 4],
		"site-map" => [5, 4, 3, 2, 1, 0],
		"create-rodo-cookie" => [5, 4, 3, 2, 1, 0],
		"error-test" => [5],
		"gifts-catalog" => [5, 4, 3, 2, 1, 0],
		"ask-for-account" => [5, 4, 3, 2, 1, 0],
		"forgot-password-page" => [5, 4, 3, 2, 1, 0],
		"regulations-of-loyalty-program-pol" => [5, 4, 3, 2, 1, 0],
		"regulations-of-loyalty-program-eng" => [5, 4, 3, 2, 1, 0],
		"marketing-materials" => [5, 4, 3, 2, 1, 0],
		"logout" => [5, 4, 3, 2, 1, 0],
		"settings" => [5, 4, 3, 2, 1, 0],
		"change-password" => [5, 4, 3, 2, 1, 0],
		"login-customer" => [5, 4, 3, 2, 1, 0],
		"activate-customer-account" => [5, 4, 3, 2, 1, 0],
		"register-customer" => [5, 4, 3, 2, 1, 0],
		"register-employee" => [5, 4],
		"grant-admin-privileges" => [5],
		"revoke-admin-privileges" => [5],
		"order-history" => [5, 4, 3, 2, 1, 0],
		"delete-account" => [5, 4, 3, 2, 1, 0],
		"remove-employee" => [5, 4],
		"forgot-password" => [5, 4, 3, 2, 1, 0],
		"update-password-page" => [5, 4, 3, 2, 1, 0],
		"update-password" => [5, 4, 3, 2, 1, 0],
		"update-employee" => [5, 4],
		"monitor-employees-worktime" => [5, 4, 3],
		"holidays-form" => [5, 4, 3, 2, 1],
		"request-holidays" => [5, 4, 3, 2, 1],
		"approve-holidays" => [5, 3],
		"reject-holidays" => [5, 3],
		"view-holidays" => [5, 4, 3, 2, 1],
		"view-sick-leave" => [5, 4, 3, 2, 1],
		"sick-leave-form" => [5, 4, 3, 2, 1],
		"request-sick-leave" => [5, 4, 3, 2, 1],
		"get-contract" => [5, 4, 3, 2, 1],
		"notice-form" => [5, 4, 3, 2, 1],
		"send-notice-request" => [5, 4, 3, 2, 1],
		"fire-employee-form" => [5, 3],
		"fire-employee" => [5, 3],
		"extend-contract-request-form" => [5, 3],
		"extend-contract-request" => [5, 3],
		"view-contract-extension-requests" => [5, 3],
		"extend-contract" => [5, 3],
		"remove-contract-extension-request" => [5, 3],
		"buy-gift" => [5, 4, 3, 2, 1, 0],
		"manage-budget" => [5, 2],
		"get-budget" => [5, 2],
		"work-hours" => [5, 4, 3, 2, 1],
		"add-timeshift" => [5, 4, 3, 2, 1],
		"get-employee-timeshifts" => [5, 4, 3, 2, 1],
		"payslips" => [5, 4, 3, 2, 1],
		"payouts" => [5, 2],
		"handle-payouts" => [5, 2],
		"send-email-from-customer" => [5, 4, 3, 2, 1, 0],
		"send-forgot-password-email" => [5, 4, 3, 2, 1, 0],
		"send-reply-to-user" => [5, 4, 3],
		"send-newsletter" => [5, 4, 3, 2, 1, 0],
		"order-products" => [5, 4, 3, 2, 1, 0],
		"get-orders" => [5, 4, 3, 2, 1],
		"invoices" => [5, 4, 3, 2, 1],
		"buy-gift" => [5, 4, 3, 2, 1, 0],
		"save-message" => [5, 4, 3, 2, 1, 0],
		"view-messages" => [5, 4, 3, 2, 1],
		"reply-to-message" => [5, 4, 3, 2, 1]
	));
	Configure::write("icons", array(
		"computers_and_laptops" => "fa-laptop",
		"peripherals" => "fa-keyboard",
		"phones_and_tablets" => "fa-mobile",
		"tv" => "fa-tv",
		"audio_sets" => "fa-headphones",
		"for_gamers" => "fa-gamepad",
		"car_accessories" => "fa-car",
		"appliances" => "fa-blender",
		"lighting" => "fa-lightbulb",
		"cameras" => "fa-camera"
	));
	Configure::write('geoApiKey', "5673dd870804dead2a2c98701296402d");
	Configure::write('zipCodeApiKey', "frezi2005");
	Configure::write('Config.language', 'pol');

/**
 * Configure the Error handler used to handle errors for your application. By default
 * ErrorHandler::handleError() is used. It will display errors using Debugger, when debug > 0
 * and log errors with CakeLog when debug = 0.
 *
 * Options:
 *
 * - `handler` - callback - The callback to handle errors. You can set this to any callable type,
 *   including anonymous functions.
 *   Make sure you add App::uses('MyHandler', 'Error'); when using a custom handler class
 * - `level` - integer - The level of errors you are interested in capturing.
 * - `trace` - boolean - Include stack traces for errors in log files.
 *
 * @see ErrorHandler for more information on error handling and configuration.
 */
	Configure::write('Error', array(
		'handler' => 'ErrorHandler::handleError',
		'level' => E_ALL & ~E_DEPRECATED,
		'trace' => true
	));

/**
 * Configure the Exception handler used for uncaught exceptions. By default,
 * ErrorHandler::handleException() is used. It will display a HTML page for the exception, and
 * while debug > 0, framework errors like Missing Controller will be displayed. When debug = 0,
 * framework errors will be coerced into generic HTTP errors.
 *
 * Options:
 *
 * - `handler` - callback - The callback to handle exceptions. You can set this to any callback type,
 *   including anonymous functions.
 *   Make sure you add App::uses('MyHandler', 'Error'); when using a custom handler class
 * - `renderer` - string - The class responsible for rendering uncaught exceptions. If you choose a custom class you
 *   should place the file for that class in app/Lib/Error. This class needs to implement a render method.
 * - `log` - boolean - Should Exceptions be logged?
 * - `extraFatalErrorMemory` - integer - Increases memory limit at shutdown so fatal errors are logged. Specify
 *   amount in megabytes or use 0 to disable (default: 4 MB)
 * - `skipLog` - array - list of exceptions to skip for logging. Exceptions that
 *   extend one of the listed exceptions will also be skipped for logging.
 *   Example: `'skipLog' => array('NotFoundException', 'UnauthorizedException')`
 *
 * @see ErrorHandler for more information on exception handling and configuration.
 */
	Configure::write('Exception', array(
		'handler' => 'ErrorHandler::handleException',
		'renderer' => 'ExceptionRenderer',
		'log' => true
	));

/**
 * Application wide charset encoding
 */
	Configure::write('App.encoding', 'UTF-8');

/**
 * To configure CakePHP *not* to use mod_rewrite and to
 * use CakePHP pretty URLs, remove these .htaccess
 * files:
 *
 * /.htaccess
 * /app/.htaccess
 * /app/webroot/.htaccess
 *
 * And uncomment the App.baseUrl below. But keep in mind
 * that plugin assets such as images, CSS and JavaScript files
 * will not work without URL rewriting!
 * To work around this issue you should either symlink or copy
 * the plugin assets into you app's webroot directory. This is
 * recommended even when you are using mod_rewrite. Handling static
 * assets through the Dispatcher is incredibly inefficient and
 * included primarily as a development convenience - and
 * thus not recommended for production applications.
 */
	//Configure::write('App.baseUrl', env('SCRIPT_NAME'));

/**
 * To configure CakePHP to use a particular domain URL
 * for any URL generation inside the application, set the following
 * configuration variable to the http(s) address to your domain. This
 * will override the automatic detection of full base URL and can be
 * useful when generating links from the CLI (e.g. sending emails).
 * If the application runs in a subfolder, you should also set App.base.
 */
	//Configure::write('App.fullBaseUrl', 'http://example.com');

/**
 * The base directory the app resides in. Should be used if the
 * application runs in a subfolder and App.fullBaseUrl is set.
 */
	//Configure::write('App.base', '/my_app');

/**
 * Web path to the public images directory under webroot.
 * If not set defaults to 'img/'
 */
	//Configure::write('App.imageBaseUrl', 'img/');

/**
 * Web path to the CSS files directory under webroot.
 * If not set defaults to 'css/'
 */
	//Configure::write('App.cssBaseUrl', 'css/');

/**
 * Web path to the js files directory under webroot.
 * If not set defaults to 'js/'
 */
	//Configure::write('App.jsBaseUrl', 'js/');

/**
 * Uncomment the define below to use CakePHP prefix routes.
 *
 * The value of the define determines the names of the routes
 * and their associated controller actions:
 *
 * Set to an array of prefixes you want to use in your application. Use for
 * admin or other prefixed routes.
 *
 * 	Routing.prefixes = array('admin', 'manager');
 *
 * Enables:
 *	`admin_index()` and `/admin/controller/index`
 *	`manager_index()` and `/manager/controller/index`
 */
	//Configure::write('Routing.prefixes', array('admin'));

/**
 * Turn off all caching application-wide.
 */
	//Configure::write('Cache.disable', true);

/**
 * Enable cache checking.
 *
 * If set to true, for view caching you must still use the controller
 * public $cacheAction inside your controllers to define caching settings.
 * You can either set it controller-wide by setting public $cacheAction = true,
 * or in each action using $this->cacheAction = true.
 */
	//Configure::write('Cache.check', true);

/**
 * Enable cache view prefixes.
 *
 * If set it will be prepended to the cache name for view file caching. This is
 * helpful if you deploy the same application via multiple subdomains and languages,
 * for instance. Each version can then have its own view cache namespace.
 * Note: The final cache file name will then be `prefix_cachefilename`.
 */
	//Configure::write('Cache.viewPrefix', 'prefix');

/**
 * Session configuration.
 *
 * Contains an array of settings to use for session configuration. The defaults key is
 * used to define a default preset to use for sessions, any settings declared here will override
 * the settings of the default config.
 *
 * ## Options
 *
 * - `Session.cookie` - The name of the cookie to use. Defaults to 'CAKEPHP'
 * - `Session.timeout` - The number of minutes you want sessions to live for. This timeout is handled by CakePHP
 * - `Session.useForwardsCompatibleTimeout` - Whether or not to make timeout 3.x compatible.
 * - `Session.cookieTimeout` - The number of minutes you want session cookies to live for.
 * - `Session.checkAgent` - Do you want the user agent to be checked when starting sessions? You might want to set the
 *    value to false, when dealing with older versions of IE, Chrome Frame or certain web-browsing devices and AJAX
 * - `Session.defaults` - The default configuration set to use as a basis for your session.
 *    There are four builtins: php, cake, cache, database.
 * - `Session.handler` - Can be used to enable a custom session handler. Expects an array of callables,
 *    that can be used with `session_save_handler`. Using this option will automatically add `session.save_handler`
 *    to the ini array.
 * - `Session.autoRegenerate` - Enabling this setting, turns on automatic renewal of sessions, and
 *    sessionids that change frequently. See CakeSession::$requestCountdown.
 * - `Session.cacheLimiter` - Configure the cache control headers used for the session cookie.
 *   See http://php.net/session_cache_limiter for accepted values.
 * - `Session.ini` - An associative array of additional ini values to set.
 *
 * The built in defaults are:
 *
 * - 'php' - Uses settings defined in your php.ini.
 * - 'cake' - Saves session files in CakePHP's /tmp directory.
 * - 'database' - Uses CakePHP's database sessions.
 * - 'cache' - Use the Cache class to save sessions.
 *
 * To define a custom session handler, save it at /app/Model/Datasource/Session/<name>.php.
 * Make sure the class implements `CakeSessionHandlerInterface` and set Session.handler to <name>
 *
 * To use database sessions, run the app/Config/Schema/sessions.php schema using
 * the cake shell command: cake schema create Sessions
 */
	Configure::write('Session', array(
		'defaults' => 'php'
	));

/**
 * A random string used in security hashing methods.
 */
	Configure::write('Security.salt', 'DYhG93b0qyJfIxfs2guVoUubWwvniR2G0FgaC9ui');

/**
 * A random numeric string (digits only) used to encrypt/decrypt strings.
 */
	Configure::write('Security.cipherSeed', '76859309657453542496749683648');

/**
 * Apply timestamps with the last modified time to static assets (js, css, images).
 * Will append a query string parameter containing the time the file was modified. This is
 * useful for invalidating browser caches.
 *
 * Set to `true` to apply timestamps when debug > 0. Set to 'force' to always enable
 * timestamping regardless of debug value.
 */
	//Configure::write('Asset.timestamp', true);

/**
 * Compress CSS output by removing comments, whitespace, repeating tags, etc.
 * This requires a/var/cache directory to be writable by the web server for caching.
 * and /vendors/csspp/csspp.php
 *
 * To use, prefix the CSS link URL with '/ccss/' instead of '/css/' or use HtmlHelper::css().
 */
	//Configure::write('Asset.filter.css', 'css.php');

/**
 * Plug in your own custom JavaScript compressor by dropping a script in your webroot to handle the
 * output, and setting the config below to the name of the script.
 *
 * To use, prefix your JavaScript link URLs with '/cjs/' instead of '/js/' or use JsHelper::link().
 */
	//Configure::write('Asset.filter.js', 'custom_javascript_output_filter.php');

/**
 * The class name and database used in CakePHP's
 * access control lists.
 */
	Configure::write('Acl.classname', 'DbAcl');
	Configure::write('Acl.database', 'default');

/**
 * Uncomment this line and correct your server timezone to fix
 * any date & time related errors.
 */
	//date_default_timezone_set('UTC');

/**
 * `Config.timezone` is available in which you can set users' timezone string.
 * If a method of CakeTime class is called with $timezone parameter as null and `Config.timezone` is set,
 * then the value of `Config.timezone` will be used. This feature allows you to set users' timezone just
 * once instead of passing it each time in function calls.
 */
	//Configure::write('Config.timezone', 'Europe/Paris');

/**
 * Cache Engine Configuration
 * Default settings provided below
 *
 * File storage engine.
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'File', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 * 		'path' => CACHE, //[optional] use system tmp directory - remember to use absolute path
 * 		'prefix' => 'cake_', //[optional]  prefix every cache file with this string
 * 		'lock' => false, //[optional]  use file locking
 * 		'serialize' => true, //[optional]
 * 		'mask' => 0664, //[optional]
 *	));
 *
 * APC (http://pecl.php.net/package/APC)
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Apc', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 * 		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional]  prefix every cache file with this string
 *	));
 *
 * Xcache (http://xcache.lighttpd.net/)
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Xcache', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 *		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional] prefix every cache file with this string
 *		'user' => 'user', //user from xcache.admin.user settings
 *		'password' => 'password', //plaintext password (xcache.admin.pass)
 *	));
 *
 * Memcached (http://www.danga.com/memcached/)
 *
 * Uses the memcached extension. See http://php.net/memcached
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Memcached', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 * 		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional]  prefix every cache file with this string
 * 		'servers' => array(
 * 			'127.0.0.1:11211' // localhost, default port 11211
 * 		), //[optional]
 * 		'persistent' => 'my_connection', // [optional] The name of the persistent connection.
 * 		'compress' => false, // [optional] compress data in Memcached (slower, but uses less memory)
 *	));
 *
 *  Wincache (http://php.net/wincache)
 *
 * 	 Cache::config('default', array(
 *		'engine' => 'Wincache', //[required]
 *		'duration' => 3600, //[optional]
 *		'probability' => 100, //[optional]
 *		'prefix' => Inflector::slug(APP_DIR) . '_', //[optional]  prefix every cache file with this string
 *	));
 */

/**
 * Configure the cache handlers that CakePHP will use for internal
 * metadata like class maps, and model schema.
 *
 * By default File is used, but for improved performance you should use APC.
 *
 * Note: 'default' and other application caches should be configured in app/Config/bootstrap.php.
 *       Please check the comments in bootstrap.php for more info on the cache engines available
 *       and their settings.
 */
$engine = 'File';

// In development mode, caches should expire quickly.
$duration = '+999 days';
if (Configure::read('debug') > 0) {
	$duration = '+10 seconds';
}

// Prefix each application on the same server with a different string, to avoid Memcache and APC conflicts.
$prefix = 'myapp_';

/**
 * Configure the cache used for general framework caching. Path information,
 * object listings, and translation cache files are stored with this configuration.
 */
Cache::config('_cake_core_', array(
	'engine' => $engine,
	'prefix' => $prefix . 'cake_core_',
	'path' => CACHE . 'persistent' . DS,
	'serialize' => ($engine === 'File'),
	'duration' => $duration
));

/**
 * Configure the cache for model and datasource caches. This cache configuration
 * is used to store schema descriptions, and table listings in connections.
 */
Cache::config('_cake_model_', array(
	'engine' => $engine,
	'prefix' => $prefix . 'cake_model_',
	'path' => CACHE . 'models' . DS,
	'serialize' => ($engine === 'File'),
	'duration' => $duration
));
