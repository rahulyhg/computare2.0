<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	function __construct($id = false, $table = null, $ds = null) { 
		// Get saved company that is used for the database name 
		$dbName = Configure::read('Company'); //$dbName='computare';
		// Get common company-specific config (default settings in database.php) 
		$config = ConnectionManager::getDataSource('default')->config; 
		// Set correct database name 
		$config['database'] = $dbName;// echo 'here:'.$dbName;// exit;
		// Add new config to registry 
		$ret=ConnectionManager::create($dbName, $config); 
		// Point model to new config 
		$this->useDbConfig = $dbName; 
// 		$this->useDbConfig = 'default'; //uncomment this line to use bake
		parent::__construct($id, $table, $ds); 
	} 
	
/**
 * protected function getSchema (?sp)
 * pre:none
 * mods:if schema not set set it to 0
 * post: return schema
 */
	protected function getSechema() {
		//get schema # from table comments
		$q=$this->query('show table status where Name="'.$this->table.'"');
		$schema=$q[0]['TABLES']['Comment'];
		if($schema==='') {
			//schema not set
			$this->setSchema(0);
			$schema=0;
		}//endif
		return $schema;
	}
	
	/**
	 * protected function setSchema
	 * pre:int schema to set
	 * mods:table comment is set to schema #
	 * post:results
	 */
	protected function setSchema($schema) {
		//set table comment to correct schema
		return $this->query('alter table '.$this->table.' COMMENT="'.$schema.'"');
	}
	
	/**
	 * protected function logDBFailure($e)
	 * @param $e exception data
	 * @return null
	 */
	protected function logDBFailure($e) {
		//log db failure
		App::import('Component','ComputareSysevent');
		$this->comp=new ComputareSyseventComponent(null);
// debug($this->comp);debug($e);//exit;
		//create error message text
		$errMsg='Query String:'.$e->queryString."\r\n";
		$errMsg.='Error:';
		foreach($e->errorInfo as $msg) $errMsg.=$msg.' ';
// debug($errMsg);exit;
		$this->comp->save(array(
			'event_type'=>1,
			'title'=>'DB Update Error',
			'errorEvent'=>array('message'=>$e->xdebug_message),
		));
debug($e->xdebug_message);exit;
	}//endif
}
