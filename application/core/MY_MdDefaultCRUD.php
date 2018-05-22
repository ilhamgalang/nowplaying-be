<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_MdDefaultCRUD extends CI_Model {

	// untuk menampung nama table
	public $table;
	// untuk menampung nama field pada database
	public $dataField = array();
	// list data table untuk join
	public $dataJoinTable = array();

	// mengambil nama table dari class model child
	function __construct($table) {
		$this->table = $table;
	}

	// mengambil data table untuk class controller
	function getTable() {
		return $this->table;
	}

	// Menerima data nama field pada database
	public function setDataField($data) {
		$this->dataField = $data;
	}

	// Menerima data nama field pada database
	public function getDataField() {
		return $this->dataField;
	}

	// Set data table untuk join 
	public function setDataJoinTable($dataJoinTable) {
		$this->dataJoinTable = $dataJoinTable;
	}

	// menampilkan data
	public function tampilData($data, $order, $limit) {
		foreach ($data as $key => $value) {
			if ($value != '') {
				$this->db->where($key, $value);
			} 
		}
		if ($order != '') {
			$this->db->order_by($order);
		}
		if ($limit != '') {
			$this->db->limit($limit);
		}
		if (count($this->dataJoinTable) > 0) {
			$this->db->select('*');
			$this->db->from($this->table);
			foreach ($this->dataJoinTable as $key => $value) {
				$this->db->join($key, "{$key}.{$value['primaryKey']} = {$this->table}.{$value['foreignKey']}");
			}
			$select = $this->db->get()->result();
		} else {
			$select = $this->db->get($this->table)->result();
		}

		return $select;
	}

	// tambah data
	public function tambahData($data) {
		$insert = $this->db->insert($this->table, $data);
		return $insert;
	}

	// ubah data
	public function ubahData($data) {
		$this->db->where('id_'.$this->table, $data['id_'.$this->table]);
		$update = $this->db->update($this->table, $data);

		return $update;
	}

	// hapus data
	public function hapusData($id) {
		$this->db->where('id_'.$this->table, $id);
		$delete = $this->db->delete($this->table);

		return $delete;
	}
}