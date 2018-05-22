<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_MdDefaultCRUD.php';

class MdArtis extends MY_MdDefaultCRUD {

	public $table = "artis"; // nama table
	
	function __construct() {
        parent::__construct($this->table);
        parent::setDataField($this->dataField());
        parent::setDataJoinTable($this->dataJoinTable());
	}

	// daftar nama field 
	public function dataField() {
		$data = array(
			// nama field table
			'id_artis',
			'nama_artis',
			'cover_artis',
			'create_date'
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
