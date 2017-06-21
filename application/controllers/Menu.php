<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Menu extends CI_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			if(!$this->session->userdata('logon')){
				redirect('login/logout');
			}
		}
		
		public function cadastrar(){
			$this->load->view('cadastro');
		}
		
		public function cadastro(){
			$data['nome'] = $this->input->post('name');
			$ano = $this->input->post('ano');
			$mes = $this->input->post('mes');
			$dia = $this->input->post('dia');
			$data['quant_integrantes'] = $this->input->post('integrantes');
			if($this->conferirAno($ano) and $this->conferirMes($mes) and $this->conferirDia($dia) and is_numeric($data['quant_integrantes']) and $data['nome']!=""){
				$data['data_fundacao'] = $ano."-".$mes."-".$dia;
				if($this->db->insert('bandas', $data)){
					redirect('login/iniciar');
				}else{
					$this->load->view('erro');
				}
			}else{
				$this->load->view('erro');
			}
		}
		
		public function alterar($id){
			$this->db->where('id', $id);
			$data['bandas'] = $this->db->get('bandas')->result();
			$this->load->view('alterar', $data);
		}
		
		public function altera(){
			$data['nome'] = $this->input->post('name');
			$ano = $this->input->post('ano');
			$mes = $this->input->post('mes');
			$dia = $this->input->post('dia');
			$id = $this->input->post('id');
			$data['quant_integrantes'] = $this->input->post('integrantes');
			if($this->conferirAno($ano) and $this->conferirMes($mes) and $this->conferirDia($dia) and is_numeric($data['quant_integrantes']) and $data['nome']!=""){
				$data['data_fundacao'] = $ano.'-'.$mes."-".$dia;
				$this->db->where('id', $id);
				if($this->db->update('bandas', $data)){
					redirect('login/iniciar');
				}else{
					$this->load->view('erro');
				}
			}else{
				$this->load->view('erro');
			}
		}
		public function excluir($id){
			$this->db->where('id', $id);
			if($this->db->delete('bandas')){
				redirect('login/iniciar');
			}else{
				$this->load->view('erro');
			}
		}
		
		public function relatorio(){
			$data['bandas'] = $this->db->get('bandas')->result();
			$this->load->view('relatorio', $data);
		}
		
		public function conferirAno($data){
			if(is_numeric($data)){
				if((int)$data<2018){
					return true;
				}
			}
			return false;
		}
		
		public function conferirMes($data){
			if(is_numeric($data)){
				if((int)$data>0 or (int)$data<13){
					return true;
				}
			}
			return false;
		}
		
		public function conferirDia($data){
			if(is_numeric($data)){
				if((int)$data>0 or (int)$data<32){
					return true;
				}
			}
			return false;
		}
	}
