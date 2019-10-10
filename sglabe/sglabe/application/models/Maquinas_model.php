<?php

class Maquinas_model extends CI_Model {
		public function __construct(){
			parent::__construct();
		}

		//Captura o codigo de todos os laboratorios cadastrados
		public function getCodLabs(){
			$res = $this->db->query("SELECT codigo_lab FROM laboratorios");
			if($res->result()){
				return $res->result();
			}else{
				return false;
			}
		}

		//cadastra maquina
		public function cadastraMaquina(){
			$data['tombo'] = $this->input->post('tombo_maquina');
			$data['descricao'] = $this->input->post('descricao_maquina');
			$data['fk_codigo_lab'] = $this->input->post('cod_lab');
			return  $this->db->query("INSERT INTO maquinas (tombo,descricao,fk_codigo_lab)VALUES(?,?,?)",$data);
		}


		//Atualiza os dados da maquina
		public function atualizaMaquina($oldTombo){
			$data['tombo'] = $this->input->post('tombo_maquina');
			$data['descricao'] = $this->input->post('descricao_maquina');
			$data['fk_codigo_lab'] = $this->input->post('cod_lab');
			return  $this->db->query("UPDATE maquinas SET tombo=?,descricao=?,fk_codigo_lab=? WHERE tombo = '$oldTombo'",$data);
		}

		//verifica se maquina ja foi cadastrada
		public function checkMaquina($tombo){
			$res = $this->db->query("SELECT tombo,fk_codigo_lab,descricao FROM maquinas WHERE tombo ='$tombo' LIMIT 1");
			if($res->row()){
				return $res->row();
			}else{
				return false;
			}
		}


		//lista maquinas cadastradas
		public function listaMaquinas(){
			$res = $this->db->query("SELECT tombo,descricao,fk_codigo_lab FROM maquinas ORDER BY fk_codigo_lab ASC");
			if($res->result()){
				return $res->result();
			}else{
				return false;
			}
		}


		//lista maquinas cadastradas
		public function listaMaquinasLaboratorio($codLab){
			$res = $this->db->query("SELECT tombo,descricao,fk_codigo_lab FROM maquinas  WHERE fk_codigo_lab=$codLab ORDER BY fk_codigo_lab ASC");
			if($res->result()){
				return $res->result();
			}else{
				return false;
			}
		}


		//Exclui uma maquina cadastrada

		public function deleteMaquina($tombo){
			return $this->db->query("DELETE FROM maquinas WHERE tombo='$tombo' LIMIT 1");
		}

}


?>