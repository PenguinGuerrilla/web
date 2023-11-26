<h1>Cadastrar Novo Cliente</h1>
<form action="?page=salvarCliente" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="divzin" id="d1">
        <div class="mb-3">
            <label for="tfNome">Nome:</label>
            <input type="text" name="nome" id="tfNome" placeholder="Ex: João da Silva Sauro" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="tfCPF">CPF:</label>
            <input type="text" name="cpf" autocomplete="off" maxlength="14" id="tfCPF" placeholder="Ex: 123.456.789-10" onblur="document.getElementById('tfcpf') .value.replace(/\D/g, '');" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="tfData">Data de Nascimento:</label>
            <input type="date" name="data" id="tfData" placeholder="" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="tfEmail">E-mail:</label>
            <input type="email" name="email" id="tfEmail" placeholder="Ex: SilvaSauro@igmail.com" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="tfTelefone">Telefone:</label>
            <input type="text" name="telefone" id="tfTelefone" placeholder="(12) 9 1234-5678" required class="form-control">
        </div>
        <div class="mb-3"><p>Sexo:</p>
            <div class="form-check form-check-inline">
                <label for="masc" class="form-control form-check form-check-inline" required>
                <input type="radio" name="sexo" value="M" checked> Masculino
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label for="fem" class="form-control form-check form-check-inline">
                <input type="radio" name="sexo" value="F"> Feminino
                </label>
            </div>
        </div>

        <hr>
        
        <div class="divzin" id="d2">
            <div class="mb-3">
                <label for="tfCEP">CEP:</label>
                <input type="text" id="tfCEP" name="cep" placeholder="12345-678" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="tfRua" >Lougradouro:</label>
                <input type="text" name="rua" id="tfRua" placeholder="Ex: Rua Carlos Alberto Casagrande" readonly required class="form-control">
            </div>
            <div class="mb-3">
                <label for="tfNumero">Nº:</label>
                <input type="number" name="numero" id="tfNumero" placeholder="Ex: 64" pattern="[0-9]+" class="form-control">
            </div>
            <div class="mb-3">
                <label for="tfBairro">Bairro:</label>
                <input type="text" name="bairro" id="tfBairro" placeholder="Ex: Leblon" required readonly class="form-control">
            </div>
            <div class="mb-3">
                <label for="tfCidade">Cidade:</label>
                <input type="text" name="cidade" id="tfCidade" placeholder="Ex: Santarém" required readonly class="form-control">
            </div>
            <div class="mb-3">
                <label for="tfEstado">Estado:</label>
                <input type="text" name="estado" id="tfEstado" placeholder="Ex: PA" maxlength="2" readonly onkeydown="return /[A-Z]/i.test(event.key)" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="tfComplemento">Complemento:</label>
                <input type="text" name="complemento" id="tfComplemento" placeholder="Ex: Apartamento 203"class="form-control">
            </div>
            
        </div>

        <hr>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
    </div>
</form>