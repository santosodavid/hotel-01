<?php 

class Book extends Front_Controller {

	function __construct()
	{
		parent::__construct();

		//make sure we're not always behind ssl
		remove_ssl();

	}

	function index(){
		//$data['homepage']		= true;
		$data['active']			= "Book";

		$this->load->view('book', $data);
	}
}
