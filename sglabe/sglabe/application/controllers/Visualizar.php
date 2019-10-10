<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visualizar extends CI_Controller {
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

	public function index(){
		redirect(base_url(),'loaction');
	}

	public function equipamentos(){
		$page['pageTitle'] = "Gerenciar equipamentos";
		$this->load->model('Equipamentos_model','Equipamento');
		$page['dataEquipamentos'] = $this->Equipamento->listarEquipamentos();
		$this->load->view('ver/equipamento',$page);
	}

	public function maquina(){
		$page['pageTitle'] = "Gerenciar computadores";
		$this->load->model('Maquinas_model','Maquina');
		$page['dataMaquinas'] = $this->Maquina->listaMaquinas();
		$this->load->view('ver/maquina',$page);
	}

	public function agendamento(){
		if($this->Banco->checkSession('area','informatica')){
			
			if($this->Banco->checkSession('perfil','coordenador') || $this->Banco->checkSession('perfil','prof_responsavel')){
				$page['pageTitle'] = "Gerenciar agendamentos";
				$this->load->view('ver/agendamentosInformatica',$page);
			}else{
				$page['pageTitle'] = "Meus agendamentos";
				$this->load->view('ver/meusAgendamentos',$page);
			}
		}else if($this->Banco->checkSession('area','comunicacao')){
			if($this->Banco->checkSession('perfil','coordenador') || $this->Banco->checkSession('perfil','prof_responsavel')){
				$page['pageTitle'] = "Gerenciar agendamentos";
				$this->load->view('ver/agendamentosInformatica',$page);
			}else{
				$page['pageTitle'] = "Meus agendamentos";
				$this->load->view('ver/meusAgendamentos',$page);
			}
			
		}else{
			redirect(base_url());
		}
		
	}


	public function turma(){
		$page['pageTitle'] = "Gerenciar Turmas";
		$this->load->model('Turmas_model','Turma');
		$page['dataTurma'] = $this->Turma->listarTurma();
		$this->load->view('ver/turma',$page);
	}


	public function curso(){
		$page['pageTitle'] = "Gerenciar Cursos";
		$this->load->model('Cursos_model','Curso');
		$page['dataCurso'] = $this->Curso->listarCursos();
		$this->load->view('ver/curso',$page);
	}

	public function disciplina(){
		$page['pageTitle'] = "Gerenciar Disciplina";
		$this->load->model('Disciplinas_model','Disciplina');
		$page['dataDisciplina'] = $this->Disciplina->listarDisciplina();
		$this->load->view('ver/disciplina',$page);
	}

	public function horario(){
		$page['pageTitle'] = "Gerenciar Horario";
		$this->load->model('Horarios_model','Horario');
		$page['dataHorario'] = $this->Horario->listarHorario();
		$this->load->view('ver/horario',$page);
	}


	public function laboratorio(){
		$page['pageTitle'] = "Gerenciar Laboratório";
		$this->load->model('Laboratorios_model','Labs');
		$page['dataLaboratorio'] = $this->Labs->listarLaboratorio($this->Banco->getDataSession('area'));
		$this->load->view('ver/laboratorio',$page);
	}


	//Visualiza os dados dos alunos
	public function usuario_aluno(){
		$page['pageTitle'] = "Gerenciar Alunos";
		$this->load->model('Usuarios_model','Usuarios');
		$page['dataAlunos'] = $this->Usuarios->listarUsuariosAlunos();
		$this->load->view('ver/usuario_aluno',$page);
	}

	//Visualiza os dados dos alunos em uma tabela
	public function dados_usuario_aluno(){
		$this->load->model('Usuarios_model','Usuarios');
		if($this->Banco->getDataSession('area') == 'comunicacao' && ($this->Banco->getDataSession('perfil') == 'coordenador' || $this->Banco->getDataSession('perfil') == 'prof_responsavel')){

			$page['dataAluno'] = $this->Usuarios->checkUsuarioAluno($this->uri->segment(3));
			$this->load->view('auxiliar/dados_usuario_aluno',$page);
		}
		
	}
	//Visualiza os dados dos professores em uma tabela
	public function dados_usuario(){
		$this->load->model('Usuarios_model','Usuarios');
		if($this->Banco->getDataSession('perfil') != 'usuario'){

			$page['dataProfessor'] = $this->Usuarios->checkUsuarioProfessor($this->uri->segment(3),$this->Banco->getDataSession('area'));
			$this->load->view('auxiliar/dados_usuario',$page);
		}
		
	}


	//Visualiza os dados dos professores
	public function usuario(){
		$page['pageTitle'] = "Gerenciar Professores";
		$this->load->model('Usuarios_model','Usuarios');
		$page['dataProfessor'] = $this->Usuarios->listarUsuariosProfessores($this->Banco->getDataSession('area'));
		$this->load->view('ver/usuario',$page);
	}


/*
	//Visualizar solicitações software
	public function solicitar_software(){
		$page['pageTitle'] = "Gerenciar software";
		$this->load->model('Solicitacao_Software_model','Solicitar_Software');
		$page['dataSolicitar'] = $this->Solicitar->listarSolicitacoes();
		$this->load->view('ver/software',$page);
	}


	//Visualizar solicitações reparo de máquina
	public function solicitar_rep_maquina(){
		$page['pageTitle'] = "Gerenciar Reparo de Máquinas";
		$this->load->model('Solicitacao_Rep_Maquina_model','Solicitar_Rep_Maquina');
		$page['dataSolicitar'] = $this->Solicitar->listarSolicitacoes();
		$this->load->view('ver/rep_maquina',$page);
	}
*/



	//Visualizar solicitações software
	public function solicitar_software(){
		$page['pageTitle'] = "Minhas solicitções de software";
		$this->load->model('Solicitacao_Software_model','Software');
		$page['dataSolicitacao'] = $this->Software->solicitacoesSoftware();
		$this->load->view('ver/solicitacao_software',$page);
	}

	//Visualizar solicitações de Reparos
	public function solicitar_rep_maquina(){
		$page['pageTitle'] = "Minhas solicitções de reposição de maquina";
		$this->load->model('Solicitacao_Rep_Maquina_model','Maquina');
		$page['dataSolicitacaoRep'] = $this->Maquina->solicitacoesReparo();
		$this->load->view('ver/solicitacao_reparo',$page);
	}


	//visualiza as maquinas de um laboratorio
	public function listaMaquina(){
		$this->load->model("Maquinas_model","Maquinas");
		$this->load->model("Laboratorios_model","Labs");
		$codLab = $this->uri->segment(3);
		if($this->Labs->checkLaboratorio($codLab)){
			$page['dataMaquinas'] = $this->Maquinas->listaMaquinasLaboratorio($codLab);
			$this->load->view('auxiliar/maquina',$page);
		}
		
	}


	//visualizar perfil
	public function meu_perfil(){
		$page['pageTitle'] = "Meu Perfil";
		$this->load->model('Usuarios_model','Usuario');
		$page['data'] = $this->Usuario->checkUsuarioProfessor($this->Banco->getDataSession('matricula'),$this->Banco->getDataSession('area'));
		$this->load->view('ver/meu_perfil',$page);
		}
		

}



