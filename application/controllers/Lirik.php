<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_DefaultCRUD.php';

class Lirik extends MY_DefaultCRUD {

	public $model = 'MdLirik'; // nama model

	function __construct()	{
		parent::__construct($this->model);  
	}

}