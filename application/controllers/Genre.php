<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_DefaultCRUD.php';

class Genre extends MY_DefaultCRUD {

	public $model = "MdGenre"; // nama model

	function __construct()	{
		parent::__construct($this->model);  
	}

}