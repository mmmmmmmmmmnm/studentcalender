<?php
	class Users extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('user_model');
			$this->load->model('email_model', 'php_email');
			//load session library
			$this->load->helper('cookie');
		}

		//Register User
		public function register(){
			$data['title'] = 'Sign up';

			$this->form_validation->set_rules('first_name','First Name','required');
			$this->form_validation->set_rules('last_name','Last Name','required');
			$this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
			$this->form_validation->set_rules('email','Email','required|valid_email|callback_check_email_exists');
			$this->form_validation->set_rules('security_question','Security Question','required');
			$this->form_validation->set_rules('security_answer','Security Answer','required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('password2','Confirm Password','matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register',$data);
				$this->load->view('templates/footer');

			} else{
				//encrypt pass
				$enc_password = md5($this->input->post('password'));

				$key = md5(random_string('alnum', 6));

				$this->user_model->register($enc_password, $key);

				$this->php_email->send_validation_email($this->input->post('email'),'testEmail','Welcome to Student Calender, please follow the link below to activate your account: '.site_url('activation').'/'.$key );

				$this->session->set_flashdata('user_registered','Your account is registered, check your designated email to activate your account');

				redirect('users/login');
			}
		}


		//Log in user

		public function login(){
			$data['title'] = 'Sign in';

			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login',$data);
				$this->load->view('templates/footer');

			} else{
				//Get username
				$username = $this->input->post('username');
				//get and encrypt pass
				if ($this->input->post('chkremember')){
					$this->input->set_cookie('uusername', $username, 86500); //save cookie for one day
					$this->input->set_cookie('upassword', $this->input->post('password'), 86500);
					}
				$password= md5($this->input->post('password'));

				//login user
				$user_id = $this->user_model->login($username, $password);

				if($user_id){
					//create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);
					$this->session->set_userdata($user_data);
					//set message


					$this->session->set_flashdata('user_loggedin','You are now logged in');

					redirect('events');

				}else{
					$this->session->set_flashdata('login_failed','The credentials entered do not match a registered account');

					redirect('users/login');
				}
			}
		}

		//logout
		public function logout(){
			//unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			$this->session->set_flashdata('user_loggedout','Successfully logged out');

			redirect('users/login');
		}

			public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists','That username is already taken');
			if($this->user_model->check_username_exists($username)){
				return true;
			}else{
				return false;
			}
		}

		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists','That email is already registered');
			if($this->user_model->check_email_exists($email)){
				return true;
			}else{
				return false;
			}
		}

		public function account($username){
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			$data['user'] = $this->user_model->get_users($username);

			if(empty($data['event'])){
				show_404();
			}

			$data['title'] = 'My Account';

			$this->load->view('templates/header');
			$this->load->view('users/account', $data);
			$this->load->view('templates/footer');
		}

		public function update(){
				if(!$this->session->userdata('logged_in')){
					redirect('users/login');
				}

				$this->user_model->update_acc();
				$this->session->set_flashdata('account_updated','You account details have been updated');
				redirect('events');
		}

		public function activation($key){
			$result = $this->user_model->activation($key);
			if ($result == TRUE){
				$this->load->view('templates/header');
				$this->load->view('users/success');
				$this->load->view('templates/footer');
			} else {
				$this->load->view('templates/header');
				$this->load->view('users/failure');
				$this->load->view('templates/footer');
			}
		}

		public function forgot_password(){

			$this->load->view('templates/header');
			$this->load->view('users/forgot');
			$this->load->view('templates/footer');

			//$this->session->set_flashdata('password_reset','Your password has been reset');
		}

		public function process_fpassw() {
			$response = array('status' => false);
			if( !is_null($this->input->post('email')) ) {
				//$result = $this->db->get_where('users', array('email' => urldecode($this->input->post('email'))));
				$result = $this->db->from('users')
									->where('email', urldecode($this->input->post('email')))
									->get()->result_array();

				if(empty($result)){
					$response['error'] = 'No account associated with this email address.';
				} else{
					// $response['result'] = $result;
					$response['security_q'] = $result[0]['security_question'];
					$response['status'] = true;
				}
			}
			echo json_encode($response);
		}

		public function reset_pass(){

		}
}
