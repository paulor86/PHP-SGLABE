<?php

class Horarios_model extends CI_Model {
		public function __construct(){
			parent::__construct();
		}

		//cadastra Curso
		public function cadastraHorario(){
			
			$inicioHora = $this->input->post('inicio_hora');
            $inicioMin = $this->input->post('inicio_minuto');
            $inicioSeg = $this->input->post('inicio_segundo');
            $fimHora = $this->input->post('fim_hora');
            $fimMin = $this->input->post('fim_minuto');
            $fimSeg = $this->input->post('fim_segundo');

            $data['tempo'] = $this->input->post('tempo');
			$data['turno'] = $this->input->post('turno');	
            $data['inicio'] = "$inicioHora:$inicioMin:$inicioSeg";
            $data['fim'] = "$fimHora:$fimMin:$fimSeg";		

			return  $this->db->query("INSERT INTO horarios (tempo, turno, inicio, fim)VALUES(?,?,?,?)",$data);
		}

		//verifica se o Curso ja foi cadastrado
		public function checkHorario($tempo,$turno){
			$res = $this->db->query("SELECT tempo, turno, inicio, fim FROM horarios WHERE tempo = $tempo AND  turno = $turno LIMIT 1");
			if($res->row()){
				return $res->row();
			}else{
				return false;
			}
		}

			//Atualiza os dados do curso
		public function atualizaHorario($oldTurno,$oldTempo){
			$inicioHora = $this->input->post('inicio_hora');
            $inicioMin = $this->input->post('inicio_minuto');
            $inicioSeg = $this->input->post('inicio_segundo');
            $fimHora = $this->input->post('fim_hora');
            $fimMin = $this->input->post('fim_minuto');
            $fimSeg = $this->input->post('fim_segundo');

            $data['tempo'] = $this->input->post('tempo');
			$data['turno'] = $this->input->post('turno');	
            $data['inicio'] = "$inicioHora:$inicioMin:$inicioSeg";
            $data['fim'] = "$fimHora:$fimMin:$fimSeg";		

			return  $this->db->query("UPDATE horarios SET tempo=?,turno=?,inicio=?,fim=? WHERE tempo = '$oldTempo' and turno = '$oldTurno'",$data);
		}



		//Lista Curso
		public function listarHorario(){
			$res = $this->db->query("SELECT tempo, turno, inicio, fim FROM horarios GROUP BY turno,tempo ");
			if($res->result()){
				return $res->result();
			}else{
				return false;
			}
		}
}
?>