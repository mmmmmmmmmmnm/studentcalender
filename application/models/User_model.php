<?php

	class User_model extends CI_Model{

		public function register($enc_password, $key){
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'security_question' => $this->input->post('security_question'),
				'security_answer' => $this->input->post('security_answer'),
				'password' => $enc_password,
				'activation_key' => $key,
			);

			return $this->db->insert('users',$data);
		}

		//Log user in

		public function login($username, $password){
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->id;
			}else {
				return false;
			}
		}

		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('username'=>$username));
			if(empty($query->row_array())){
				return true;
			} else{
				return false;
			}
		}

		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email'=>$email));
			if(empty($query->row_array())){
				return true;
			} else{
				return false;
			}
		}

		public function update_acc(){

			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'password' => $enc_password,
			);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('users',$data);
		}

		public function get_users($id){
			$query = $this->db->get_where('users', array('id'=>$id));
		}

		public function activation($key){
			$get_user = $this->db->get_where('users', array('activation_key' => $key));

        if ($get_user) {
			$data = array(
				'activation_key' => null,
				'activated' => 1,
			);
			$this->db->where('activation_key', $key);
			$this->db->update('users', $data);

			return true;
		} else {
			return false;
        }

		}

		public function get_other_users($id){
			if($this->session->userdata('logged_in')){
				$query = $this->db->get_where('users', array('id !='=>$id));
				return $query->result();
			}
		}

		public function forgot_password($email){
			$query = $this->db->get_where('email', array('email'=>$email));
			if(empty($query->row_array())){
				return true;
			} else{
				return false;
			}
		}
	}
