<?php

header('Content-Type: application/json');

require_once '../../config/Conexao.php';
require_once '../../models/Categoria.php';

include "../../config/auth.php";

//instancia o objeto conexao
$db = new Conexao();

//recebe a conexao feita
$con = $db->getConexao();


//instancia o objeto categotia com a conexao como parametro
//passa a conexao
$cat = new Categoria($con);

$data = json_decode(file_get_contents('php://input'), true);

// $id = $data['id'];
// $id = intval($id);
// $nome = $data['nome'];
// $descricao = $data['descricao'];

if ($cat->update($data)){
	$res = array('status', 'ok');
}else{
	$res = array('status', 'falha na alteracao');
}

echo json_encode($res);