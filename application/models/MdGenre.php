<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_MdDefaultCRUD.php';

class MdGenre extends MY_MdDefaultCRUD {

	public $table = "genre"; // nama table
	
	function __construct() {
        parent::__construct($this->table);
        parent::setDataField($this->dataField());
        parent::setDataJoinTable($this->dataJoinTable());
	}

	// daftar nama field 
	public function dataField() {
		$data = array(
			// nama field table
			'id_genre',
			'genre'
		);
		return $data;
	}

	// daftar table untuk join
	public function dataJoinTable() {
		$data = array(
			// nama table => field yang sama
		);

		return $data;
	}
}
