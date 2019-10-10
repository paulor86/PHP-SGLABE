<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acesso extends CI_Controller {
	//instancia a classe principal

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('functions');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->library('session');
		$this->load->model('Acesso_model','Banco');
		if(	$this->Banco->getDataSession('matricula') 
			&& !$this->Banco->checkSession('perfil','usuario') 
			&& $this->uri->segment(2) !='logoff'){
				redirect(base_url('Visualizar/agendamento'));
		}
	}

	//chama a tela de login do sistema
	public function index(){
		$page['pageTitle'] = "Login"; 
		$this->load->view('acesso/login',$page);
	}
	
	
	public function login(){
		$page['pageTitle'] = "Login"; 
		if($this->input->post()){
			$this->form_validation->set_rules('matricula', 'Matricula', 'required|numeric|max_length[8]|min_length[8]|trim');
			$this->form_validation->set_rules('password', 'Senha', 'required|max_length[40]|trim');
			if($this->form_validation->run() == FALSE){
						$page['alertas'] = msgError(validation_errors());
            }else{
						$res = $this->Banco->login();
						if($res){
							//verifica se o usuario é aluno
							if($res->perfil != 'usuario' && $res->status_conta ==='ativado'){
								$check =  $this->input->post('remember')? TRUE : FALSE;
								$sessao = array(
										'matricula'  => $res->matricula,
										'perfil'     => $res->perfil,
										'nome'     => $res->nome,
										'sobrenome'     => $res->sobrenome,
										'area'     => $res->area,
										'logged_in' => $check);
								$this->session->set_userdata($sessao);
								redirect(base_url('/Visualizar/agendamento'));
							}else{
								$page['alertas'] = msgError("<b>Erro</b> Sem permissão para acessar o sistema!");
							}
						}else{
							$page['alertas'] = msgError("<b>Erro</b> usuário não encontrado!");
						}
            }

			 $this->load->view('acesso/login',$page);
		}else{
			$page['alertas'] = msgError("<b>Erro</b> usuário não encontrado!");
							$this->load->view('acesso/login',$page);
		}
	}
	
	//solicita o reset da senha 
	public function requestPassword(){
		$page['pageTitle'] = "Recuperar Senha"; 
		if($this->input->post()){
			$this->form_validation->set_rules('matricula', 'Matricula', 'required|numeric|max_length[8]|min_length[8]|trim');
			$this->form_validation->set_rules('email', 'E-mail', 'required|max_length[255]|trim|valid_email');
			if($this->form_validation->run() == FALSE){
						$page['alertas'] = msgError(validation_errors());
            }else{
            	$res = $this->Banco->getDataRecover();
            	if($res){
            		$email = $this->input->post('email');
            		if(!$this->Banco->checkRequestRecover($res->matricula)){
            			//salva a solicitacao de rcuparacao de senha
            			$this->Banco->saveDataRequestPassword($res->matricula);
            			$page['alertas'] = msgSucesso("<b>Sucesso!</b> Um E-mail foi enviado para <b>$email</b>.<br> 
            				você tem 24 horas para resetar sua senha ou precisará realizar
            				 uma nova solicitação de recuperação");
            		}else{
            			$page['alertas'] = msgError("<b>Erro!</b> Já existe uma solicitação de recuparação de senha para este usuário.
            				Um novo E-mail foi enviado para <b>$email</b>.<br> 
            				você tem 24 horas para resetar sua senha ou precisará realizar
            				 uma nova solicitação de recuperação");
            		}
            		
            	}else{
            		$page['alertas'] = msgError("<b>Erro</b> Usuário não encontrado!");
            	}
            }
		}
		$this->load->view('acesso/requestPassword',$page);
	}
	

	//reseta a senha do usuario

	public function resetPassword(){
		$page['pageTitle'] = "Recuperar Senha"; 
		$page['hash'] = $this->uri->segment(3)? $this->uri->segment(3): null;
		if(!$page['hash']){
			$page['alertas'] = msgError("<b>Erro!</b> Insira uma chave de restauração válida!");
			$this->load->view('acesso/login',$page);
		}else{
			$page['dataUser'] = $this->Banco->checkHashForReset($page['hash']);
			if($page['dataUser']){
				if($this->input->post()){
					$this->form_validation->set_rules('confirm', 'Confirmação de senha', 'required|max_length[30]|trim');
					$this->form_validation->set_rules('password', 'Nova senha', 'required|max_length[30]|trim');
					if($this->form_validation->run() == FALSE){
						$page['alertas'] = msgError(validation_errors());
						$this->load->view('acesso/resetPassword',$page);
            		}else{
            				$senha = $this->input->post("password");
            				$confirm = $this->input->post("confirm");
            			if($senha != $confirm){
            				$page['alertas'] = msgError("<b>Erro!</b> as senhas digitadas são diferentes.<br>Tente novamente.");
							$this->load->view('acesso/resetPassword',$page);
            			}else{
            				$res = $this->Banco->updatePassword($page['dataUser']->fk_matricula);
            				if($res){
            					$page['alertas'] = msgSucesso("<b>Sucesso!</b> Sua senha foi atualizada.<br> Por favor faça login para continuar.");
            					$this->load->view('acesso/login',$page);
            				}else{
            					$page['alertas'] = msgErro("<b>Erro!</b> Falha ao atualizar a sua senha.<br> Entre em contato com o adminstrador do sistema.");
            					$this->load->view('acesso/resetPassword',$page);
            				}
            			}
            		}
				}else{
					$this->load->view('acesso/resetPassword',$page);
				}
			}else{
				$page['alertas'] = msgError("<b>Erro!</b> Chave de restauração invalida!");
				$this->load->view('acesso/login',$page);
			}

		}
	}


	//faz logoff do sistema

	public function logoff(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
