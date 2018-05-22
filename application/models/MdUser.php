<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_MdDefaultCRUD.php';

class MdUser extends MY_MdDefaultCRUD {
	
	public $table = "user"; // nama table

	function __construct() {
        parent::__construct($this->table); 
        parent::setDataField($this->dataField());
	}

	// daftar nama field 
	function dataField() {
		$data = array(
			'id_user',
			'username',
			'nama_user',
			'password',
			'level',
			'photo',
			'create_date'
		);
		return $data;
	}

	// method login
	function cekLogin($data, $status) {
		if ($status == 'login') {
			$this->db->where('username', $data['username']);
			$this->db->where('password', $data['password']);
		} else {
			$this->db->where('username', $data['username']);
		}
		$select = $this->db->get($this->table)->result();
		$result = array('count' => count($select), 'data' => $select);

		return $result;
	}
}
