<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('user_id')) ||  $this->session->userdata('user_type') != ADMIN){
        	redirect('index/login');
        }
    }

	public function dashboard(){
		$this->load->view('admin/home/dashboard');
	}
}
?>