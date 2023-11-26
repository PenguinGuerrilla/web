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
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_produto" value="<?php print $row->id_produto; ?>">
    <div class="divzin" id="d1">
        <div class="mb-3">
            <label for="tfNome">ID do Produto:</label>
            <input type="text" name="id_produto" id="tfId_produto" maxlength="4" placeholder="Ex: 5794" required class="form-control" readonly value="<?php print $row->id_produto; ?>">
        </div>
        <div class="mb-3">
            <label for="tfNome">Nome:</label>
            <input type="text" name="nome" id="tfNome" placeholder="Ex: Rejunte" required class="form-control" value="<?php print $row->nome; ?>">
        </div>
        <div class="mb-3">
            <label for="tfCategoria">Categoria:</label>
            <input type="text" name="categoria" id="tfCategoria" placeholder="Ex: Argamassas e Rejuntes" required class="form-control" value="<?php print $row->categoria; ?>">
        </div>
        <div class="mb-3">
            <label for="tfData">Valor:</label>
            <input type="number" name="valor" id="tfValor" pattern="[0-9]+" step="0.01" required value="<?php print $row->valor; ?>">       
        </div>


        <div class="mb-3">
            <button type="submit" class="btn btn-success">Editar</button>
        </div>
    </div>
</form>