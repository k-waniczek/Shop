<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses("AppController", "Controller");

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link https://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class FrontPagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $components = array("Cookie", "RequestHandler");

	public $uses = array();

	public function beforeFilter() {
		parent::beforeFilter();
		if (
			strpos($_SERVER["REQUEST_URI"], "privacy-policy-and-cookies") !== false ||
			strpos($_SERVER["REQUEST_URI"], "terms-of-service") !== false) {
			if (substr($_SERVER["REQUEST_URI"], -3) != Configure::read("Config.language")) {
				$this->redirect(
					"/" .
					str_replace("/Shop/vendor/cakephp/cakephp/", "", substr($_SERVER["REQUEST_URI"], 0, -3)) .
					Configure::read("Config.language")
				);
			}
		}
//		$this->CheckPrivileges = $this->Components->load("CheckPrivileges");
//		var_dump($this->CheckPrivileges->check($_SERVER["REQUEST_URI"], $this->Session->read("userUUID")));
//		if (!$this->CheckPrivileges->check($_SERVER["REQUEST_URI"], $this->Session->read("userUUID"))) {
//			throw new ForbiddenException();
//		}
	}

/**
 * Displays a view
 *
 * @return CakeResponse|null
 * @throws ForbiddenException When a directory traversal attempt.
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect("/");
		}
		if (in_array("..", $path, true) || in_array(".", $path, true)) {
			throw new ForbiddenException();
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact("page", "subpage", "title_for_layout"));

		try {
			$this->render(implode("/", $path));
		} catch (MissingViewException $e) {
			if (Configure::read("debug")) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

	//Home page
	public function home() {
		// $this->SecurityUtils = $this->Components->load("PasswordHashing");
		// debug($this->SecurityUtils->encrypt("test12345"));
		$this->loadModel("Product");
		$this->set("randomProducts",
			$this->Product->find("all",
				array(
					"order" => "rand()",
					"limit" => 4,
					"fields" => array(
						"id",
						"name",
						"price"
					)
				)
			)
		);
		$this->set("discountedProducts",
			$this->Product->find("all",
				array(
					"fields" => array(
						"id",
						"name",
						"price",
						"discount_value"
					),
					"conditions" => array(
						"discount_value > 0"
					)
				)
			)
		);
	}


	//Registration page
	public function registerPage()
	{

	}

	//Login page
	public function loginPage() {

	}

	//Function responsible for returning all subcategories
	public function getSubCategories() {
		$this->autoRender = false;
		$this->loadModel("SubCategory");
		$subCategories = [];
		$subCategories[$this->params["url"]["category-id"]] = $this->SubCategory->find("all",
			array(
				"conditions" => array(
					"category_id" => $this->params["url"]["category-id"]
				)
			)
		);
		return json_encode($subCategories);
	}

	//Function responsibe for changing the language
	public function changeLanguage() {
		$this->autoRender = false;
		$this->Session->write("language", $this->params["url"]["lang"]);
	}

	//About us page
	public function aboutUs() {

	}


	//Cooperation page
	public function cooperation() {

	}

	//Contact page
	public function contact() {
		if (isset($this->params["url"]["template"])) {
			$this->set("template", $this->params["url"]["template"]);
		}
	}

	//Partnership page
	public function partnership() {

	}

	//Polish terms of service page
	public function termsOfServicePol() {

	}

	//English terms of service page
	public function termsOfServiceEng() {

	}

	//Polish privacy policy and cookies page
	public function privacyPolicyAndCookiesPol() {

	}

	//English privacy policy and cookies page
	public function privacyPolicyAndCookiesEng() {

	}

	//Site for generating hashed password
	public function generateHashedPassword() {
		$this->autoRender = false;
		$this->SecurityUtils = $this->Components->load("PasswordHashing");
		debug($this->SecurityUtils->encrypt($this->params["url"]["p"]));
	}

	//Register employee page
	public function registerEmployeePage() {

	}

	//Site map
	public function siteMap() {
		$this->layout = false;
		$this->RequestHandler->respondAs('xml');
	}

	//Function responsible for creating a RODO cookie
	public function createRodoCookie() {
		$this->autoRender = false;
		$this->Cookie->write("rodo_accepted", true, false, "6 months");
		//$this->set("rodoCookie", $this->Cookie->read("rodo_accepted"));
	}

	//Error testing page
	public function errorTest() {
		$this->autoRender = false;
		throw new ForbiddenException();
	}


	//Gifts catalog page
	public function giftsCatalog() {
		$this->loadModel("Gifts");
		$this->loadModel("User");
		$this->set("userPoints",
			$this->User->find(
				"first",
				array(
					"conditions" => array(
						"id" => $this->Session->read("userUUID")
					),
					"fields" => "total_points"
				)
			)["User"]["total_points"]
		);
		$this->set("gifts", $this->Gifts->find("all"));
	}

	//Remove employee page
	public function removeEmployeePage() {
		$this->loadModel("User");
		$employees = $this->User->find("all",
			array(
				"conditions" => array(
					"is_employee" => 1,
					"is_deleted" => 0,
					"is_admin" => 0
				),
				"fields" => array(
					"id",
					"name",
					"surname",
					"email"
				)
			)
		);
		$arr = [];
		for ($i = 0; $i < count($employees); $i++) {
			$arr[$employees[$i]["User"]["id"]] =
				$employees[$i]["User"]["name"] . " " .
				$employees[$i]["User"]["surname"] . " - " .
				$employees[$i]["User"]["email"];
		}
		$this->set("employees", $arr);
	}

	//Ask for account page
	public function askForAccount() {
		$this->Session->write("orderInfo", $this->request["data"]["orderForm"]);
	}

	//Forgot password page
	public function forgotPasswordPage() {

	}

	//Polish regulations for loyalty program page
	public function regulationsOfLoyaltyProgramPol() {

	}

	//English regulations of loyalty program page
	public function regulationsOfLoyaltyProgramEng() {

	}

	//Marketing materials page
	public function marketingMaterials() {

	}
}
