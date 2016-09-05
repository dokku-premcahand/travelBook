<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __constructor(){
		parent::__constructor();
        if(empty($this->session->userdata('user_id')) ||  $this->session->userdata('user_type') != ADMIN){
        	redirect('index/login');
        }
        $this->load->config('pagination');
	}

	public function listing($limit=20,$offset=0){
		$this->load->model('admin/users');
		$result = $this->users->getUserListing($limit,$offset);

		$config['base_url'] = base_url('admin/user/listing');
		$config['total_rows'] = $result['count'];
		$this->pagination->initialize($config);

		$this->load->view('admin/user/listing',array('data'=>$result['data'],'pagination'=>$this->pagination->create_links()));
	}
}
?>