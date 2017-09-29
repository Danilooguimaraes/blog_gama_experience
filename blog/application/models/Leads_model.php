<?php
	class Leads_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function create_post(){
			$this->load->helper(array("url", "text"));
			$data = array('nome'=>$this->input->post('name'),
							'email'=> $this->input->post('email')
			);
			return $this->db->insert('posts',$data);
		}
	}
?>