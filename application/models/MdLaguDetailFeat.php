<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_MdDefaultCRUD.php';

class MdLaguDetailFeat extends MY_MdDefaultCRUD {

	public $table = 'lagu_detail_feat'; // nama table
	
	function __construct() {
        parent::__construct($this->table);
        parent::setDataField($this->dataField());
        parent::setDataJoinTable($this->dataJoinTable());
	}

	// daftar nama field 
	public function dataField() {
		$data = array(
			'id_lagu_detail_feat',
			'id_lagu',
			'feat'
		);
		return $data;
	}

	// daftar table untuk join
	public function dataJoinTable() {
		$data = array(
			'artis' => array('foreignKey' => 'feat', 'primaryKey' => 'id_artis')
		);

		return $data;
	}
}
