<?php

class Cursos_model extends CI_Model {
		public function __construct(){
			parent::__construct();
		}

		//cadastra Curso
		public function cadastraCurso(){
			$data['codigo_curso'] = mb_strtoupper($this->input->post('codigo_curso'));
			$data['nome_curso'] = $this->input->post('nome_curso');			
			return  $this->db->query("INSERT INTO cursos (codigo_curso, descricao)VALUES(?,?)",$data);
		}

		//verifica se o Curso ja foi cadastrado
		public function checkCurso($valor){
			$res = $this->db->query("SELECT codigo_curso, descricao FROM cursos WHERE codigo_curso ='$valor' OR descricao = '$valor' LIMIT 1");
			if($res->row()){
				return $res->row();
			}else{
				return false;
			}
		}

			//Atualiza os dados do curso
		public function atualizaCurso($oldCodCurso){
			$data['codigo_curso'] = mb_strtoupper($this->input->post('codigo_curso'));
			$data['descricao'] = $this->input->post('nome_curso');
			return  $this->db->query("UPDATE cursos SET codigo_curso=?,descricao=? WHERE codigo_curso = '$oldCodCurso'",$data);
		}

		//Lista Curso
		public function listarCursos(){
			$res = $this->db->query("SELECT codigo_curso, descricao FROM cursos");
			if($res->result()){
				return $res->result();
			}else{
				return false;
			}
		}
}
?>