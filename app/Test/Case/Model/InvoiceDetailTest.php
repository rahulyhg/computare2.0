<?php
App::uses('InvoiceDetail', 'Model');

/**
 * InvoiceDetail Test Case
 *
 */
class InvoiceDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.invoice_detail',
		'app.invoice',
		'app.customer',
		'app.customer_detail',
		'app.customer_group',
		'app.item',
		'app.item_detail',
		'app.item_category',
		'app.item_cost',
		'app.vendor',
		'app.vendor_detail',
		'app.address',
		'app.purchase_order',
		'app.purchase_order_detail',
		'app.receipt',
		'app.items_vendor',
		'app.item_serial_number',
		'app.items_location',
		'app.item_transaction',
		'app.location',
		'app.location_detail',
		'app.sale',
		'app.sales_order_detail',
		'app.sales_order',
		'app.sales_order_type',
		'app.service',
		'app.customers_item',
		'app.item_group',
		'app.groups_item',
		'app.image',
		'app.images_item',
		'app.customer_groups_item',
		'app.customer_groups_service'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvoiceDetail = ClassRegistry::init('InvoiceDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvoiceDetail);

		parent::tearDown();
	}

}
