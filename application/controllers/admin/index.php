<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function login(){
		$this->load->view('admin/index/login');
	}

	public function authenticate(){
		if($this->input->post()){
			$this->load->model('admin/users');
			$result = $this->users->authenticate($this->input->post());
	        if(count($result) > 0){
	        	if(!empty($result->activation_link)){
		        	$this->session->set_flashdata('error','Please verify your email address.');
		        	redirect('index/login');
	        	}else{
		        	$this->setSession($result);
		        	redirect('admin/home/dashboard');
	        	}
	        }else{
	        	$this->session->set_flashdata('error','Invalid login details.');
	        	redirect('index/login');
	        }
    	}else{
	        $this->session->set_flashdata('error','You don\'t have access to this URL.');
			redirect('index/login');
    	}
	}

	public function setSession($sessionData){
		$userArr = array(
        			'username' 	=> $sessionData->username,
        			'user_id'	=> $sessionData->id,
        			'created_on'=> $sessionData->created_on,
        			'last_login'=> $sessionData->last_login,
        			'registration_type' => $sessionData->registration_type,
        			'user_type' => $sessionData->user_type
        		);
    	$this->session->set_userdata($userArr);
    	return true;
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('admin/index/login');
	}
}
?>