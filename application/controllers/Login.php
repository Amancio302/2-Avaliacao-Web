<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller {
	
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			if(!$this->session->userdata('logon')){
				$this->load->view('login');
			}
		}
		
		public function index(){
			$this->load->library('session');
			$this->session->sess_destroy();
		}
		
		public function login(){
			$this->load->library('session');
			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('password');
			if($data['username'] == 'root' && $data['password'] == 'root'){
				$array=array("logon"=>true);
				$this->session->set_userdata($array);
				redirect('login/iniciar');
			}
			else{
				$this->session->sess_destroy();
				redirect(base_url());
			}
		}
		
		public function iniciar(){
			$this->load->library('session');
			if(!$this->session->userdata('logon')){
				$this->load->view('login');
			}
			else{
				$data['bandas'] = $this->db->get('bandas')->result();
				$this->load->view('telaInicial', $data);	
			}
		}
		
		public function logout(){
			$this->load->library('session');
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
