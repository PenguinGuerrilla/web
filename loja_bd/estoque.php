<h1>Editar Produto</h1>
<?php
$sql = "SELECT * FROM produto WHERE id_produto =".$_REQUEST["id_produto"];
$res = $conn->query($sql);
$row = $res->fetch_object();

$sql2 = "SELECT quantidade FROM estoque WHERE id_produto =".$row->id_produto;
$res2 = $conn->query($sql2);
$row2 = $res2->fetch_object();
?>
<form action="?page=salvarProduto" method="POST">
    <input type="hidden" name="acao" value="estoque">
    <input type="hidden" name="id_produto" value="<?php print $row->id_produto; ?>">
    <div class="divzin" id="d1">
        <div class="mb-3">
            <label for="tfNome">ID do Produto:</label>
            <input type="text" name="id_produto" id="tfId_produto" maxlength="4" placeholder="Ex: 5794" required class="form-control" readonly value="<?php print $row->id_produto; ?>">
        </div>
        <div class="mb-3">
            <label for="tfNome">Nome:</label>
            <input type="text" name="nome" id="tfNome" placeholder="Ex: Rejunte" required class="form-control" readonly value="<?php print $row->nome; ?>">
        </div>


        <hr>
        <div class="form-inline">
            <div class="mb-3">
            <label for="tfEstique">Estoque:</label>
                <input type="text" name="estoque" id="tfEstoque" class="form-control" value="<?php print $row2->quantidade; ?>">
                
            </div>
            <div class="mb-3">
                <input type="number" name="sumEstoque" id="sumEstoque" pattern="[0-9]+" step="any" min=0 placeholder="Ex: 10" value=0>   
                <button type="submit" class="btn btn-success" style="font-size: 15px">+</button> 
                <input type="number" name="subEstoque" id="subEstoque" pattern="[0-9]+" step="any" min=0 placeholder="Ex: 10" value=0>   
                <button type="submit" class="btn btn-danger" style="font-size: 15px">-</button>     
            </div>
        </div>
    </div>
</form>