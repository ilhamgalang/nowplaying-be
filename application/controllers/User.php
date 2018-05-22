<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_DefaultCRUD.php';

class User extends MY_DefaultCRUD {

	public $model = "MdUser"; // nama model

	function __construct()	{
		parent::__construct($this->model);  
	}

	// override
	// Mengirim atau menambah data
	function create_post() {
		$data = array(
				'username' 	=> $this->post('username'),
				'nama_user'	=> $this->post('nama_user'),
				'password'	=> sha1($this->post('password')),
				'level'	=> (null !== $this->post('level')) ? $this->post('level') : 1,
				'photo'	=> $this->post('photo')
		);
		$cekUser = $this->modelName->cekLogin($data, 'register');
		if ($cekUser['count'] == 0) {
			$result = $this->modelName->tambahData($data);
		}
		if ($cekUser['count'] > 0) {
			$this->response(array(
				'message' => 'Username is Already Exists',
				'status' => 0), 
				200);			
		} else if ($result && $cekUser['count'] == 0) {
			$this->response(array(
				'data' => $data,
				'message' => 'Create Account Success',
				'status' => 1), 
				200);
		} else {
			$this->response(array('message' => 'Gagal Menambah Data', 200));
		}
	}

	// override
	// Mengubah data
	function update_put() {
		$table = $this->modelName->getTable();
		$id = $this->put('id_'.$table);
		$data = array(
				'id_user'	=> $this->put('id_user'),
				'username' 	=> $this->put('username'),
				'nama_user'	=> $this->put('nama_user'),
				'password'	=> sha1($this->put('password')),
				'level'	=> (null !== $this->put('level')) ? $this->put('level') : 1,
				'photo'	=> $this->put('photo')
		);
		$result = $this->modelName->ubahData($data);

		if ($result) {
			$this->response($data, 200);
		} else {
			$this->response(array('message' => 'Gagal Mengubah Data', 502));
		}
	}

	// cek login
	function cekLogin_post() {
		$table = $this->modelName->getTable();
		$data = array(
				'username' => $this->post('username'),
				'password' => sha1($this->post('password'))
		);
		$result = $this->modelName->cekLogin($data, 'login');

		if ($result['count'] > 0) {
			$this->response(array('message' => 'Berhasil Login', 
									'status' => 1,
									'data' => $result['data'])
									,200);
		} else {
			$this->response(array('message' => 'Gagal Login',
									'status' => 0
									), 200);
		}
	}

}