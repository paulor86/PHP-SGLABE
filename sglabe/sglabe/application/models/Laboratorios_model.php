<?php

class Laboratorios_model extends CI_Model {
		public function __construct(){
			parent::__construct();
		}

		//Captura o codigo de todos os laboratorios cadastrados
		public function getCodLabs($area){
			$res = $this->db->query("SELECT codigo_lab FROM laboratorios WHERE area = '$area'");
			if($res->result()){
				return $res->result();
			}else{
				return false;
			}
		}

		//cadastra maquina
		public function cadastraLaboratorio($area){
			$data['codigo_lab'] = $this->input->post('codigo_laboratorio');
			$data['descricao']	 = 	 $this->input->post('descricao');
			if($area =='informatica'){
				$data['num_maquinas'] = $this->input->post('n_maquina');
				return  $this->db->query("INSERT INTO laboratorios (codigo_lab,descricao,num_maquinas,area)VALUES(?,?,?,'informatica')",$data);
			}else{
				return  $this->db->query("INSERT INTO laboratorios (codigo_lab,descricao,area)VALUES(?,?,'comunicacao')",$data);
			}
		}


		//Atualiza os dados do laboratório
		public function atualizaLaboratorio($oldCodLab,$area){
			$data['codigo_lab'] = $this->input->post('codigo_laboratorio');
			$data['descricao'] = $this->input->post('descricao');			
		
			if($area =='informatica'){
				$data['num_maquinas'] = $this->input->post('n_maquina');
				return  $this->db->query("UPDATE laboratorios SET codigo_lab=?,descricao=?,num_maquinas=? WHERE codigo_lab = '$oldCodLab' AND area ='$area'",$data);
			}else{
				return  $this->db->query("UPDATE laboratorios SET codigo_lab=?,descricao=? WHERE codigo_lab = '$oldCodLab' AND area ='$area'",$data);
			}

		}

		//verifica se o laboratório ja foi cadastrado
		public function checkLaboratorio($codigo_lab){
			$res = $this->db->query("SELECT codigo_lab,num_maquinas,descricao FROM laboratorios WHERE codigo_lab ='$codigo_lab' LIMIT 1");
			if($res->row()){
				return $res->row();
			}else{
				return false;
			}
		}


		//lista laboratórios cadastrados
		public function listarLaboratorio($area){

			$res = $this->db->query("SELECT codigo_lab,num_maquinas,descricao FROM laboratorios WHERE area ='$area' ORDER BY codigo_lab ASC");
			if($res->result()){
				return $res->result();
			}else{
				return false;
			}
		}
		

}


?>