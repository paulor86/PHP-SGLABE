<?php

	class Usuarios_model extends CI_Model {
			public function __construct(){
				parent::__construct();
			}


		//Lista todos os usuarios com perfil de aluno
		public function listarUsuariosAlunos(){
			$res = $this->db->query("SELECT nome,sobrenome,matricula,status_conta FROM usuarios WHERE perfil='usuario' ORDER BY status_conta");
			if($res->result()){
				return $res->result();
			}else{
				return false;
			}
		}


		//Verifica se o aluno esta cadastrado no sistema
		public function checkUsuarioAluno($matricula){
			$res = $this->db->query("SELECT * FROM usuarios WHERE matricula = $matricula AND perfil='usuario' AND area='comunicacao' LIMIT 1");
			if($res->row()){
				return $res->row();
			}else{
				return false;
			}
		}

		//Desativa a conta do usuario com perfil de Aluno
		public function desativarUsuarioAluno($matricula){
			return $this->db->query("UPDATE usuarios SET status_conta='desativado' WHERE matricula = $matricula AND perfil = 'usuario' LIMIT 1");
		}

		//Ativa a conta do usuario com perfil de Aluno
		public function ativarUsuarioAluno($matricula){
			return $this->db->query("UPDATE usuarios SET status_conta='ativado' WHERE matricula = $matricula AND perfil = 'usuario' LIMIT 1");
		}

		//Cadastra um usuario com perfil de Aluno
		public function cadastrarAluno(){
			$data['nome'] = ucwords(mb_strtolower($this->input->post('nome')));
			$data['sobrenome'] =  ucwords(mb_strtolower($this->input->post('sobrenome')));
			$data['matricula'] = $this->input->post('matricula');
            $data['cpf'] = $this->input->post('cpf');
            $data['email'] =  mb_strtolower($this->input->post('email'));
            $data['telefone'] = $this->input->post('telefone');
            $data['senha'] = sha1($this->input->post('senha'));

            return  $this->db->query("INSERT INTO usuarios (nome,sobrenome,matricula,cpf,email,telefone,senha,perfil,status_conta,area)VALUES(?,?,?,?,?,?,?,'usuario','ativado','comunicacao')",$data);

		}


		//Atualiza os dados de um usuario com perfil de Aluno
		public function atualizaUsuarioAluno($matricula){
			$data['nome'] = ucwords(mb_strtolower($this->input->post('nome')));
			$data['sobrenome'] =  ucwords(mb_strtolower($this->input->post('sobrenome')));
			$data['matricula'] = $this->input->post('matricula');
            $data['cpf'] = $this->input->post('cpf');
            $data['email'] =  mb_strtolower($this->input->post('email'));
            $data['telefone'] = $this->input->post('telefone');
            $data['senha'] = sha1($this->input->post('senha'));

            return  $this->db->query("UPDATE usuarios SET nome=?,sobrenome=?,matricula=?,cpf=?,email=?,telefone=?,senha=?,perfil='usuario',status_conta='ativado',area='comunicacao' WHERE matricula=$matricula LIMIT 1",$data);

		}

		public function checkCadastroAluno($matricula,$email,$cpf){
			$res = $this->db->query("SELECT nome,sobrenome,matricula FROM usuarios WHERE matricula = $matricula AND perfil='usuario' AND area='comunicacao' OR email = '$email' AND perfil='usuario' AND area='comunicacao' OR cpf = '$cpf' AND perfil='usuario' AND area='comunicacao' LIMIT 1");
			if($res->row()){
				return $res->row();
			}else{
				return false;
			}
		}

		//------------------------------------------------------------------

		//verifica se o professor ja esta cadastrado no banco de dados
		public function checkCadastroProfessor($matricula,$email,$cpf,$area){
			$res = $this->db->query("SELECT nome,sobrenome,matricula FROM usuarios WHERE matricula = $matricula AND perfil='usuario' AND area='$area' OR email = '$email' AND perfil='usuario' AND area='$area' OR cpf = '$cpf' AND perfil='usuario' AND area='$area' LIMIT 1");
			if($res->row()){
				return $res->row();
			}else{
				return false;
			}
		}
		//Verifica se o professor esta cadastrado no sistema e se é da mesma area que o usuario logado
		public function checkUsuarioProfessor($matricula,$area){
			$res = $this->db->query("SELECT * FROM usuarios WHERE matricula = $matricula AND perfil != 'usuario' AND area='$area' LIMIT 1");
			if($res->row()){
				return $res->row();
			}else{
				return false;
			}
		}

			//Cadastra um usuario com perfil de professor
		public function cadastrarProfessor($area){
			$data['nome'] = ucwords(mb_strtolower($this->input->post('nome')));
			$data['sobrenome'] =  ucwords(mb_strtolower($this->input->post('sobrenome')));
			$data['matricula'] = $this->input->post('matricula');
            $data['cpf'] = $this->input->post('cpf');
            $data['email'] =  mb_strtolower($this->input->post('email'));
            $data['telefone'] = $this->input->post('telefone');
            $data['senha'] = sha1($this->input->post('senha'));
            $data['perfil'] = $this->input->post('perfil');
            return  $this->db->query("INSERT INTO usuarios (nome,sobrenome,matricula,cpf,email,telefone,senha,perfil,status_conta,area)VALUES(?,?,?,?,?,?,?,?,'ativado','$area')",$data);

		} 

		//Atualiza os dados de um usuario com perfil de Aluno
		public function atualizaUsuarioProfessor($matricula,$area){
			$data['nome'] = ucwords(mb_strtolower($this->input->post('nome')));
			$data['sobrenome'] =  ucwords(mb_strtolower($this->input->post('sobrenome')));
			$data['matricula'] = $this->input->post('matricula');
            $data['cpf'] = $this->input->post('cpf');
            $data['email'] =  mb_strtolower($this->input->post('email'));
            $data['telefone'] = $this->input->post('telefone');
            $data['senha'] = sha1($this->input->post('senha'));
            $data['perfil'] = $this->input->post('perfil');
            return  $this->db->query("UPDATE usuarios SET nome=?,sobrenome=?,matricula=?,cpf=?,email=?,telefone=?,senha=?,perfil=?,status_conta='ativado',area='$area' WHERE matricula=$matricula LIMIT 1",$data);

		}
		//Lista todos os usuarios com perfil de professor por area
		public function listarUsuariosProfessores($area){
			$res = $this->db->query("SELECT * FROM usuarios WHERE perfil!='usuario' AND area  = '$area' ORDER BY status_conta");
			if($res->result()){
				return $res->result();
			}else{
				return false;
			}
		}

		//Desativa a conta do usuario com perfil de Professor
		public function desativarUsuarioProfessor($matricula,$area){
			return $this->db->query("UPDATE usuarios SET status_conta='desativado' WHERE matricula = $matricula AND perfil != 'usuario' and area ='$area' LIMIT 1");
		}


		//Ativa a conta do usuario com perfil de Professor
		public function ativarUsuarioProfessor($matricula,$area){
			return $this->db->query("UPDATE usuarios SET status_conta='ativado' WHERE matricula = $matricula AND perfil != 'usuario' AND area='$area' LIMIT 1");
		}


		



	}

?>