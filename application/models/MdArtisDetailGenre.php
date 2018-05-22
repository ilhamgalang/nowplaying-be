<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_MdDefaultCRUD.php';

class MdArtisDetailGenre extends MY_MdDefaultCRUD {

	public $table = 'artis_detail_genre'; // nama table
	
	function __construct() {
        parent::__construct($this->table);
        parent::setDataField($this->dataField());
        parent::setDataJoinTable($this->dataJoinTable());
	}

	// daftar nama field 
	public function dataField() {
		$data = array(
			'id_artis_detail_genre',
			'id_artis',
			'id_genre'
		);
		return $data;
	}

	// daftar table untuk join
	public function dataJoinTable() {
		$data = array(
			'genre' => array('foreignKey' => 'id_genre', 'primaryKey' => 'id_genre')
		);

		return $data;
	}
}
