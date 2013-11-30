<?php

class Cart extends Front_Controller {

    function __construct() {
        parent::__construct();

        //make sure we're not always behind ssl
        remove_ssl();
    }

    function index() {
        echo"<h1>Under Construction</h1>"; 
    }

   
 

}