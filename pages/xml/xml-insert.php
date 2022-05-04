<?php 

session_start();

require __DIR__.'../../../vendor/autoload.php';

define('TITLE','Novo Usuário');
define('BRAND','Cadastrar Usuário');

use App\Entidy\Cargo;
use App\Session\Login;

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];

Login::requireLogin();

if (isset($_SESSION['parcelas'])) {
    foreach ($_SESSION['parcelas'] as $item) {

        $titulo           = $item['titulo'];
        $vencimento       = $item['vencimento'];
        $parcela          = $item['parcela'];
     
    }

}


if (isset($_SESSION['produtos'])) {
    foreach ($_SESSION['produtos'] as $item) {

        $codigo             = $item['codigo'];
        $produto            = $item['produto'];
        $ncm                = $item['ncm'];
        $cfop               = $item['cfop'];
        $un                 = $item['un'];
        $qtd                = $item['qtd'];
        $valor_uni          = $item['valor_uni'];
        $bc_icms            = $item['bc_icms'];
        $valor_prod         = $item['valor_prod'];
        $valor_icms         = $item['valor_icms'];
        $valor_ipi          = $item['valor_ipi'];
        $icms               = $item['icms'];
        $ipi                = $item['ipi'];
     
    }

}


if(isset($_POST['nome'])){

        $item = new Cargo;
        $item->nome = $_POST['nome'];
        $item->cadastar();

        header('location: cargo-list.php?status=success');
        exit;
    }
  
