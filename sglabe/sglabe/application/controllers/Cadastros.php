<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastros extends CI_Controller {
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
			redirect(base_url());
		}
   	}

	
	public function curso(){
		$page['pageTitle'] = "Cadastrar Curso";
		$this->load->model('Cursos_model','Curso');
		if($this->input->post()){
			$this->form_validation->set_rules('codigo_curso', 'Código do Curso', 'required|max_length[8]|trim');
			$this->form_validation->set_rules('nome_curso', 'Nome do Curso', 'required|max_length[40]|trim');
			if($this->form_validation->run() == FALSE){
						$page['alertas'] = msgError(validation_errors());
            }else{
             
            	if(!$this->Curso->checkCurso($this->input->post('nome_curso')) && !$this->Curso->checkCurso($this->input->post('codigo_curso'))){
	            	if($this->Curso->cadastraCurso()){
	            		$page['alertas'] = msgSucesso("<b>Sucesso!</b> Curso cadastrado");
	            	}else{
	            		$page['alertas'] = msgError("<b>Erro!</b> Verifique os dados digitados e tente novamente");
	            	}
            	}else{
            		$page['alertas'] = msgError("<b>Erro!</b> O curso informado ja foi cadastrado.");

            	}
            }
		}
		$this->load->view('cadastros/curso',$page);
	
}
	
	public function disciplina(){
		$page['pageTitle'] = "Cadastrar Disciplina";

		$this->load->model('Disciplinas_model','Disciplina');
		if($this->input->post()){
			$this->form_validation->set_rules('codigo_disciplina', 'Código da Disciplina', 'required|max_length[8]|trim');
			$this->form_validation->set_rules('descricao_disciplina', 'Descrição da disciplina', 'required|max_length[40]|trim');
			if($this->form_validation->run() == FALSE){
						$page['alertas'] = msgError(validation_errors());
            }else{
            	if(!$this->Disciplina->checkDisciplina($this->input->post('codigo_disciplina')) && !$this->Disciplina->checkDisciplina($this->input->post('descricao_disciplina'))){
	            	if($this->Disciplina->cadastraDisciplina()){
	            		$page['alertas'] = msgSucesso("<b>Sucesso!</b> Disciplina cadastrada");
	            	}else{
	            		$page['alertas'] = msgError("<b>Erro!</b> Verifique os dados digitados e tente novamente");
	            	}
            	}else{
            		$page['alertas'] = msgError("<b>Erro!</b> A disciplina informada ja foi cadastrada no sistema");

            	}
            }
		} 
		$page['dataCursos'] = $this->Disciplina->listarDisciplina(); 
		$this->load->view('cadastros/disciplina',$page);
	}
    
    

	public function equipamento(){
		$page['pageTitle'] = "Cadastrar Equipamento"; 
		$this->load->model('Equipamentos_model','Equipamento');
		if($this->input->post()){
			$this->form_validation->set_rules('tombo_equipamento', 'Tombo do equipamento', 'required|max_length[30]|trim');
			$this->form_validation->set_rules('descricao_equipamento', 'Descrição da máquina', 'required|max_length[255]|trim');
			if($this->form_validation->run() == FALSE){
						$page['alertas'] = msgError(validation_errors());
            }else{
            	$res = $this->Equipamento->checkEquipamento($this->input->post('tombo_equipamento'));
            	if(!$res){
	            	if($this->Equipamento->cadastraEquipamento()){
	            		$page['alertas'] = msgSucesso("<b>Sucesso!</b> Equipamento cadastrado");
	            	}else{
	            		$page['alertas'] = msgError("<b>Erro!</b> Verifique os dados digitados e tente novamente");
	            	}
            	}else{
            		$page['alertas'] = msgError("<b>Erro!</b> O equipamento informado ja foi cadastrado.");

            	}
            }
		}
		$this->load->view('cadastros/equipamento',$page);
	}


	public function horario(){
		$page['pageTitle'] = "Cadastrar Horário";
		$this->load->model('Horarios_model','Horario');
		if($this->input->post()){
			$this->form_validation->set_rules('tempo', 'Cadastrar Horário','required|numeric|max_length[1]|trim');
			$this->form_validation->set_rules('turno', 'Cadastrar Turno', 'required|numeric|max_length[1]|trim');
			$this->form_validation->set_rules('inicio_hora', 'Hora do início', 'required|max_length[2]|trim');
			$this->form_validation->set_rules('inicio_minuto', 'Minuto do horario de início', 'required|max_length[2]|trim');
			$this->form_validation->set_rules('inicio_segundo', 'Segundo do horario de início', 'required|max_length[2]|trim');
			$this->form_validation->set_rules('fim_hora', 'Hora do fim', 'required|max_length[2]|trim');
			$this->form_validation->set_rules('fim_minuto', 'Minuto do horario de fim', 'required|max_length[2]|trim');
			$this->form_validation->set_rules('fim_segundo', 'Segundo do horario de fim', 'required|max_length[2]|trim');

			if($this->form_validation->run() == FALSE){
						$page['alertas'] = msgError(validation_errors());
            }else{
            	if($this->input->post('tempo')<=0){
            		$page['alertas'] = msgError("<b>Erro!</b> O tempo deve ser maior que 0");
            	}else if(!$this->Horario->checkHorario($this->input->post('tempo'),$this->input->post('turno'))){
            		
	            	if($this->Horario->cadastraHorario()){
	            		$page['alertas'] = msgSucesso("<b>Sucesso!</b> Horário cadastrado");
	            	}else{
	            		$page['alertas'] = msgError("<b>Erro!</b> Verifique os dados digitados e tente novamente");
	            	}
            	}else{
            		$page['alertas'] = msgError("<b>Erro!</b> O horário informado ja foi cadastrado no sistema");

            	}
            }
		}		 
		$this->load->view('cadastros/horario',$page);
	}


	public function laboratorio(){
		$page['pageTitle'] = "Cadastrar Laboratório";
		$this->load->model('Laboratorios_model','Labs');
		$page['getLabs'] = $this->Labs->getCodLabs($this->Banco->getDataSession('area')); 
		if($this->input->post()){
			$this->form_validation->set_rules('codigo_laboratorio', 'Número do Laboratório', 'required|max_length[11]|trim');
			$this->form_validation->set_rules('descricao', 'Descrição', 'required|max_length[40]|trim');		

			if($this->Banco->getDataSession('area') == 'informatica'){
				$this->form_validation->set_rules('n_maquina', 'Número de Máquinas', 'required|max_length[11]|trim');
			}	
			if($this->form_validation->run() == FALSE){
						$page['alertas'] = msgError(validation_errors());
            }else{
            	$res = $this->Labs->checkLaboratorio($this->input->post('codigo_laboratorio'));
            	if(!$res){
	            	if($this->Labs->cadastraLaboratorio($this->Banco->getDataSession('area'))){
	            		$page['alertas'] = msgSucesso("<b>Sucesso!</b> Laboratório cadastrado");
	            	}else{
	            		$page['alertas'] = msgError("<b>Erro!</b> Verifique os dados digitados e tente novamente");
	            	}
            	}else{
            		$page['alertas'] = msgError("<b>Erro!</b> O Laboratório informado ja foi cadastrado no sistema");

            	}
            }
		} 

		$this->load->view('cadastros/laboratorio',$page);
	}


	public function maquina(){
		$page['pageTitle'] = "Cadastrar Computador";
		$this->load->model('Maquinas_model','Maquinas');
		$this->load->model('Laboratorios_model','Labs');
		$page['getLab'] = $this->Labs->getCodLabs($this->Banco->getDataSession('area')); 
		if($this->input->post()){
			$this->form_validation->set_rules('tombo_maquina', 'Tombo da máquina', 'required|max_length[30]|trim');
			$this->form_validation->set_rules('descricao_maquina', 'Descrição da máquina', 'required|max_length[255]|trim');
			$this->form_validation->set_rules('cod_lab', 'Laboratório', 'required|numeric|trim');
			if($this->form_validation->run() == FALSE){
						$page['alertas'] = msgError(validation_errors());
            }else{
            	$res = $this->Maquinas->checkMaquina($this->input->post('tombo_maquina'));
            	if(!$res){
	            	if($this->Maquinas->cadastraMaquina()){
	            		$page['alertas'] = msgSucesso("<b>Sucesso!</b> Computador cadastrado");
	            	}else{
	            		$page['alertas'] = msgError("<b>Erro!</b> Verifique os dados digitados e tente novamente");
	            	}
            	}else{
            		$page['alertas'] = msgError("<b>Erro!</b> O computador informado ja foi cadastrado no laboratorio <b>{$res->fk_codigo_lab}</b>");

            	}
            }
		}
		$this->load->view('cadastros/maquina',$page);
	}
	

	public function turma(){
		$page['pageTitle'] = "Cadastrar Turma"; 
		$this->load->model('Cursos_model','Cursos');
		$this->load->model('Turmas_model','Turma');
		$page['dataTurma'] = $this->Turma->listarTurma();
		if($this->input->post()){
			$this->form_validation->set_rules('codigo_turma', 'Código da Turma', 'required|max_length[8]|trim');
			$this->form_validation->set_rules('fk_codigo_curso', 'Código do Curso', 'required|max_length[8]|trim');
			$this->form_validation->set_rules('periodo', 'Período', 'required|max_length[11]|trim');
			$this->form_validation->set_rules('turno', 'Turno', 'required|trim');
			if($this->form_validation->run() == FALSE){
						$page['alertas'] = msgError(validation_errors());
            }else{
            	$res = $this->Turma->checkTurma($this->input->post('codigo_curso'));
            	if(!$res){
	            	if($this->Turma->cadastraTurma()){
	            		$page['alertas'] = msgSucesso("<b>Sucesso!</b> Turma cadastrada");
	            	}else{
	            		$page['alertas'] = msgError("<b>Erro!</b> Verifique os dados digitados e tente novamente");
	            	}
            	}else{
            		$page['alertas'] = msgError("<b>Erro!</b> A turma informada ja foi cadastrada no sistema <b>{$res->fk_codigo_lab}</b>");

            	}
            }
		} 
		$page['dataCursos'] = $this->Cursos->listarCursos();
		$this->load->view('cadastros/turma',$page);
	}


	

	//cadastra um aluno
	public function usuario_aluno(){
		$page['pageTitle'] = "Cadastrar Aluno"; 
		$this->load->model('Usuarios_model','Aluno');
		if($this->input->post()){
			$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[30]|trim');
			$this->form_validation->set_rules('sobrenome', 'Sobrenome', 'required|max_length[70]|trim');
			$this->form_validation->set_rules('matricula', 'Matrícula', 'required|numeric|max_length[8]|min_length[8]|trim');
			$this->form_validation->set_rules('cpf', 'CPF', 'required|min_length[14]|max_length[14]|trim');
			$this->form_validation->set_rules('email', 'E-mail', 'required|max_length[120]|trim');
			$this->form_validation->set_rules('telefone', 'Telefone', 'required|max_length[20]|trim');
			$this->form_validation->set_rules('senha', 'Senha', 'required|max_length[40]|trim');
			if($this->form_validation->run() == FALSE){
						$page['alertas'] = msgError(validation_errors());
            }else{
            	$matricula = $this->input->post('matricula');
            	$cpf = $this->input->post('cpf');
            	$email = $this->input->post('email');
            	$res = $this->Aluno->checkCadastroAluno($matricula,$email,$cpf);
            	if(!$res){
	            	if($this->Aluno->cadastrarAluno()){
	            		$page['alertas'] = msgSucesso("<b>Sucesso!</b> Aluno cadastrado");
	            	}else{
	            		$page['alertas'] = msgError("<b>Erro!</b> Verifique os dados digitados e tente novamente");
	            	}
            	}else{
            		$page['alertas'] = msgError("<b>Erro!</b> Alguns dados informados ja fazem parte do cadastro do(a) aluno(a) <b>{$res->nome} {$res->sobrenome}: {$res->matricula}</b><br>
            		 verifique os dados de E-mail,CPF e Matricula digitados e tente novamente.");

            	}
            }
		} 
		$this->load->view('cadastros/usuario_aluno',$page);
	}



	//cadastra um professor
	public function usuario(){
		$page['pageTitle'] = "Cadastrar Professor"; 
		$this->load->model('Usuarios_model','Professor');
		if($this->input->post()){
			$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[30]|trim');
			$this->form_validation->set_rules('sobrenome', 'Sobrenome', 'required|max_length[70]|trim');
			$this->form_validation->set_rules('matricula', 'Matrícula', 'required|numeric|max_length[8]|min_length[8]|trim');
			$this->form_validation->set_rules('cpf', 'CPF', 'required|min_length[14]|max_length[14]|trim');
			$this->form_validation->set_rules('email', 'E-mail', 'required|max_length[120]|trim');
			$this->form_validation->set_rules('telefone', 'Telefone', 'required|max_length[20]|trim');
			$this->form_validation->set_rules('senha', 'Senha', 'required|max_length[40]|trim');
			$this->form_validation->set_rules('perfil', 'Perfil', 'required|max_length[20]|trim');

			if($this->form_validation->run() == FALSE){
						$page['alertas'] = msgError(validation_errors());
            }else{
            	$matricula = $this->input->post('matricula');
            	$cpf = $this->input->post('cpf');
            	$email = $this->input->post('email');
            	$res = $this->Professor->checkCadastroProfessor($matricula,$email,$cpf,$this->Banco->getDataSession('area'));

            	if(!$res){
	            	if($this->Professor->cadastrarProfessor($this->Banco->getDataSession('area'))){
	            		$page['alertas'] = msgSucesso("<b>Sucesso!</b> Professor cadastrado");
	            	}else{
	            		$page['alertas'] = msgError("<b>Erro!</b> Verifique os dados digitados e tente novamente");
	            	}
            	}else{
            		$page['alertas'] = msgError("<b>Erro!</b> Alguns dados informados ja fazem parte do cadastro do(a) professor(a) <b>{$res->nome} {$res->sobrenome}: {$res->matricula}</b><br>
            		 verifique os dados de E-mail,CPF e Matricula digitados e tente novamente.");

            	}
            }
		} 
		$this->load->view('cadastros/usuario',$page);
	}

}
