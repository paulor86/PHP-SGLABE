<?php

class Turmas_model extends CI_Model {
		public function __construct(){
			parent::__construct();
		}

		//cadastra Turma
		public function cadastraTurma(){
			$data['codigo_turma'] = mb_strtoupper($this->input->post('codigo_turma'));
			$data['fk_codigo_curso'] = $this->input->post('fk_codigo_curso');
			$data['periodo'] = $this->input->post('periodo');
			$data['turno'] = $this->input->post('turno');
			return  $this->db->query("INSERT INTO turmas (codigo_turma, fk_codigo_curso, periodo, turno)VALUES(?,?,?,?)",$data);
		}

		//verifica se a Turma ja foi cadastrada
		public function checkTurma($codigo_turma){
			$res = $this->db->query("SELECT codigo_turma,fk_codigo_curso,periodo,turno  FROM turmas WHERE codigo_turma ='$codigo_turma' LIMIT 1");
			if($res->row()){
				return $res->row();
			}else{
				return false;
			}
		}


	//Atualiza os dados do curso
		public function atualizaTurma($oldCodTurma){
			$data['codigo_turma'] =  mb_strtoupper($this->input->post('codigo_turma'));
			$data['fk_codigo_curso'] =  $this->input->post('fk_codigo_curso') ;
			$data['periodo'] =  $this->input->post('periodo');
			$data['turno'] =  $this->input->post('turno');

			return  $this->db->query("UPDATE turmas SET codigo_turma=?,fk_codigo_curso=?,periodo=?,turno=? WHERE codigo_turma = '$oldCodTurma'",$data);
		}


		//Lista Turma
		public function listarTurma(){
			$res = $this->db->query("SELECT codigo_turma, descricao,fk_codigo_curso, periodo, turno
			 FROM turmas INNER JOIN cursos ON fk_codigo_curso = codigo_curso");
			if($res->result()){
				return $res->result();
			}else{
				return false;
			}
		}
}
?>