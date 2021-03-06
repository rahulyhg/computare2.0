<?php
App::uses('AppModel', 'Model');
/**
 * Vendor Model
 *
 * @property Address $Address
 * @property ItemCost $ItemCost
 * @property PurchaseOrder $PurchaseOrder
 * @property Receipt $Receipt
 * @property VendorDetail $VendorDetail
 * @property Item $Item
 */
class Vendor extends AppModel {

    public $displayField = 'name';

	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->virtualFields['name'] = 'select name from vendorDetails where vendorDetails.id='.$this->alias.'.vendorDetail_id';
	}
/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'computare';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Address' => array(
			'className' => 'Address',
			'foreignKey' => 'vendor_id',
			'dependent' => false,
			'conditions' => 'Address.active',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Contact' => array(
			'className' => 'Contact',
			'foreignKey' => 'vendor_id',
			'dependent' => false,
			'conditions' => 'Contact.active',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ItemCost' => array(
			'className' => 'ItemCost',
			'foreignKey' => 'vendor_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => array('ItemCost.created'=>'desc'),
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'PurchaseOrder' => array(
			'className' => 'PurchaseOrder',
			'foreignKey' => 'vendor_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Receipt' => array(
			'className' => 'Receipt',
			'foreignKey' => 'vendor_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Revision' => array(
			'className' => 'VendorDetail',
			'foreignKey' => 'vendor_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

/**
 * hasOne associations
 */
	public $belongsTo = array (
		'VendorDetail' => array(
			'className' => 'VendorDetail',
			'foreignKey' => 'vendorDetail_id',
		)
	);
		
/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Item' => array(
			'className' => 'Item',
			'joinTable' => 'items_vendors',
			'foreignKey' => 'vendor_id',
			'associationForeignKey' => 'item_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
