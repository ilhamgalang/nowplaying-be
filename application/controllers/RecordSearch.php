<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_DefaultCRUD.php';

class RecordSearch extends MY_DefaultCRUD {

	public $model = 'MdRecordSearch'; // nama model

	function __construct()	{
		parent::__construct($this->model);  
	}

}