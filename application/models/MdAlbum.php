<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_MdDefaultCRUD.php';

class MdAlbum extends MY_MdDefaultCRUD {

	public $table = "album"; // nama table
	
	function __construct() {
        parent::__construct($this->table);
        parent::setDataField($this->dataField());
        parent::setDataJoinTable($this->dataJoinTable());
	}

	// daftar nama field 
	public function dataField() {
		$data = array(
			'id_album',
			'id_artis',
			'nama_album',
			'cover_album',
			'tahun'
		);
		return $data;
	}

	// daftar table untuk join
	public function dataJoinTable() {
		$data = array(
			'artis' => array(
						'foreignKey' => 'id_artis',
						'primaryKey' => 'id_artis'
					)
		);

		return $data;
	}
}
