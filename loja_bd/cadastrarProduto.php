<h1>Cadastrar Novo Produto</h1>
<form action="?page=salvarProduto" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="divzin" id="d1">
        <div class="mb-3">
            <label for="tfNome">ID do Produto:</label>
            <input type="text" name="id_produto" id="tfId_produto" maxlength="4" placeholder="Ex: 5794" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="tfNome">Nome:</label>
            <input type="text" name="nome" id="tfNome" placeholder="Ex: Rejunte" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="tfCPF">Categoria:</label>
            <input type="text" name="categoria" id="tfCategoria" placeholder="Ex: Argamassas e Rejuntes" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="tfValor">Valor: R$</label>
            <input type="number" name="valor" id="tfValor" pattern="[0-9]+" step="0.01" required>       
        </div>


        <hr>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
    </div>
</form>