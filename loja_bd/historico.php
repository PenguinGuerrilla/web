<h1>Histórico do entrada</h1>
<?php

    $sql = "SELECT * FROM historico order by data desc";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;


    if($qtd > 0) {
        print"<table class='table table-hover table-striped table-bordered'>";
        print "<tr>";
        print "<th>ID</th>";
        print "<th>ID do Produto</th>";
        print "<th>Nome do Produto</th>";
        print "<th>Quantidade</th>";
        print "<th>Valor unitário</th>";
        print "<th>Valor total</th>";
        print "<th>Data</th>";
        print "</tr>";
        while($row = $res->fetch_object()) {
            $sql2 = "SELECT * FROM produto WHERE id_produto=".$row->id_produto;
            $res2 = $conn->query($sql2);
            $row2 = $res2->fetch_object();
            print "<tr>";
            print "<td>".$row->id_historico."</td>";
            print "<td>".$row->id_produto."</td>";
            print "<td>".$row2->nome."</td>";
            print "<td>".$row->quantidade."</td>";
            print "<td>".$row2->valor."</td>";
            print "<td>".$row->valor."</td>";
            print "<td>".date("d/m/Y H:i:s",strtotime($row->data))."</td>";

            print "</tr>";
        }
        print"</table>";
    }else{
        print "<p class='alert alert danger'>Não há nenhum produto cadastrado!</p>";
    }
?>
