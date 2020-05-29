<?php
class Events extends CI_Controller{
	public function index(){
		$data['title']= 'Your Upcoming Events:';

		$data['events'] = $this->Event_model->get_events_userid($this->session->userdata('user_id'));

		$this->load->view('templates/header');
		$this->load->view('events/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL){
		$data['event'] = $this->Event_model->get_events($slug);
		$data['invitees'] = $this->Event_model->get_event_invitees($slug);

		if(empty($data['event'])){
			show_404();
		}

		$data['title'] = $data['event']['title'];

		$this->load->view('templates/header');
		$this->load->view('events/view', $data);
		$this->load->view('templates/footer');
	}

	public function create(){
		//Check login status
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['title'] = 'Create Event';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('time', 'Time', 'required');

		if($this->form_validation->run() === FALSE){

			$users = $this->user_model->get_other_users($this->session->userdata('user_id'));
			$data['users'] = $users;

			$this->load->view('templates/header');
			$this->load->view('events/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Event_model->create_event();
			$this->session->set_flashdata('event_created','Your event has been created');
			redirect('events');
		}
	}

	public function view_public_events(){
		$data['title']= 'Upcoming Public Events:';

		$this->load->view('templates/header');
		$this->load->view('events/publicindex', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id){
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$this->Event_model->delete_event($id);
		$this->session->set_flashdata('event_deleted','Your event has been deleted');
		redirect('events');
	}

	public function edit($slug){
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['event'] = $this->Event_model->get_events($slug);
		$users = $this->user_model->get_other_users($this->session->userdata('user_id'));
		$data['users'] = $users;
		$data['invitees'] = $this->Event_model->get_event_invitees($slug);
		$data['slug'] = $slug;

		//check user
		if($this->session->userdata('user_id')!= $this->Event_model->get_events($slug)['user_id']){
			redirect('users/login');
		}

		if(empty($data['event'])){
			show_404();
  		}

		$data['title'] = 'Edit Post';

		$this->load->view('templates/header');
		$this->load->view('events/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update(){
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$this->Event_model->update_event();
		$this->session->set_flashdata('event_updated','Your event has been updated');
		redirect('events');
	}



}
