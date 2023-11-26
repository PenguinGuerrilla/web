<h1>Consultar Clientes</h1>
<?php

    $sql = "SELECT * FROM cliente";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;
    
    print"<button onclick=\"location.href='?page=clientes'\" class='btn btn-success mb-3'>Cadastrar Cliente</button>";
    
    if($qtd > 0) {
        print"<table class='table table-hover table-striped table-bordered'>";
        print "<tr>";
        print "<th>CPF</th>";
        print "<th>Nome</th>";
        print "<th>E-mail</th>";
        print "<th>Telefone</th>";
        print "<th>Data de nascimento</th>";   
        print "<th>Sexo</th>";
        print "<th>CEP</th>";
        print "<th>Endereço</th>";
        print "<th>Ações</th>";
        print "</tr>";
        while($row = $res->fetch_object()) {
            if(is_null($row->complemento) > 0){
                $comp = ", ".$row->complemento;
            }else{$comp = "";}
            print "<tr>";
            print "<td>".$row->cpf."</td>";
            print "<td>".$row->nome."</td>";
            print "<td>".$row->email."</td>";
            print "<td>".$row->telefone."</td>";
            print "<td>".$row->data_nasc."</td>";   
            print "<td>".$row->sexo."</td>";
            print "<td>".$row->cep."</td>";
            print "<td style='width: 200px'>".$row->rua.", ".$row->numero.$comp.", ".$row->bairro." - ".$row->cidade.", ".$row->estado."</td>";
            print "<td>
            <button onclick=\"location.href='?page=editarCliente&cpf=".$row->cpf."'\" class='btn btn-primary mb-1' >Editar</button>
                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvarCliente&acao=excluir&cpf=".$row->cpf."';}else{false;}\"
                class='btn btn-danger'>Excluír</button>
            </td>";
            print "</tr>";
        }
        print"</table>";
    }else{
        print "<p class='alert alert danger'>Não há nenhum cliente cadastrado!</p>";
    }
?>
