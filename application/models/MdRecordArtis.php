<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_MdDefaultCRUD.php';

class MdRecordArtis extends MY_MdDefaultCRUD {

	public $table = 'record_artis'; // nama table
	
	function __construct() {
        parent::__construct($this->table);
        parent::setDataField($this->dataField());
        parent::setDataJoinTable($this->dataJoinTable());
	}

	// daftar nama field 
	public function dataField() {
		$data = array(
			'id_record_artis',
			'id_artis',
			'id_user',
			'create_date'
		);
		return $data;
	}

	// daftar table untuk join
	public function dataJoinTable() {
		$data = array(
			'artis' => array('foreignKey' => 'id_artis', 'primaryKey' => 'id_artis'),
			'user' => array('foreignKey' => 'id_user', 'primaryKey' => 'id_user')
		);

		return $data;
	}
}
