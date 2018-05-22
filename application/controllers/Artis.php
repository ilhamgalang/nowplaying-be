<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'core/MY_DefaultCRUD.php';

class Artis extends MY_DefaultCRUD {

	public $model = "MdArtis"; // nama model

	function __construct()	{
		parent::__construct($this->model);  
	}

}