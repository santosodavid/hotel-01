<?php
class Rooms extends Front_Controller {
	function __construct()
	{
		parent::__construct();

		//make sure we're not always behind ssl
		remove_ssl();

	}

	function index()
	{
		$data['active']			= "Rooms";
		$this->load->view('rooms', $data);
	}
}
?>