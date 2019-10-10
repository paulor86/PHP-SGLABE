<?php

class Acesso_model extends CI_Model {
		public function __construct(){
			parent::__construct();
		}

	
		public function login(){
			$matricula = $this->input->post('matricula');
			$senha = sha1($this->input->post('password'));
			$res = $this->db->query("SELECT * FROM usuarios WHERE matricula = $matricula AND senha ='$senha' LIMIT 1");
			if($res->row()){
				return $res->row();
			}else{
				return false;
			}
		}

		//Verifica se usuario existe no banco para resetar a senha
		public function getDataRecover(){
			$matricula = $this->input->post('matricula');
			$email = $this->input->post('email');
			$res = $this->db->query("SELECT matricula FROM usuarios WHERE matricula = $matricula AND email ='$email' LIMIT 1");
			if($res->row()){
				return $res->row();
			}else{
				return false;
			}
		}

		//Verifica se ja ha solitações de reset de senha
		public function checkRequestRecover($matricula){
			$res = $this->db->query("SELECT fk_matricula FROM recuperar_senha WHERE fk_matricula = $matricula LIMIT 1");
			if($res->row()){
				return true;
			}else{
				return false;
			}
		}
		//Grava os dados da solicitação de reset de senha
		public function saveDataRequestPassword($matricula){
			$hash = sha1(time());
			$this->db->query("INSERT INTO recuperar_senha (chave,fk_matricula) VALUES ('$hash',$matricula)");
			return $hash;
		}

		//Verifica se existe a hash de restauração no banco
		public function checkHashForReset($hash){
			$res = $this->db->query("SELECT fk_matricula FROM recuperar_senha WHERE chave = '$hash' LIMIT 1");
			if($res->row()){
				return $res->row();
			}else{
				return false;
			}
		}

		//Atualiza a senha do usuario
		 public function updatePassword($matricula){
		 	$senha = sha1($this->input->post("password"));
		 	if($this->db->query("UPDATE usuarios SET senha ='$senha' WHERE matricula = $matricula")
		 	 && $this->db->query("DELETE FROM recuperar_senha WHERE fk_matricula = $matricula")){
		 		return true;
		 	}else{
		 		return false;
		 	}
		 }

		 //Verifica um dado do usuario logado
		public function checkSession($variavel,$valor){
				return $this->session->userdata($variavel) === $valor;
		}

		public function getDataSession($variavel){
				return $this->session->userdata($variavel);
		}

		
		
}


?>