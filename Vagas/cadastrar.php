<?php



require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar vaga');

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

use \App\Entity\Vaga;

$obVaga = new Vaga;

//validação do post
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){

    $obVaga->titulo = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo = $_POST['ativo'];
    $obVaga->cadastrar();

    header('location: index.php?status=success');
    exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';


