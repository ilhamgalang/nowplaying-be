<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_MdDefaultCRUD.php';

class MdRecordSearch extends MY_MdDefaultCRUD {

	public $table = 'record_search'; // nama table
	
	function __construct() {
        parent::__construct($this->table);
        parent::setDataField($this->dataField());
        parent::setDataJoinTable($this->dataJoinTable());
	}

	// daftar nama field 
	public function dataField() {
		$data = array(
			'id_record_search',
			'id_user',
			'search',
			'create_date'
		);
		return $data;
	}

	// daftar table untuk join
	public function dataJoinTable() {
		$data = array(
			'user' => array('foreignKey' => 'id_user', 'primaryKey' => 'id_user')
		);

		return $data;
	}
}
