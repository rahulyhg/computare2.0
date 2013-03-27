<?php
/**
 * SalesOrderDetailFixture
 *
 */
class SalesOrderDetailFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'salesOrderDetails';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'purchaseOrder_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'qty' => array('type' => 'integer', 'null' => false, 'default' => null),
		'rec' => array('type' => 'integer', 'null' => false, 'default' => null),
		'cost' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '12,2'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'created' => '2013-03-26 16:00:13',
			'created_id' => 1,
			'purchaseOrder_id' => 1,
			'item_id' => 1,
			'qty' => 1,
			'rec' => 1,
			'cost' => 1
		),
	);

}
