<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitacoes extends CI_Controller {
	//Instancia a classe principal

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('functions');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->library('session');
		$this->load->model('Acesso_model','Banco');

	}

	//Evita o acesso direto a classe
	public function index(){
		redirect(base_url(),'location');
	}
	
	
	public function rep_maquina(){
		$page['pageTitle'] = "Solicitar Reposição de Máquina";
		$this->load->model('Solicitacao_Rep_Maquina_model','Maquina');
		$this->load->model('Laboratorios_model','Labs');
		if($this->input->post()){
			$this->form_validation->set_rules('descricao', 'Descrição do Reparo', 'required|max_length[40]|trim');
			$this->form_validation->set_rules('codigo_laboratorio', 'Código do Laboratório', 'required|max_length[11]|trim');
			if($this->form_validation->run() == FALSE){
						$page['alertas'] = msgError(validation_errors());
            }else if(!isset($_POST['tombo_maquina'])){
            			$page['alertas'] = msgError("<b>Erro</b> é preciso selecionar ao menos uma máquina");
            }else{
	            if($this->Maquina->solicitarReparo()){
	            	$page['alertas'] = msgSucesso("<b>Sucesso!</b> Solicitação de reparo cadastrada");
	            }else{
	            	$page['alertas'] = msgError("<b>Erro!</b> Verifique os dados digitados e tente novamente");
	            }
            	
            }
		}
		$page['dataLaboratorio'] = $this->Labs->listarLaboratorio($this->Banco->getDataSession('area'));
		$this->load->view('solicitacoes/rep_maquina',$page);
	}


	public function software(){
		$page['pageTitle'] = "Solicitar software";
		$this->load->model('Solicitacao_Software_model','Software');
		$this->load->model('Solicitacao_Rep_Maquina_model','Maquina');
		$this->load->model('Laboratorios_model','Labs');
		if($this->input->post()){
			$this->form_validation->set_rules('descricao', 'Descrição do Reparo', 'required|max_length[40]|trim');
			$this->form_validation->set_rules('codigo_laboratorio', 'Código do Laboratório', 'required|max_length[11]|trim');
			if($this->form_validation->run() == FALSE){
						$page['alertas'] = msgError(validation_errors());
            }else if(!isset($_POST['tombo_maquina'])){
            			$page['alertas'] = msgError("<b>Erro</b> é preciso selecionar ao menos uma máquina");
            }else{
	            if($this->Software->solicitarSoftware()){
	            	$page['alertas'] = msgSucesso("<b>Sucesso!</b> Solicitação de software cadastrada");
	            }else{
	            	$page['alertas'] = msgError("<b>Erro!</b> Verifique os dados digitados e tente novamente");
	            }
            	
            }
		}
		$page['dataLaboratorio'] = $this->Labs->listarLaboratorio($this->Banco->getDataSession('area'));
		$this->load->view('solicitacoes/software',$page);
	}
	

	
}
