<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class MY_DefaultCRUD extends REST_Controller {

	// untuk menampung nama field pada database
	public $dataField = array();

	function __construct($model)	{
		parent::__construct($config = 'rest');
		$this->load->database();
		$this->load->model($model, 'modelName');
		$this->dataField = $this->modelName->getDataField();
	}

	// Menampilkan data
	public function read_get() {
		$data = array();
		$table = $this->modelName->getTable();
		foreach ($this->dataField as $value) {
			$data[$value] = $this->get($value);
		}
		$order = $this->get('order');
		$limit = $this->get('limit');
		$result = $this->modelName->tampilData($data, $order, $limit);
		$result = array('totalItems' => count($result), 'data' => $result);
		
		if (count($result) > 0) {
			$this->response($result, 200);
		} else {
			$this->response(array('message' => 'Tidak Ada Data', 200));
		}
	}

	// Mengirim atau menambah data
	public function create_post() {
		$data = array();
		foreach ($this->dataField as $value) {
			$data[$value] = $this->post($value);
		}
		$result = $this->modelName->tambahData($data);

		if ($result) {
			$this->response($data, 200);
		} else {
			$this->response(array('message' => 'Gagal Menambah Data', 502));
		}
	}

	// Mengubah data
	public function update_put() {
		$table = $this->modelName->getTable();
		$data = array();
		foreach ($this->dataField as $value) {
			$data[$value] = $this->put($value);
		}
		$result = $this->modelName->ubahData($data);

		if ($result) {
			$this->response($data, 200);
		} else {
			$this->response(array('message' => 'Gagal Mengubah Data', 502));
		}
	}

	// Menghapus data
	public function delete_delete() {
		$table = $this->modelName->getTable();
		$id = $this->delete('id_'.$table);
		$result = $this->modelName->hapusData($id);

		if ($result) {
			$this->response(array('message' => 'Berhasil Menghapus Data'), 201);
		} else {
			$this->response(array('message' => 'Gagal Menghapus Data', 502));
		}
		
	}
}