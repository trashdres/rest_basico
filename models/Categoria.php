<?php
class Categoria extends Conectar{
	
	public function get_categoria(){
		$conectar = parent::conexion();
		parent::set_names();
		$sql="SELECT * FROM categoria WHERE cat_estado = 1";
		$sql=$conectar->prepare($sql);
		$sql->execute();
		return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function get_categoria_x_id($cat_id){
		$conectar= parent::conexion();
		parent::set_names();
		$sql="SELECT * FROM categoria WHERE cat_estado = 1 AND cat_id = ?";
		$sql=$conectar->prepare($sql);
		$sql->bindValue(1, $cat_id);
		$sql->execute();
		return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function insert_categoria($cat_titulo){
		$conectar= parent::conexion();
		parent::set_names();
		$sql="INSERT INTO categoria SET cat_titulo = ?;";
		$sql=$conectar->prepare($sql);
		$sql->bindValue(1, $cat_titulo);
		$sql->execute();
		return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function update_categoria($cat_id, $cat_titulo){
		$conectar= parent::conexion();
		parent::set_names();
		$sql="UPDATE categoria set
		cat_titulo = ?
		WHERE
		cat_id = ?";
		$sql=$conectar->prepare($sql);
		$sql->bindValue(1, $cat_titulo);
		$sql->bindValue(2, $cat_id);
		$sql->execute();
		return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function delete_categoria($cat_id){
		$conectar= parent::conexion();
		parent::set_names();
		$sql="UPDATE categoria set
		cat_estado = '0'
		WHERE
		cat_id = ?";
		$sql=$conectar->prepare($sql);
		$sql->bindValue(1, $cat_id);
		$sql->execute();
		return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
	}
	
}