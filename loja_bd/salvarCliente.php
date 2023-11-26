<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

switch ($_REQUEST["acao"]) {

    case "cadastrar":

        $cpf = $_POST["cpf"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $data_nasc = $_POST["data"];
        $sexo = $_POST["sexo"];
        $cep = $_POST["cep"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $rua = $_POST["rua"];
        $bairro = $_POST["bairro"];
        $numero = $_POST["numero"];
        $complemento = $_POST["complemento"];

        try {

            $sql = "INSERT INTO cliente
            (cpf,nome,email,telefone,data_nasc,sexo,cep,cidade,estado,
            rua,bairro,numero,complemento)
            VALUES(
            '{$cpf}','{$nome}','{$email}','{$telefone}','{$data_nasc}',
            '{$sexo}','{$cep}','{$cidade}','{$estado}','{$rua}',
            '{$bairro}','{$numero}','{$complemento}')";

            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Cliente cadastrado com sucesso!');</script>";
                print "<script>location.href='?page=listarClientes';</script>";
            }
        } catch (mysqli_sql_exception $e) {
            print "<script>alert('Não foi possível cadastrar o cliente.');</script>";
            print "<script>location.href='?page=listarClientes';</script>";
        }


        break;

    case "editar":

        $cpf = $_POST["cpf"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $data_nasc = $_POST["data"];
        $sexo = $_POST["sexo"];
        $cep = $_POST["cep"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $rua = $_POST["rua"];
        $bairro = $_POST["bairro"];
        $numero = $_POST["numero"];
        $complemento = $_POST["complemento"];
        try {
            $sql = "UPDATE cliente SET
            nome='{$nome}',email='{$email}',telefone='{$telefone}',data_nasc='{$data_nasc}',
            sexo='{$sexo}',cep='{$cep}',cidade='{$cidade}',estado='{$estado}',rua='{$rua}',
            bairro='{$bairro}',numero='{$numero}',complemento='{$complemento}'
            WHERE cpf='" . $_REQUEST["cpf"] . "'";

            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Cliente editado com sucesso!');</script>";
                print "<script>location.href='?page=listarClientes';</script>";
            }

        } catch (mysqli_sql_exception $e) {
            print "<script>alert('Não foi possível editar o cliente.');</script>";
            print "<script>location.href='?page=listarClientes';</script>";
        }
        break;

    case "excluir":
        try {
            $sql = "DELETE FROM cliente WHERE cpf='" . $_REQUEST["cpf"] . "'";
            $res = $conn->query($sql);
            print "<script>alert('Cliente excluído com sucesso!');</script>";
            print "<script>location.href='?page=listarClientes';</script>";
        } catch (mysqli_sql_exception $e) {
            print "<script>alert('Não foi possível excluir o cliente.');</script>";
            print "<script>location.href='?page=listarClientes';</script>";
        }


        break;
}

