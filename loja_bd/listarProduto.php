<h1>Consultar Produtos</h1>
<?php

    $sql = "SELECT * FROM produto";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    print"<button onclick=\"location.href='?page=cadastrarProduto'\" class='btn btn-success mb-3'>Cadastrar Produto</button>";

    if($qtd > 0) {
        print"<table class='table table-hover table-striped table-bordered'>";
        print "<tr>";
        print "<th>ID</th>";
        print "<th>Nome</th>";
        print "<th>Valor</th>";
        print "<th>Categoria</th>";
        print "<th>Estoque</th>";
        print "<th>Ações</th>";
        print "</tr>";
        while($row = $res->fetch_object()) {
            $sql2 = "SELECT quantidade FROM estoque WHERE id_produto =".$row->id_produto;
            $res2 = $conn->query($sql2);
            $row2 = $res2->fetch_object();
            print "<tr>";
            print "<td>".$row->id_produto."</td>";
            print "<td>".$row->nome."</td>";
            print "<td> R$ ".$row->valor."</td>";
            print "<td>".$row->categoria."</td>";
            print "<td>".$row2->quantidade."</td>";
            print "<td>
            <button onclick=\"location.href='?page=editarProduto&id_produto=".$row->id_produto."'\" class='btn btn-primary ' >Editar</button>
            <button onclick=\"location.href='?page=estoque&id_produto=".$row->id_produto."'\" class='btn btn-warning    ' >Estoque</button>

            </td>";
            print "</tr>";
        }
        print"</table>";
    }else{
        print "<p class='alert alert danger'>Não há nenhum produto cadastrado!</p>";
    }
?>
