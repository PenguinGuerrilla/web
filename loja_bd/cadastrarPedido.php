<h1>Cadastrar Novo Pedido</h1>
<?php
$sql = "SELECT id_produto FROM produto";
$res = $conn->query($sql);

?>

<form action="?page=salvarPedido" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="divzin" id="d1">

        <div class="mb-3">
            <label for="tfCPF">CPF do Cliente:</label>
            <input type="text" name="cpf" autocomplete="off" maxlength="14" id="tfCPF" placeholder="Ex: 123.456.789-10"
                required class="form-control">
        </div>
        <div class="mb-3">
            <label for="tfNome">Nome do Cliente:</label>
            <input type="text" name="nome" id="tfNome" readonly placeholder="Ex: João da Silva Sauro"
                class="form-control">
        </div>
        <div class="mb-3">
            <label for="tfIdProduto">ID do produto:</label>
            <input type="text" name="id_produto" id="tfIdProduto" placeholder="Ex: 5454" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="tfIdProduto">Nome do produto:</label>
            <input type="text" name="nomeProduto" id="tfNomeProduto" placeholder="Ex: 5454" readonly class="form-control">
        </div>

        <div class="mb-3">
            <label for="tfValor">Valor:</label>
            <input type="number" name="valor" id="tfValor" pattern="[0-9]+" readonly step="any" required>
        </div>
        <div class="mb-3">
            <label for="tfQuantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="tfQuantidade" pattern="[0-9]+" step="1" required>
        </div>
        <div class="mb-3">
            <label for="tfSubtotal">Subtotal:</label>
            <input type="number" name="subtotal" id="tfSubtotal" pattern="[0-9]+" step="any" required>
        </div>


    </div>

    <hr>


    <div class="mb-3">
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
    </div>
</form>