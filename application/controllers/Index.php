<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	private $user = "";

	public function __construct() {
        parent::__construct();
        $this->load->library('facebook');
        $this->load->model('users');
		include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
		include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
    }

    public function home(){
    	$this->load->view('index/home');
    }

	public function index()
	{
		$gClient = $this->googleApiObject();
		$data['google_url'] = $gClient->createAuthUrl();

		$data['facebook_url'] = $this->facebook->getLoginUrl(array(
			'redirect_uri' => base_url('index/facebookLogin'), 
			'scope' => array("email") // permissions here
		));
		$this->load->view('index/index',$data);
	}

	public function authentication(){
		if($this->input->post()){
			$post = $this->input->post();
	        $result = $this->users->authenticate($post);
	        if(count($result) > 0){
	        	if(!empty($result->activation_link)){
		        	$this->session->set_flashdata('error','Please verify your email address.');
		        	redirect('index/login');
	        	}else{
		        	$this->setSession($result);
		        	redirect('home/MyTravelBook');
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

	public function facebookLogin(){
		$user = $this->facebook->getUser();
		if ($user) {
			try {
				$data['user_profile'] = $this->facebook->api('/me?fields=name,first_name,last_name,email,gender,link,locale,updated_time');
				
				$emailCheck = $this->users->checkEmail($data['user_profile']['email']);
				if($emailCheck == 0){
					$data['user_profile']['registration_type'] = 2;
					$insertData = $this->users->socialLogin($data['user_profile']);
				}else{
					$insertData = $this->users->getUserFromEmailId($data['user_profile']['email']);
				}
				$this->setSession($insertData);
				redirect('home/MyTravelBook');
			} catch (FacebookApiException $e) {
				$this->session->set_flashdata('error','<strong>Login failed.</strong> Please try after sometime.');
				redirect('index/login');
			}
		}else {
			$this->session->set_flashdata('error','<strong>Login failed.</strong> Please try after sometime.');
			redirect('index/login');
		}
	}

	public function googleLogin(){
        $gClient = $this->googleApiObject();
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		
		if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
	        $token = $this->session->userdata('token');
			
	        if (!empty($token)) {
	            $gClient->setAccessToken($token);
	            
		        if($gClient->getAccessToken()) {
		            $userProfile = $google_oauthV2->userinfo->get();
		            
					$emailCheck = $this->users->checkEmail($userProfile['email']);
					if($emailCheck == 0){
						$userProfile['registration_type'] = 3;
						$insertData = $this->users->socialLogin($userProfile);
					}else{
						$insertData = $this->users->getUserFromEmailId($userProfile['email']);
					}
					$this->setSession($insertData);
					redirect('home/MyTravelBook');
		        }else{
		        	redirect('index/login');
		        }
	        }else{
	        	redirect('index/login');
	        }
        }else{
        	redirect('index/login');
        }
	}

	public function logout(){
		$this->session->sess_destroy();
		if($this->session->userdata('registration_type') == 2){
			$facebookLogoutUrl = $this->facebook->getLogoutUrl(array(
				'redirect_uri' => base_url()
			));
			redirect($facebookLogoutUrl);
		}else if($this->session->userdata('registration_type') == 3){
			redirect('https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue='.base_url());
		}
		redirect('index/TravelBook');
	}

	public function setSession($sessionData){
		$userArr = array(
        			'username' 	=> $sessionData->username,
        			'user_id'	=> $sessionData->id,
        			'created_on'=> $sessionData->created_on,
        			'last_login'=> $sessionData->last_login,
        			'registration_type' => $sessionData->registration_type
        		);
    	$this->session->set_userdata($userArr);
    	return true;
	}

	public function googleApiObject(){
        $this->load->config('google');

		$gClient = new Google_Client();
		$gClient->setApplicationName($this->config->item('appName'));
        $gClient->setClientId($this->config->item('clientId'));
        $gClient->setClientSecret($this->config->item('clientSecret'));
        $gClient->setRedirectUri(base_url('index/googleLogin'));
        $gClient->setScopes($this->config->item('scope'));

        return $gClient;
	}

	public function registration(){
		$result = $this->users->userRegistration($this->input->post());
		if($result){
			$this->session->set_flashdata('success',$result['success']);
		}else{
			$this->session->set_flashdata('errors',$result['error']);
		}
		redirect('index/login');
	}

	public function checkEmail(){
		$email = $this->input->post('email');
		
		$result['count'] = $this->users->checkEmail($email);
		echo json_encode($result);
	}

	public function verifyEmailId($string){
		$result = $this->users->verifyEmailId($string);
		
		if($result[0]->count > 0){
			$this->session->set_flashdata('success','Email address verified successfully');
			redirect('index/login');
		}else{
			$this->session->set_flashdata('error','Invalid email verification link.');
			redirect('index/login');
		}
	}
}

