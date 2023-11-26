<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$mysqltime = date('Y-m-d H:i:s');
switch ($_REQUEST["acao"]) {

    case "cadastrar":

        $cpf = $_POST["cpf"];
        $id_produto = $_POST["id_produto"];
        $quantidade = $_POST["quantidade"];
        $valor_total = $_POST["subtotal"];

        try {
            $sql = "INSERT INTO pedido (cpf,id_produto,quantidade,data,valor_total) VALUES
            ('{$cpf}','{$id_produto}','{$quantidade}','{$mysqltime}','{$valor_total}')";

            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Pedido cadastrado com sucesso!');</script>";
                print "<script>location.href='?page=listarPedido';</script>";
            }
        } catch (mysqli_sql_exception $e) {
            //die('Erro: '.$e->getMessage());
            print "<script>alert('Não foi possível cadastrar o pedido.');</script>";
            print "<script>location.href='?page=listarPedido';</script>";
        }


        break;

    case "editar":

        $quantidade = $_POST["quantidade"];
        $valor_total = $_POST["subtotal"];
        $id_produto = $_POST["id_produto"];

        $id = $_POST["id"];
        try {
            $sql = "UPDATE pedido SET
            quantidade='{$quantidade}',id_produto='{$id_produto}'
            ,data='{$mysqltime}', valor_total = '{$valor_total}'
            WHERE id=" . $_REQUEST["id"];

            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Pedido editado com sucesso!');</script>";
                print "<script>location.href='?page=listarPedido';</script>";
            }
        } catch (mysqli_sql_exception $e) {
            print "<script>alert('Não foi possível editar o pedido.');</script>";
            print "<script>location.href='?page=listarPedido';</script>";
        }
        break;

    case "excluir":

        try {
            $sql = "DELETE FROM pedido WHERE id=" . $_REQUEST["id"];
            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Pedido excluído com sucesso!');</script>";
                print "<script>location.href='?page=listarPedido';</script>";
            }
        } catch (mysqli_sql_exception $e) {
            print "<script>alert('Não foi possível excluir o pedido.');</script>";
            print "<script>location.href='?page=listarPedido';</script>";
        }


        break;
}

