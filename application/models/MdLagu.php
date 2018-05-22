<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_MdDefaultCRUD.php';

class MdLagu extends MY_MdDefaultCRUD {

	public $table = 'lagu'; // nama table
	
	function __construct() {
        parent::__construct($this->table);
        parent::setDataField($this->dataField());
        parent::setDataJoinTable($this->dataJoinTable());
	}

	// daftar nama field 
	public function dataField() {
		$data = array(
			'id_lagu',
			'id_artis',
			'judul_lagu',
			'link_lagu',
			'cover_lagu',
			'id_album',
			'create_date'
		);
		return $data;
	}

	// daftar table untuk join
	public function dataJoinTable() {
		$data = array(
			'artis' => array('foreignKey' => 'id_artis', 'primaryKey' => 'id_artis'),
			'album' => array('foreignKey' => 'id_album', 'primaryKey' => 'id_album')
		);

		return $data;
	}
}
