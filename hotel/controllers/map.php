<?php

class Map extends Front_Controller {
	function __construct()
	{
		parent::__construct();

		//make sure we're not always behind ssl
		remove_ssl();

	}

	function index()
	{
		echo "map sx";
	}
}

?>