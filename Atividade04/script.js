function venda() {

  var produto = document.vender.Produto;
  var quantidade = document.vender.quantidade;
  var pagamento = ["Cartao","Boleto Bancario","Samsung Pay","Bankline","AmeDigital"]; 
  var cep = document.vender.cepEntrega;
 
  var val1 = validarSelect(produto,"alertaQuantidade");
  var val2 = validarQuantidade(quantidade,"alertaQnt");
  var val3 = validarRadio(pagamento,"alertaPagamento");
  var val4 = validarCep(cep,"alertaCep");

  if(val1 && val2 && val3 && val4){
    exibirsucessoVenda();
    limparTexto(quantidade);
    limparTexto(cep);
    limparSelect(produto);
    limparRadio(pagamento);
  }
}

function cadastrarProduto() {

  var nome = document.cadastrar.nome;
  var preco = document.cadastrar.preco;
  var precoDesc = document.cadastrar.precoDesc;
  var peso = document.cadastrar.peso;
  var unidadePeso = document.cadastrar.unidadeDePeso;
  var Estoque = document.cadastrar.estoqueInicial;
  var fornecedor = document.cadastrar.fornecedor;
  var mercado = ["mercadoInterno","mercadoExterno"];
  var descricao = document.cadastrar.descricao;
 
  var val1 = validarTexto(nome, "alertaNome");
  var val2 = validarQuantidade(preco, "alertaPreco");
  var val3 = validarPreco(preco, precoDesc, "alertaPrecoDesc");
  var val4 = validarQuantidade(peso, "alertaPeso");
  var val5 = validarSelect(unidadePeso, "alertaUnidadePeso");
  var val6 = validarQuantidade(estoqueInicial, "alertaEstoque");
  var val7 = validarSelect(fornecedor, "alertaFornecedor");
  var val8 = validarRadio(mercado, "alertaMercado");
  var val10 = validarTexto(descricao, "alertaDescricao");


  if(val1 && val2 && val3 && val4){
    exibirsucessoCadastro();
    limparTexto(nome);
    limparTexto(preco);
    limparTexto(precoDesc);
    limparTexto(peso);
    limparSelect(unidadePeso);
    limparTexto(Estoque);
    limparSelect(fornecedor);
    limparRadio(mercado);
    limparTexto(descricao);  
  }
}

function validarQuantidade(campo, alerta){
	var n = parseFloat(campo.value);
	var alerta = document.getElementById(alerta);

  if(campo.value.length == 0 || isNaN(n) || n<=0){
    alerta.style.display = "block";
	  campo.classList.add("is-invalid");
    campo.value = "";
    campo.focus();
    return false;
	}
	alerta.style.display = "none";
  campo.classList.remove("is-invalid");
  campo.classList.add("is-valid");
  return true;
}

function validarPreco(campoMenor, campo, alerta){
  var nMenor = parseFloat(campoMenor.value);
  var n = parseFloat(campo.value);
  var alerta = document.getElementById(alerta);

  if(campo.value.length == 0 || isNaN(n) || n<=0 || nMenor < 0 || nMenor > n){
    alerta.style.display = "block";
    campo.classList.add("is-invalid");
    campo.value = "";
    campo.focus();
    return false;
  }
  alerta.style.display = "none";
  campo.classList.remove("is-invalid");
  campo.classList.add("is-valid");
  return true;
}

function validarCep(campo, alerta){
  var n = parseFloat(campo.value);
  var alerta = document.getElementById(alerta);

  if(campo.value.length != 8 || isNaN(n)){
    alerta.style.display = "block";
    campo.classList.add("is-invalid");
    campo.value = "";
    campo.focus();
    return false;
  }
  alerta.style.display = "none";
  campo.classList.remove("is-invalid");
  campo.classList.add("is-valid");
  return true;
}

function validarSelect(campo, alerta){
  var index = campo.selectedIndex;
  var alerta = document.getElementById(alerta);

  if(index == 0){
    alerta.style.display = "block";
    campo.classList.add("is-invalid");
    campo.selectedIndex = 0;
    campo.focus();
    return false;
  }
  alerta.style.display = "none";
  campo.classList.remove("is-invalid");
  campo.classList.add("is-valid");
  return true;
}

function validarRadio(campo, alerta){
  var alerta = document.getElementById(alerta);
  var bool = false;
  var i;
  var len = campo.length;

  for (i = 0; i < len; i++) {
    if (document.getElementById(campo[i]).checked){
      bool = true
      break;
    }
  }

  if(!bool){
    alerta.style.display = "block";
      for (i = 0; i < len; i++) {
        document.getElementById(campo[i]).classList.add("is-invalid");
        document.getElementById(campo[i]).focus();
      }
      
      return false;
  }else{
    alerta.style.display = "none";
    for (i = 0; i < len; i++) {
      document.getElementById(campo[i]).classList.remove("is-invalid");
      document.getElementById(campo[i]).classList.add("is-valid");
    }
  }
    return true;
}

function validarTexto(campo, alerta){
  var alerta = document.getElementById(alerta);

  if(campo.value.length == 0){
    alerta.style.display = "block";
    campo.classList.add("is-invalid");
    campo.value = "";
    campo.focus();
    return false;
  }
  alerta.style.display = "none";
  campo.classList.remove("is-invalid");
  campo.classList.add("is-valid");
  return true;
}

function limparTexto(campo){
  campo.value = "";
  campo.classList.remove("is-valid");
}

function limparSelect(campo){
  campo.selectedIndex = 0;
  campo.classList.remove("is-valid");
}

function limparRadio(campo){
  var len = campo.length;
  for (i = 0; i < len; i++) {
    document.getElementById(campo[i]).checked = false;
  }
}

function exibirsucessoVenda(){
  window.confirm("Venda realizada com sucesso.");
}

function exibirsucessoCadastro(){
  window.confirm("Cadastro realizado com sucesso.");
}