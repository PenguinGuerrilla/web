<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

switch ($_REQUEST["acao"]) {

    case "cadastrar":

        $categoria = $_POST["categoria"];
        $nome = $_POST["nome"];
        $valor = $_POST["valor"];
        $id_produto = $_POST["id_produto"];
        try {
            $sql = "INSERT INTO produto
            (id_produto,nome,valor,categoria) VALUES('{$id_produto}','{$nome}','{$valor}','{$categoria}')";

            $res = $conn->query($sql);

            //$conn->query("INSERT INTO estoque(id_produto,quantidade) VALUES('{$id_produto}',NULL");

            if ($res == true) {
                print "<script>alert('Produto cadastrado com sucesso!');</script>";
                print "<script>location.href='?page=listarProduto';</script>";
            }
        } catch (mysqli_sql_exception $e) {
            print "<script>alert('Não foi possível cadastrar o produto.');</script>";
            print "<script>location.href='?page=listarProduto';</script>";
        }


        break;

    case "editar":

        $categoria = $_POST["categoria"];
        $nome = $_POST["nome"];
        $valor = $_POST["valor"];
        $id_produto = $_POST["id_produto"];
        try {
            $sql = "UPDATE produto SET
            nome='{$nome}',valor='{$valor}',categoria='{$categoria}' WHERE id_produto=" . $_REQUEST["id_produto"];

            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Produto editado com sucesso!');</script>";
                print "<script>location.href='?page=listarProduto';</script>";
            }
        } catch (mysqli_sql_exception $e) {
            print "<script>alert('Não foi possível editar o produto.');</script>";
            print "<script>location.href='?page=listarProduto';</script>";
        }
        break;

    case "estoque":

        $id_produto = $_POST["id_produto"];
        $sumEstoque = $_POST["sumEstoque"];
        $subEstoque = $_POST["subEstoque"];
        $estoque = $_POST["estoque"];
        $tot = $sumEstoque - $subEstoque;

        if ($estoque + $tot < 0) {
            print "<script>alert('Não foi possível modificar o estoque.');</script>";
            print "<script>location.href='?page=listarProduto';</script>";
        } else {
            try {
                $sql = "UPDATE estoque SET quantidade = quantidade + '{$tot}' WHERE id_produto=" . $_REQUEST["id_produto"];

                $res = $conn->query($sql);

                if ($res == true) {
                    print "<script>alert('Estoque modificado com sucesso!');</script>";
                    print "<script>location.href='?page=listarProduto';</script>";
                }
            } catch (mysqli_sql_exception $e) {
                print "<script>alert('Não foi possível modificar o estoque.');</script>";
                //print"<script>location.href='?page=listarProduto';</script>";
            }
        }


        break;

    case "excluir":

        $sql = "DELETE FROM produto WHERE id_produto=" . $_REQUEST["id_produto"];
        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Produto excluído com sucesso!');</script>";
            print "<script>location.href='?page=listarProduto';</script>";
        } else {
            print "<script>alert('Não foi possível excluir o produto.');</script>";
            print "<script>location.href='?page=listarProduto';</script>";
        }


        break;
}

