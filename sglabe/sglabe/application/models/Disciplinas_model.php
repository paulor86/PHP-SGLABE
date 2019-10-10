<?php

class Disciplinas_model extends CI_Model {
		public function __construct(){
			parent::__construct();
		}

		//cadastra Disciplina
		public function cadastraDisciplina(){
			$data['codigo_disciplina'] = mb_strtoupper($this->input->post('codigo_disciplina'));
			$data['descricao_disciplina'] = ucwords(mb_strtolower($this->input->post('descricao_disciplina')));			
			return  $this->db->query("INSERT INTO disciplinas (codigo_disciplina, descricao)VALUES(?,?)",$data);
		}

		//verifica se a Disciplina ja foi cadastrada
		public function checkDisciplina($valor){
			$res = $this->db->query("SELECT codigo_disciplina, descricao FROM disciplinas WHERE codigo_disciplina ='$valor' OR descricao = '$valor' LIMIT 1");
			if($res->row()){
				return $res->row();
			}else{
				return false;
			}
		}

		//Atualiza os dados do disciplina
		public function atualizaDisciplina($oldCodDisciplina){
			$data['codigo_disciplina'] = $this->input->post('codigo_disciplina');
			$data['descricao'] = $this->input->post('descricao_disciplina');
			return  $this->db->query("UPDATE disciplinas SET codigo_disciplina=?,descricao=? WHERE codigo_disciplina = '$oldCodDisciplina'",$data);
		}

		//Lista Curso
		public function listarDisciplina(){
			$res = $this->db->query("SELECT codigo_disciplina, descricao FROM disciplinas");
			if($res->result()){
				return $res->result();
			}else{
				return false;
			}
		}
}
?>