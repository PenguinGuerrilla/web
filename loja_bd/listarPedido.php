<h1>Consultar Pedidos</h1>
<?php

    $sql = "SELECT * FROM pedido group by cpf, data order by data";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    print"<button onclick=\"location.href='?page=cadastrarPedido'\" class='btn btn-success mb-3'>Cadastrar Pedido</button>";

    if($qtd > 0) {
        print"<table class='table table-hover table-striped table-bordered'>";
        print "<tr>";
        print "<th>ID</th>";
        print "<th>CPF do Cliente</th>";
        print "<th>Nome do Cliente</th>";
        print "<th>ID do Produto</th>";
        print "<th>Nome do Produto</th>";
        print "<th>Quantidade</th>";
        print "<th>Valor unitário</th>";
        print "<th>Valor total</th>";
        print "<th>Data</th>";
        print "<th>Ações</th>";
        print "</tr>";
        while($row = $res->fetch_object()) {
            $sql2 = "SELECT * FROM cliente WHERE cpf='".$row->cpf."'";
            $res2 = $conn->query($sql2);
            $row2 = $res2->fetch_object();
        
            $sql3 = "SELECT * FROM produto WHERE id_produto =".$row->id_produto;
            $res3 = $conn->query($sql3);
            $row3 = $res3->fetch_object();
            print "<tr>";
            print "<td>".$row->id."</td>";
            print "<td>".$row->cpf."</td>";
            print "<td>".$row2->nome."</td>";
            print "<td style='width: 50px'>".$row->id_produto."</td>";
            print "<td>".$row3->nome."</td>";
            print "<td>".$row->quantidade."</td>";
            print "<td>R$ ".$row3->valor."</td>";
            print "<td>R$ ".$row->valor_total."</td>";
            print "<td>".date("d/m/Y H:i:s",strtotime($row->data))."</td>";
            print "<td>
            <button onclick=\"location.href='?page=editarPedido&id=".$row->id."'\" class='btn btn-primary mb-1' >Editar</button>
            <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvarPedido&acao=excluir&id=".$row->id."';}else{false;}\"
            class='btn btn-danger'>Excluír</button>
            </td>";
            print "</tr>";
        }
        print"</table>";
    }else{
        print "<p class='alert alert danger'>Não há nenhum produto cadastrado!</p>";
    }
?>
