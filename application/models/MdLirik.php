<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_MdDefaultCRUD.php';

class MdLirik extends MY_MdDefaultCRUD {

	public $table = 'lirik'; // nama table
	
	function __construct() {
        parent::__construct($this->table);
        parent::setDataField($this->dataField());
        parent::setDataJoinTable($this->dataJoinTable());
	}

	// daftar nama field 
	public function dataField() {
		$data = array(
			'id_lirik',
			'id_lagu',
			'lirik'
		);
		return $data;
	}

	// daftar table untuk join
	public function dataJoinTable() {
		$data = array(
			'lagu' => array('foreignKey' => 'id_lagu', 'primaryKey' => 'id_lagu')
		);

		return $data;
	}
}
