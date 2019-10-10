<?php

class Solicitacao_Software_model extends CI_Model {
		public function __construct(){
			parent::__construct();
		}
	
			public function solicitarSoftware(){
			$descricao = $this->input->post('descricao');
			$codigo_laboratorio = $this->input->post('codigo_laboratorio');
			$tombo_maquina = $this->input->post('tombo_maquina');
			$data = date('Y-m-d H:i:s');
			$fk_matricula = $this->Banco->getDataSession('matricula');

			//cadastra os dados da solicitacao
			$query1 = $this->db->query("INSERT INTO solicitacao(fk_matricula,tipo,data_solicitacao,descricao) 
				VALUES($fk_matricula,'software','$data',?)",$descricao);
			
			//cadastra os dados em tipo_solicitacao
			foreach ($tombo_maquina as $key) {
				$query2 = true;
				if(!$this->db->query("INSERT INTO tipo_solicitacao(fk_matricula,fk_data_solicitacao,fk_tombo,fk_codigo_lab) 
					VALUES($fk_matricula,'$data',?,$codigo_laboratorio)",$key)){
					$query2 = false;
					break;
				}
			}


			//cadastra o status da solicitação
			$query3 = $this->db->query("INSERT INTO status_solicitacao(fk_matricula,fk_data_solicitacao,data_atualizacao) 
				VALUES($fk_matricula,'$data','$data')");
			
			if($query1 && $query2 && $query3){
				return true;
			}else{
				return false;
			}

}
			//listar solicitações
			public function solicitacoesSoftware(){
			$matricula = $this->Banco->getDataSession('matricula');
			$res = $this->db->query("SELECT solicitacao.fk_matricula,solicitacao.data_solicitacao,solicitacao.descricao as tmpdesc,status_solicitacao.data_atualizacao,status_solicitacao.status,tipo_solicitacao.fk_codigo_lab FROM solicitacao  INNER JOIN status_solicitacao INNER JOIN tipo_solicitacao ON  solicitacao.fk_matricula = status_solicitacao.fk_matricula AND solicitacao.fk_matricula = tipo_solicitacao.fk_matricula WHERE solicitacao.fk_matricula=$matricula  GROUP BY solicitacao.descricao ORDER BY data_solicitacao ASC");
			if($res->result()){
				return $res->result();
			}else{
				return false;
			}
		}

		



}
?>