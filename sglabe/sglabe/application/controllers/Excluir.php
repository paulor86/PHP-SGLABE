<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excluir extends CI_Controller {
	//Instancia a classe principal 

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('functions');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->library('session');
		$this->load->model('Acesso_model','Banco');

		if(!$this->Banco->getDataSession('matricula') || $this->Banco->checkSession('perfil','usuario')){
			$this->session->sess_destroy();
			redirect(base_url(),'location');
		}

	}


	public function maquina(){
		$tombo = $this->uri->segment(3);
		$page['pageTitle'] = "Gerenciar computadores";
		$this->load->model('Laboratorios_model','Labs');
		if($this->Labs->checkMaquina($tombo)){
			if($this->Labs->deleteMaquina($tombo)){
					$page['alertas'] = msgSucesso("<b>Sucesso</b> A máquina de tombo <b>$tombo</b> foi excluida!");
			}else{
				$page['alertas'] = msgError("<b>Erro</b> Falha ao excluir maquina!");
			}
		}else{
				$page['alertas'] = msgError("<b>Erro</b> Maquina não encontrada!");
		}
		$page['dataMaquinas'] = $this->Labs->listaMaquinas();
		$this->load->view('ver/maquina',$page);
	}


	public function equipamento(){
		$tombo = $this->uri->segment(3);
		$page['pageTitle'] = "Gerenciar Equipamentos";
		$this->load->model('Equipamentos_model','Equipamento');
		if($this->Equipamento->checkEquipamento($tombo)){
			if($this->Equipamento->deleteEquipamento($tombo)){
					$page['alertas'] = msgSucesso("<b>Sucesso</b> O Equipamento de tombo <b>$tombo</b> foi excluido!");
			}else{
				$page['alertas'] = msgError("<b>Erro</b> Falha ao excluir equipamento!");
			}
		}else{
				$page['alertas'] = msgError("<b>Erro</b> Equipamento não encontrado!");
		}
		$page['dataEquipamentos'] = $this->Equipamento->listarEquipamentos();
		$this->load->view('ver/equipamento',$page);
	}

}
