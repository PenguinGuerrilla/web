const cpf = document.querySelector('#tfCPF');
const telefone = document.querySelector('#tfTelefone');

$("#tfTelefone").mask("(99) 99999-9999");
$("#tfCEP").mask("99999-999");
$("#tfCPF").mask("999.999.999-99");

$('#tfSubtotal').on('click',function(){
    var valor = document.getElementById('tfValor').value;
                var quantidade = document.getElementById('tfQuantidade').value;
                var subtotal = document.getElementById('tfSubtotal');
                var res = valor * quantidade;
                subtotal.value = res;
})

$('#tfNome').on('click',function(){
    const vcpf = document.getElementById('tfCPF').value;
    $.ajax({
        url: "js/get.php",
        type: "GET",
        data: {
            table:"cliente",
            cpf: vcpf
        },
        success: (response) => {
            const dados = JSON.parse(response);
            document.getElementById('tfNome').value = dados[0]["nome"];
        }
    })
})
$('#tfNomeProduto').on('click',function(){
    const id_produto = document.getElementById('tfIdProduto').value;
    $.ajax({
        url: "js/getProd.php",
        type: "GET",
        data: {
            table: "produto",
            id_produto: id_produto
        },
        success: (response) => {
            const dados = JSON.parse(response);
            document.getElementById('tfNomeProduto').value = dados[0]["nome"];
            document.getElementById('tfValor').value = dados[0]["valor"];
        }
    })
})

$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#tfRua").val("");
        $("#tfBairro").val("");
        $("#tfCidade").val("");
        $("#tfEstado").val("");

    }
    
    //Quando o campo cep perde o foco.
    $("#tfCEP").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#tfRua").val("...");
                $("#tfBairro").val("...");
                $("#tfCidade").val("...");
                $("#tfEstado").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#tfRua").val(dados.logradouro);
                        $("#tfBairro").val(dados.bairro);
                        $("#tfCidade").val(dados.localidade);
                        $("#tfEstado").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});