<h1>Editar Pedido</h1>
<?php
$sql = "SELECT * FROM pedido WHERE id=".$_REQUEST["id"];
$res = $conn->query($sql);
$row = $res->fetch_object();

$sql2 = "SELECT * FROM cliente WHERE cpf ='". $row->cpf."'";
$res2 = $conn->query($sql2);
$row2 = $res2->fetch_object();
?>
<form action="?page=salvarPedido" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $row->id; ?>">
    <div class="divzin" id="d1">

        <div class="mb-3">
            <label for="tfCPF">CPF do Cliente:</label>
            <input type="text" name="cpf" autocomplete="off" maxlength="14" id="tfCPF" readonly placeholder="Ex: 123.456.789-10"
                required class="form-control" value="<?php print $row->cpf; ?>">
        </div>
        <div class="mb-3">
            <label for="tfNome">Nome do Cliente:</label>
            <input type="text" name="nome" id="tfNome" placeholder="Ex: João da Silva Sauro" readonly class="form-control"
                value="<?php print $row2->nome; ?>">
        </div>
        <div class="mb-3">
            <label for="tfIdProduto">ID do produto:</label>
            <input type="text" name="id_produto" id="tfIdProduto" placeholder="Ex: 5454" maxlength="4" oninput="fetch()" required
                class="form-control" value="<?php print $row->id_produto; ?>">
        </div>
        <div class="mb-3">
            <label for="tfIdProduto">Nome do produto:</label>
            <input type="text" name="nomeProduto" id="tfNomeProduto" placeholder="Ex: Rejunte" readonly class="form-control">
        </div>

        <div class="mb-3">
            <label for="tfValor">Valor:</label>
            <input type="number" name="valor" id="tfValor" pattern="[0-9]+" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="tfQuantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="tfQuantidade" pattern="[0-9]+" step="1" required>
        </div>
        <div class="mb-3">
            <label for="tfSubtotal">Subtotal:</label>
            <input type="number" name="subtotal" id="tfSubtotal" pattern="[0-9]+" step="any" required onfocus="
                var valor = document.getElementById('tfValor').value;
                var quantidade = document.getElementById('tfQuantidade').value;
                var subtotal = document.getElementById('tfSubtotal');
                var res = valor * quantidade;
                subtotal.value = res;
            ">
        </div>


    </div>

    <hr>


    <div class="mb-3">
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
    </div>
</form>