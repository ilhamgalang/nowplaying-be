<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_DefaultCRUD.php';

class Lagu extends MY_DefaultCRUD {

	public $model = 'MdLagu'; // nama model

	function __construct()	{
		parent::__construct($this->model);  
	}

}