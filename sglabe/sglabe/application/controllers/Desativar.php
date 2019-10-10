<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desativar extends CI_Controller {
	//instancia a classe principal 

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


	//Desativa a conta de usuario com perfil de Aluno
	public function usuario_aluno(){
		$page['pageTitle'] = "Gerenciar Alunos";
		$this->load->model('Usuarios_model','Usuarios');
		$page['matriculaAluno'] = $this->uri->segment(3);
		$page['dadosUsuarioAluno'] = $this->Usuarios->checkUsuarioAluno($page['matriculaAluno']);
		
		if($page['dadosUsuarioAluno']) {
			if($page['dadosUsuarioAluno']->status_conta ==='desativado'){
				$page['alertas'] = msgError("<b>Erro!</b> A conta ja se encontra  desativada");
			}else{
				$this->Usuarios->desativarUsuarioAluno($page['matriculaAluno']);
				$page['alertas'] = msgSucesso("<b>Sucesso!</b> O usuário informado foi desativado");
			}
		}else{
			$page['alertas'] = msgError("<b>Erro!</b> O usuário informado não foi encontrado");
		}
		$page['dataAlunos'] = $this->Usuarios->listarUsuariosAlunos();
		$this->load->view('ver/usuario_aluno',$page);
	}


	//Desativa a conta de usuario com perfil de de Professor e coordenadores
	public function usuario(){
		$page['pageTitle'] = "Gerenciar Professores";
		$this->load->model('Usuarios_model','Usuarios');
		$page['matriculaProfessor'] = $this->uri->segment(3);
		$page['dadosUsuarioProfessor'] = $this->Usuarios->checkUsuarioProfessor($page['matriculaProfessor'],$this->Banco->getDataSession('area'));
		
		if($page['dadosUsuarioProfessor']) {
			if($page['dadosUsuarioProfessor']->status_conta ==='desativado'){
				$page['alertas'] = msgError("<b>Erro!</b> A conta ja se encontra  desativada");
			}else{
				$this->Usuarios->desativarUsuarioProfessor($page['matriculaProfessor'],$this->Banco->getDataSession('area'));
				$page['alertas'] = msgSucesso("<b>Sucesso!</b> O usuário informado foi desativado");
			}
		}else{
			$page['alertas'] = msgError("<b>Erro!</b> O usuário informado não foi encontrado");
		}
		$page['dataProfessor'] = $this->Usuarios->listarUsuariosProfessores($this->Banco->getDataSession('area'));
		$this->load->view('ver/usuario',$page);
	}
}