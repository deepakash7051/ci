<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
	public function index()
	{
	    header("Access-Control-Allow-Origin: *");
	    $data = array();
	    $this->template->set('title', 'Home');
	    $this->template->load('default_layout', 'contents' , 'home', $data);
	}
	
	public function about()
	{
	    $data = array();
	    $this->template->set('title', 'about');
	    $this->template->load('default_layout', 'contents' , 'about', $data);
	}
}
