<?php
	class Event_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function get_events($slug = FALSE){
			if($slug === FALSE){
				$this->db->order_by('date', 'ASC');
				$query = $this->db->get('events');
				return $query->result_array();
			}
			$query = $this->db->get_where('events', array('slug' => $slug));
			return $query->row_array();
		}

		public function create_event(){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'date' => $this->input->post('date'),
				'time' => $this->input->post('time'),
				'location' => $this->input->post('location'),
				'slug' => $slug,
				'user_id' =>$this->session->userdata('user_id'),
			);

			$insert_data = $this->db->insert('events', $data);
			$event_id = $this->db->insert_id();

			$user_events = [];
			$invitees = $this->input->post("invitees");
			for ($x=0; $x <count($invitees); $x++){
				$user_events[] = ["user_id"=>$invitees[$x],"event_id"=>$event_id];
			}
			$this->db->insert_batch("user_events",$user_events);
			return $insert_data;
		}

		public function delete_event($id){
			$this->db->where('id', $id);
			$this->db->delete('events');
			return true;
		}

		public function update_event(){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'date' => $this->input->post('date'),
				'time' => $this->input->post('time'),
				'location' => $this->input->post('location'),
				'slug' => $slug,
			);
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('events', $data);

			$this->db->where('event_id', $this->input->post('id'));
			$this->db->delete('user_events');

			$user_events = [];
			$invitees = $this->input->post("invitees");
			for ($x=0; $x <count($invitees); $x++){
				$user_events[] = ["user_id"=>$invitees[$x],"event_id"=>$this->input->post('id')];
			}
			$this->db->insert_batch("user_events",$user_events);

			return true;
		}

		public function get_events_userid($id){
			$query = $this->db->query("SELECT * FROM events left join user_events On events.id = user_events.event_id WHERE (events.user_id = ".$id." OR user_events.user_id = ".$id.") GROUP BY events.id");
			return $query->result_array();
		}

		public function get_event_invitees($slug){
			$id = $this->get_events($slug)['id'];
			$query = $this->db->query("SELECT * FROM user_events inner join users on user_events.user_id = users.id where user_events.event_id=".$id." group by users.id ");
			return $query->result_array();
		}
	}
