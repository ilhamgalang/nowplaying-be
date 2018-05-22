<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_MdDefaultCRUD.php';

class className extends MY_MdDefaultCRUD {

	public $table = ''; // nama table
	
	function __construct() {
        parent::__construct($this->table);
        parent::setDataField($this->dataField());
        parent::setDataJoinTable($this->dataJoinTable());
	}

	// daftar nama field 
	public function dataField() {
		$data = array(
			// nama field table
			// 'field1',
			// 'field2'
		);
		return $data;
	}

	// daftar table untuk join
	public function dataJoinTable() {
		$data = array(
			// 'nama table yang akan join' => array('foreignKey' => 'field foreign (table sekarang)', 'primaryKey' => 'field primary (table join)'),
			// 'table2' => array('foreignKey' => 'field1', 'primaryKey' => 'field1')
		);

		return $data;
	}
}
