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
class OrdersController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	public function beforeFilter() {
		parent::beforeFilter();
		App::uses('CakeText', 'Utility');
		$this->loadModel("Orders");
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

	//Function responsible for ordering specific products and also creating a dummy user if order is made without an account
	public function orderProducts() {
		$this->autoRender = false;
		$data = (isset($this->request["data"]["orderForm"])) ?
			$this->request["data"]["orderForm"] :
			$this->Session->read("orderInfo");
		$this->loadModel("Orders");
		$this->loadModel("Users");
		$this->loadModel("Products");
		$this->loadModel("Budget");

		if (!$data || !isset($data)) {
			$this->redirect("/home");
		}

		$userUuid = CakeText::uuid();

		if (preg_match('/[^a-zA-Z\s]+/i', $data["countries"]) ||
			preg_match('/[^a-zA-Z\s]+/i', $data["city"]) ||
			preg_match('/[^a-zA-Z\s]+/i', $data["street"]) ||
			!preg_match('/(\d+[a-z]|\d+)/i', $data["house_number"])) {
			$this->redirect("/order");
		}

		if ($data["price"] == 0) {
			$this->Session->write("orderPriceError", true);
			$this->redirect("/home");
		}


		if (empty($this->Session->read("userUUID"))) {
			$this->Users->save(
				array(
					"id" => $userUuid, "name" => null, "surname" => null, "email" => null, "password" => null,
					"birth_date" => null, "country" => null, "city" => null, "street" => null, "house_number" => null,
					"flat_number" => null, "phone_number" => null, "total_points" => 0, "verified" => 0,
					"creation_date" => date("Y-m-d H:i:s"), "id_number_and_series" => null, "salary" => null,
					"internship_length" => null, "bonus_amount" => null, "holiday_amount" => null, "is_employee" => 0,
					"shop_id" => null, "role" => null, "department" => null, "email_change_creation_date" => null,
					"email_change_expiration_date" => null, "is_admin" => 0, "is_deleted" => 0
				)
			);
		}

		$products = json_decode($data["cart"], true);
		$orders = $this->Orders->find(
			"all",
			array(
				"conditions" => array(
					"Month(order_date)" => date("m"),
					"Year(order_date)" => date("Y")
				),
				"order" => array(
					"order_date DESC"
				),
				"fields" => array(
					"invoice_number"
				)
			)
		);
		$invoiceNumber = (count($orders) > 0) ? $orders[0]["Orders"]["invoice_number"] : 0;
		$this->Orders->save(
			array(
				"user_id" => (empty($this->Session->read("userUUID"))) ? $userUuid : $this->Session->read("userUUID"),
				"email" => $data["email"],
				"country" => $data["countries"],
				"city" => $data["city"],
				"street" => $data["street"],
				"flat_number" => $data["flat_number"],
				"house_number" => $data["house_number"],
				"products" => json_encode($products),
				"parcel_locker_code" => $data["deliveryType"] == "parcel_locker" ? $data["parcelLockerCode"] : null,
				"delivery_type" => $data["deliveryType"],
				"order_date" => date("Y-m-d H:i:s"),
				"shipment_date" => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " + 3 days")),
				"total_price" => $data["price"],
				"payment_method" => $data["paymentMethod"],
				"payment_date" => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " + 1 days")),
				"order_points" => (empty($this->Session->read("userUUID"))) ? 0 : floor(intval($data["price"]) / 100),
				"promo_code_id" => null,
				"currency" => $data["currency"],
				"shop_id" => null,
				"invoice_number" => ++$invoiceNumber
			)
		);

		$this->Budget->save(
			array(
				"id" => CakeText::uuid(),
				"type" => "inc",
				"amount" => round($data["price"] / floatval($data["exchangeRate"]), 2),
				"year" => date("Y"),
				"date" => date("Y-m-d"),
				"from" => "order"
			)
		);

		if (!empty($this->Session->read("userUUID"))) {
			$user = $this->Users->find("first",
				array(
					"conditions" => array(
						"id" => $this->Session->read("userUUID")
					),
					"fields" => array(
						"total_points"
					)
				)
			);
			$this->Users->updateAll(
				array("total_points" => intval($user["Users"]["total_points"]) + round(intval($data["price"]) / 100)),
				array("id" => $this->Session->read("userUUID"))
			);
		}

		for ($i = 0; $i < count($products); $i++) {
			$count = $this->Products->find("first", array("conditions" => array("id" => $products[$i]["id"])));
			$this->Products->updateAll(
				array("product_count" => intval($count["Products"]["product_count"]) - intval($products[0]["count"])),
				array("id" => $products[$i]["id"])
			);
		}

		$this->Session->delete("orderInfo");
		$this->Session->write("orderedModal", true);
		$this->redirect("/home");
	}

	//Function for returning orders
	public function getOrders() {
		$this->autoRender = false;
		$date = "";
		$price = "";
		if (!empty($this->params["url"]["priceMin"]) && !empty($this->params["url"]["priceMax"])) {
			$price = "total_price BETWEEN {$this->params["url"]["priceMin"]} AND {$this->params["url"]["priceMax"]}";
		} else if (!empty($this->params["url"]["dateMin"]) && !empty($this->params["url"]["dateMax"])) {
			$date = "order_date BETWEEN '{$this->params["url"]["dateMin"]}' AND '{$this->params["url"]["dateMax"]}'";
		} else {
			$price = "";
			$date = "";
		}

		$payment = (isset($this->params["url"]["payment"])) ? "payment_method = '{$this->params["url"]["payment"]}'" : "";
		$currency = (isset($this->params["url"]["currency"])) ? "currency = '{$this->params["url"]["currency"]}'" : "";
		$orders = $this->Orders->find("all", array("conditions" => array($price ?? null, $payment, $currency, $date)));
		$log = $this->Orders->getDataSource()->getLog(false, false);
		$this->Log($log);
		return json_encode($orders);
	}

	//Page for displaying all orders which after clicking download an invoice from clicked order
	public function invoices() {
		$this->loadModel("Orders");
		if (isset($this->params["url"]["sort_by"])) {
			$field = explode("-", $this->params["url"]["sort_by"])[0];
			$sort = explode("-", $this->params["url"]["sort_by"])[1];
		}
		$params = $this->params["url"];
		$this->set("orders",
			$this->Orders->find("all",
				array(
					"order" => array(
						isset($this->params["url"]["sort_by"]) ? ($field . " " . $sort) : "order_date DESC"
					),
					"conditions" => array(
						(
							!empty($params["priceMin"]) &&
							!empty($params["priceMax"])
						) ?
							"total_price BETWEEN " . $params["priceMin"] . " AND " . $params["priceMax"] :
							"total_price LIKE '%'",
						(
							!empty($params["dateMin"]) &&
							!empty($params["dateMax"])
						) ?
							"order_date BETWEEN '" . $params["dateMin"] . "' AND '" . $params["dateMax"] . "'":
							"order_date LIKE '%'",
						(
							!empty($params["payment"])
						) ?
							"payment_method = '" . $params["payment"] . "'" :
							"payment_method LIKE '%'",
						(
							!empty($params["currency"])
						) ?
							"currency = '" . $params["currency"] . "'" :
							"currency LIKE '%'"
					)
				)
			)
		);
	}
}
