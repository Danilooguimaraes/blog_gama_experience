<?php
	class Leads extends CI_Controller{

		public function create(){
			
			$data['title'] = 'Create Post';
			
			
				$data = array(
				'nome' => $this->input->post('firstname'),
				'email' => $this->input->post('lastname')
				
				print_r $data;
				//Finish Upload Image
				//$this->leads_model->create_post();

				//redirect('posts');
		}
	}
?>