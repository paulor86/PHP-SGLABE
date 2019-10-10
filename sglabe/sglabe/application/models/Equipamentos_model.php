<?php

class Equipamentos_model extends CI_Model {
		public function __construct(){
			parent::__construct();
		}

		//cadastra Equipamento
		public function cadastraEquipamento(){
			$data['tombo'] = $this->input->post('tombo_equipamento');
			$data['descricao'] = $this->input->post('descricao_equipamento');
			return  $this->db->query("INSERT INTO equipamentos (tombo,descricao)VALUES(?,?)",$data);
		}

		//verifica se equipamento ja foi cadastrado
		public function checkEquipamento($tombo){
			$res = $this->db->query("SELECT tombo,descricao FROM equipamentos WHERE tombo ='$tombo' LIMIT 1");
			if($res->row()){
				return $res->row();
			}else{
				return false;
			}
		}

		//Atualiza os dados do equipamento
		public function atualizaEquipamento($oldTombo){
			$data['tombo'] = $this->input->post('tombo_equipamento');
			$data['descricao'] = $this->input->post('descricao_equipamento');
			return  $this->db->query("UPDATE equipamentos SET tombo=?,descricao=? WHERE tombo = '$oldTombo'",$data);
		}


		//Lista Equipamentos
		public function listarEquipamentos(){
			$res = $this->db->query("SELECT tombo,descricao FROM equipamentos");
			if($res->result()){
				return $res->result();
			}else{
				return false;
			}
		}


		//Exclui um equipamento cadastrada

		public function deleteEquipamento($tombo){
			return $this->db->query("DELETE FROM equipamentos WHERE tombo='$tombo' LIMIT 1");
		}



}


?>