<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('user_id'))){
        	redirect('index/login');
        }
    }

	public function addPost()
	{
		$this->load->view('post/addPostForm');
	}
}