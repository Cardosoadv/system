console.log("leu JS");
var siteUrl = "http://localhost/sistema";


//formata o valor para o padrão brasileiro
function formataValor(valor){
        var valorBr = valor.replace(".", ",");
        const arrvbr = valorBr.split(",");
        const inteiros = arrvbr[0];
        const decimais = arrvbr[1] || "00"; // garante que há pelo menos dois dígitos decimais
        const inteirosArr = inteiros.split("");
        if (inteirosArr.length > 6) {
            inteirosArr.splice(inteirosArr.length - 6, 0, "."); // insere um ponto antes dos últimos 3 dígitos
            }
            if (inteirosArr.length > 3) {
                inteirosArr.splice(inteirosArr.length - 3, 0, "."); // insere um ponto antes dos últimos 3 dígitos
            }
        const valorFormatado = inteirosArr.join("") + "," + decimais; // junta os elementos do array em uma string novamente
        console.log(valorFormatado);
        return valorFormatado;
}

class Tarefas {
    constructor() {
        console.log("Class Tarefas");
        this.form = document.getElementById('form_tarefa');
        this.modal = document.getElementById('modal_tarefa');
        this.urlEditarTarefa = "tarefas/ajax_editar_tarefa";
        this.urlResponsaveis = "tarefas/ajax_responsaveis";
        this.urlEditar = "tarefas/editartarefa";
        this.urlAdicionar = "tarefas/salvartarefa";
        this.taskId = document.querySelector('[name="id"]');
        this.taskInput = document.querySelector('[name="task"]');
        this.prazoInput = document.querySelector('[name="prazo"]');
        this.prioridadeInput = document.querySelector('[name="prioridade"]');
        this.detalhesInput = document.querySelector('[name="detalhes"]');
        this.responsaveisInput = document.querySelector('[name="responsavel[]"]');
    }

    edit(id) {
        this.form.reset();
        fetch(`${siteUrl}/${this.urlEditarTarefa}/${id}`)
            .then(response => response.json())
            .then(data => {
                this.taskId.value = data.id;
                this.taskInput.value = data.task;
                this.prazoInput.value = data.prazo;
                this.prioridadeInput.value = data.prioridade;
                this.detalhesInput.value = data.detalhes;
                return fetch(`${siteUrl}/${this.urlResponsaveis}/${data.id}`);
            })
            .then(response => response.json())
            .then(data => {
                const arr = [];
                for (let i = 0; i < data.length; i++) {
                    console.log(i);
                    arr.push(data[i].user_id);
                    console.log(arr);
                }
                $('[name="responsavel[]"]').val(arr);
                // this.responsaveisInput.value = arr;
            })
            .then(response => {
                $('#modal_tarefa').modal('show');
                $('.modal-title').text('Editar'); // Set title to Bootstrap modal title
                document.getElementById('form_tarefa').action = `${siteUrl}/${this.urlEditar}/${id}`;
            })
            .catch(error => {
                console.error(error);
                alert('Erro ao receber dados do AJAX');
            });
    }

    novaTarefa() {

        $('#form_tarefa')[0].reset();
        $('.modal-title').text('Nova Tarefa'); // Set title to Bootstrap modal title
        document.getElementById('form_tarefa').action = `${siteUrl}/${this.urlAdicionar}`;

    }


}
const tarefas = new Tarefas();

class Despesas {
    constructor() {
        console.log("Class Despesas");

                //setando as urls e o modal
                this.form = document.getElementById('form_despesa');
                this.modal = document.getElementById('modal_despesa');
                this.urlReceberDados = "despesas/ajax_editar_despesa"; //endereço de origem dos dados
                this.urlEditar = "despesas/editardespesa";
                this.urlAdicionar = "despesas/salvardespesa";

            //pegar as variáveis do formulário
            this.despesasIdInput = document.querySelector('[name="despesas_id"]');
            this.despesaInput = document.querySelector('[name="despesa"]');
            this.dataVencimentoInput = document.querySelector('[name="data_vencimento"]');
            this.dataPagamentoInput = document.querySelector('[name="data_pagamento"]');
            this.idTipoDespesaInput = document.querySelector('[name="id_tipo_despesa"]');
            this.idContaInput = document.querySelector('[name="id_conta"]');
            this.idRubricaInput = document.querySelector('[name="id_rubrica"]');
            this.valorInput = document.querySelector('[name="valor"]');
            this.pgtoCheckboxInput = document.querySelector('[name="pgtoRealizado"]');
            this.rateioInput = document.querySelector('[name="rateioSlider"]');
            this.fabianoInput = document.getElementById('fabiano');
            this.rodrigoInput = document.getElementById('rodrigo');
    }
    edit(id) {
        this.form.reset();
        fetch(`${siteUrl}/${this.urlReceberDados}/${id}`) //requisitando os dados por ajax, usando o fetch
            .then(response => response.json())
            .then(data => {
                this.despesasIdInput.value = data.despesas_id;
                this.despesaInput.value = data.despesa;
                this.dataVencimentoInput.value = data.data_vencimento;
                this.dataPagamentoInput.value = data.data_pagamento;
                console.log(data.data_pagamento);
                      if (data.data_pagamento==='0000-00-00'){
                        this.pgtoCheckboxInput.checked = false;
                        var informacoesPagamento = document.getElementById("informacoesPagamento");
                        var botaopagamento = document.getElementById("botaoLancarpagamento");
                        botaopagamento.style.display = "block";
                        informacoesPagamento.style.display = "none"; 
                    }else{
                        this.dataPagamentoInput.checked = true;
                        var informacoesPagamento = document.getElementById("informacoesPagamento");
                        var botaopagamento = document.getElementById("botaoLancarpagamento");
                        botaopagamento.style.display = "none";
                        informacoesPagamento.style.display = "block";            
                    }
                this.idTipoDespesaInput.value = data.id_tipo_despesa;
                this.idContaInput.value = data.id_conta;
                this.idRubricaInput.value = data.id_rubrica;
                console.log(data.valor);
                this.valorInput.value = formataValor(data.valor);
                this.rateioInput.value = data.rateio;
                this.fabianoInput.value = this.rateioInput.value;
                this.rodrigoInput.value = 100 - this.fabianoInput.value;
            })

            .then(response => {
                $('#modal_despesa').modal('show');
                $('.modal-title').text('Editar'); // Set title to Bootstrap modal title
                document.getElementById('form_despesa').action = `${this.urlEditar}/${id}`;
            })
            .catch(error => {
                console.error(error);
                alert('Erro ao receber dados do AJAX');
            });
    }

    novaDespesa() {
        $('#form_despesa')[0].reset();
        $('.modal-title').text('Nova Despesa'); // Set title to Bootstrap modal title
        document.getElementById('form_despesa').action = `${this.urlAdicionar}`;
    }


}
const despesas = new Despesas();

class Clientes {
    constructor() {
        console.log("Class Clientes");
        
        //setando as urls e o modal
        this.form = document.getElementById('form_cliente');
        this.modal = document.getElementById('#modal_cliente');
        this.urlEditarCliente = "clientes/ajax_editar_cliente";
        this.urlEditar = "clientes/editar";
        this.urlAdicionar = "clientes/adicionar";
        
        //pegar as variáveis do formulário
        this.nomeInput = document.querySelector('[name="nome"]');
        this.cpfInput = document.querySelector('[name="cpf"]');
        this.cnpjInput = document.querySelector('[name="cnpj"]');
        this.idInput = document.querySelector('[name="id"]');
        this.telefoneInput = document.querySelector('[name="telefone"]');
        this.dataNascimentoInput = document.querySelector('[name="data_nascimento"]');
        this.usernameInput = document.querySelector('[name="username"]');
        this.emailInput = document.querySelector('[name="email"]');
    }

    edit(id) {
        this.form.reset(); //limpando os dados do formulário
        fetch(`${siteUrl}/${this.urlEditarCliente}/${id}`) //requisitando os dados por ajax, usando o fetch
            .then(response => response.json())
            .then(data => { 
                console.log(data);
                //preenchendo os dados do formulário
                var cpf_cnpj = data.cpf_cnpj;
                console.log(cpf_cnpj.length);
                this.nomeInput.value = data.nome;
                    if (cpf_cnpj.length===19){
                        this.cnpjInput.value = cpf_cnpj;
                    }else{
                        this.cpfInput.value = cpf_cnpj;
                    }
                this.idInput.value = data.id;
                console.log(this.idInput.value);
                this.telefoneInput.value = data.telefone;
                this.dataNascimentoInput.value = data.data_nascimento;
                this.usernameInput.value = data.username;
                this.emailInput.value = data.email;
            })

            .then(response => {
                $('#modal_cliente').modal('show');
                $('.modal-title').text('Editar'); // Seta o titulo do modal
                document.getElementById('form_cliente').action = `${siteUrl}/${this.urlEditar}/${id}`;
            })
            .catch(error => {
                console.error(error);
                alert('Erro ao receber dados do AJAX');
            });
    }

    novoCliente() {
        $('#form_cliente')[0].reset();
        $('.modal-title').text('Novo Cliente'); // Set title to Bootstrap modal title
        document.getElementById('form_cliente').action = `${siteUrl}/${this.urlAdicionar}`;
    }
}
const clientes = new Clientes();
class Faturas {
    constructor() {
        console.log("Class Faturas");
        
        //setando as urls e o modal
        this.urlBase = "https://fabianocardoso.adv.br/sistema" //seta o url base do sistema
        this.form = document.getElementById('form_fatura');
        this.modal = document.getElementById('#modal_fatura');
        this.urlReceberDados = "faturas/ajax_editar_fatura"; //endereço de origem dos dados
        this.urlEditar = "faturas/editarfatura";
        this.urlAdicionar = "faturas/salvarfatura";
        
        //pegar as variáveis do formulário
        this.idInput = document.querySelector('[name="fat_id"]');
        this.descricaoInput = document.querySelector('[name="descricao"]');
        this.emissaoInput = document.querySelector('[name="fat_emissao"]');
        this.vencimentoInput = document.querySelector('[name="fat_vencimento"]');
        this.valorInput = document.querySelector('[name="fat_valor"]');
        this.idRubricaInput = document.querySelector('[name="rubrica');
        this.bancoInput = document.querySelector('[name="bancos"]');
        this.rateioInput = document.querySelector('[name="rateioSlider"]');
        this.fabianoInput = document.getElementById('fabiano');
        this.rodrigoInput = document.getElementById('rodrigo');
    }

    edit(id) {
        this.form.reset(); //limpando os dados do formulário
        fetch(`${siteUrl}/${this.urlReceberDados}/${id}`) //requisitando os dados por ajax, usando o fetch
            .then(response => response.json())
            .then(data => { 
        
                //preenchendo os dados do formulário
                this.idInput.value = data.fat_id;
                this.descricaoInput.value = data.descricao;
                this.emissaoInput.value = data.fat_emissao;
                this.vencimentoInput.value = data.fat_vencimento;
                this.valorInput.value = formataValor(data.fat_valor);
                this.idRubricaInput.value = data.rubrica_id;
                this.bancoInput.value = data.banco_id;
                this.rateioInput.value = data.rateio;
                this.fabianoInput.value = this.rateioInput.value;
                this.rodrigoInput.value = 100 - this.fabianoInput.value;    

                console.log(data.rateio);
            })

            .then(response => {
                $('#modal_fatura').modal('show');
                $('.modal-title').text('Editar'); // Seta o titulo do modal
                document.getElementById('form_fatura').action = `${siteUrl}/${this.urlEditar}/${id}`;
                document.getElementById('parcelas').setAttribute('disabled','');
            })
            .catch(error => {
                console.error(error);
                alert('Erro ao receber dados do AJAX');
            });
    }

    novaFatura() {
        $('#form_fatura')[0].reset();
        $('.modal-title').text('Nova Fatura'); // Set title to Bootstrap modal title
        document.getElementById('form_fatura').action = `${siteUrl}/${this.urlAdicionar}`;
    }
    lancarContrato() {
        var x = document.getElementById("lancarContrato");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
        var y = document.getElementById("lc");
        if (y.className === "btn-success") {
          y.classList.replace("btn-success", "btn-danger");
        } else {
  
          y.classList.replace("btn-danger", "btn-success");
        }
      }
    lancarCliente() {
        var x = document.getElementById("lancarCliente");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
        var y = document.getElementById("lcliente");
        if (y.className === "btn-success") {
          y.classList.replace("btn-success", "btn-danger");
        } else {
  
          y.classList.replace("btn-danger", "btn-success");
        }
      }  
}
const faturas = new Faturas();

class Rubricas {
    constructor() {
        console.log("Class Rubricas");
        
        //setando as urls e o modal
        this.urlBase = "https://fabianocardoso.adv.br/sistema" //seta o url base do sistema
        this.form = document.getElementById('form_rubrica');
        this.modal = document.getElementById('modal_rubrica');
        this.urlReceberDados = "configuracao/ajax_editar_rubrica"; //endereço de origem dos dados
        this.urlEditar = "configuracao/editarrubrica";
        this.urlAdicionar = "configuracao/salvarrubrica";
        
        //pegar as variáveis do formulário
        this.idInput = document.querySelector('[name="rubrica_id"]');
        this.rubricaInput = document.querySelector('[name="rubrica"]');
        this.codigoInput = document.querySelector('[name="cod_rubrica"]');
        this.elementoInput = document.querySelector('[name="elemento"]');
        this.paiInput = document.querySelector('[name="pai"]');
    }

    edit(id) {
        this.form.reset(); //limpando os dados do formulário
        fetch(`${siteUrl}/${this.urlReceberDados}/${id}`) //requisitando os dados por ajax, usando o fetch
            .then(response => response.json())
            .then(data => { 
        
                //preenchendo os dados do formulário
                this.idInput.value = data.rubrica_id;
                this.rubricaInput.value = data.rubrica;
                this.codigoInput.value = data.cod_rubrica;
                this.elementoInput.value = data.elemento;
                this.paiInput.value = data.pai;
            })

            .then(response => {
                this.modal.classList.add('show');
                this.modal.style.display = 'block';
                document.querySelector('.modal-title').textContent = 'Editar'; // Seta o titulo do modal
                this.form.action = `${siteUrl}/${this.urlEditar}/${id}`;
                
            })
            .catch(error => {
                console.error(error);
                alert('Erro ao receber dados do AJAX');
            });
    }

    filho(id) //precisa corrigir para que transporte o elemento do pai.
    {
        this.form.reset(); //limpando os dados do formulário

      fetch(`${siteUrl}/${this.urlReceberDados}/${id}`) //requisitando os dados por ajax, usando o fetch
      .then(response => response.json())
      .then(data => {  
          //preenchendo os dados do formulário
          this.paiInput.value = id;
          this.elementoInput.value = data.elemento;
      })
      .then(response => {
        this.modal.classList.add('show');
        this.modal.style.display = 'block';
        document.querySelector('.modal-title').textContent = 'Nova Rubrica'; // Set title to Bootstrap modal title
        this.form.action = `${siteUrl}/${this.urlAdicionar}`;
        })
        .catch(error => {
            console.error(error);
            alert('Erro ao receber dados do AJAX');
        });
    }
    novaRubrica() {
        this.form.reset(); //limpando os dados do formulário
        document.querySelector('.modal-title').textContent = 'Nova Rubrica'; // Set title to Bootstrap modal title
        this.form.action = `${siteUrl}/${this.urlAdicionar}`;
        this.modal.classList.add('show');
        this.modal.style.display = 'block';
    }
    close(){

        this.modal.classList.remove('fade');
        this.modal.classList.remove('show');
        document.querySelector('body').classList.remove('modal-open');
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop !== null) {
          backdrop.remove();
        }
        this.modal.style.display = 'none';

    }   
      
}
const rubricas = new Rubricas();

class Transferencias {
    constructor() {
        console.log("Class Transferencias");
        
        //setando as urls e o modal
        this.urlBase = "https://fabianocardoso.adv.br/sistema" //seta o url base do sistema
        this.form = document.getElementById('form_transferencia');
        this.modal = document.getElementById('modal_transferencia');
        this.urlReceberDados = "financeiro/ajax_editar_transferencia"; //endereço de origem dos dados
        this.urlEditar = "financeiro/editartransferencia";
        this.urlAdicionar = "financeiro/salvartransferencia";
        
        //pegar as variáveis do formulário
        this.idInput = document.querySelector('[name="transf_id"]');
        this.dataInput = document.querySelector('[name="data"]');
        this.descricaoInput = document.querySelector('[name="descricao"]');
        this.origemInput = document.querySelector('[name="origem"]');
        this.destinoInput = document.querySelector('[name="destino"]');
        this.valorInput = document.querySelector('[name="valor"]');
    }

    edit(id) {
        this.form.reset(); //limpando os dados do formulário
        fetch(`${siteUrl}/${this.urlReceberDados}/${id}`) //requisitando os dados por ajax, usando o fetch
            .then(response => response.json())
            .then(data => { 
        
                //preenchendo os dados do formulário
                this.idInput.value = data.rubrica_id;
                this.dataInput.value = data.data;
                this.descricaoInput.value = data.descricao;
                this.origemInput.value = data.origem;
                this.destinoInput.value = data.destino;
                this.valorInput.value = formataValor(data.valor);
            })

            .then(response => {
                this.modal.classList.add('show');
                this.modal.style.display = 'block';
                document.querySelector('.modal-title').textContent = 'Editar'; // Seta o titulo do modal
                this.form.action = `${this.urlBase}/${this.urlEditar}/${id}`;
                
            })
            .catch(error => {
                console.error(error);
                alert('Erro ao receber dados do AJAX');
            });
    }

    filho(id) //precisa corrigir para que transporte o elemento do pai.
    {
        this.form.reset(); //limpando os dados do formulário

      fetch(`${siteUrl}/${this.urlReceberDados}/${id}`) //requisitando os dados por ajax, usando o fetch
      .then(response => response.json())
      .then(data => {  
          //preenchendo os dados do formulário
          this.paiInput.value = id;
          this.elementoInput.value = data.elemento;
      })
      .then(response => {
        this.modal.classList.add('show');
        this.modal.style.display = 'block';
        document.querySelector('.modal-title').textContent = 'Nova Rubrica'; // Set title to Bootstrap modal title
        this.form.action = `${this.urlBase}/${this.urlAdicionar}`;
        })
        .catch(error => {
            console.error(error);
            alert('Erro ao receber dados do AJAX');
        });
    }
    novaTransferencia() {
        this.form.reset(); //limpando os dados do formulário
        document.querySelector('.modal-title').textContent = 'Nova Transferencia'; // Set title to Bootstrap modal title
        this.form.action = `${this.urlBase}/${this.urlAdicionar}`;
        this.modal.classList.add('show');
        this.modal.style.display = 'block';
    }
    close(){

        this.modal.classList.remove('fade');
        this.modal.classList.remove('show');
        document.querySelector('body').classList.remove('modal-open');
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop !== null) {
          backdrop.remove();
        }
        this.modal.style.display = 'none';

    }   
      
}
const transferencias = new Transferencias();