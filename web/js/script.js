/*  CONTROLE.PHP */

// Variavel para identificar o ID que está sendo editdo
let idEdit = null;

/* --- EDITAR --- */
// contantes do modal e formulários de edição
const modal = document.getElementById("modal");
const fechar = document.getElementById("fechar");
const titulo = document.getElementById("titulo-modal");
const formPais = document.getElementById("form-pais");
const formCidade = document.getElementById("form-cidade");

const botoesEditar = document.querySelectorAll(".edit"); // Seleciona todos os botões de editar

// Adiciona evento de clique para cada botão de editar
botoesEditar.forEach((btn) => {
    btn.addEventListener("click", () => { // Abre o modal de edição
        modal.style.display = "flex"; // Mostra o modal que estava oculto

        const linha = btn.closest("tr");
        const tds = linha.querySelectorAll("td");
        const tipo = btn.dataset.tipo;

        idEdit = tds[0].textContent.trim(); // ← pega ID da linha editada

        if (tipo === "pais") { // puxa os dados do país para o formulário
            titulo.textContent = "Editar País";

            formPais.style.display = "block";
            formCidade.style.display = "none";

            formPais.nome.value = tds[1].textContent.trim();
            formPais.codigo.value = tds[2].textContent.trim();
            formPais.continente.value = tds[3].textContent.trim();
            formPais.populacao.value = tds[4].textContent.replace(/\./g, "");
            formPais.idioma.value = tds[5].textContent.trim();

        } else {
            titulo.textContent = "Editar Cidade"; // puxa os dados da cidade para o formulário

            formPais.style.display = "none";
            formCidade.style.display = "block";

            formCidade.nome.value = tds[1].textContent.trim();
            formCidade.pais.value = tds[2].getAttribute("data-pais-id");
            formCidade.populacao.value = tds[3].textContent.replace(/\./g, "");
        }
    });
});

fechar.addEventListener("click", () => {
    modal.style.display = "none"; // Fecha o modal quando clicar no "X"
});

/* ---------------------- SALVAR PAÍS ---------------------- */
formPais.onsubmit = async (e) => { // Função assíncrona para salvar o país
    e.preventDefault(); // Evita o envio padrão do formulário

    const dados = new FormData(formPais); // Cria um objeto com os dados do formulário
    dados.append("id", idEdit); // ID do país que vai ser editado
    dados.append("tipo", "pais"); // tipo == pais

    const req = await fetch("controle.php", { // Faz a requisição para o controle.php
        method: "POST",
        body: dados // Envia os dados do formulário atraves do metodo POST
    });
    const resp = await req.text(); // Pega a resposta do servidor como texto
    // verifica a resposta do servidor
    if (resp === "ok") {
        alert("País atualizado!");
        location.reload();
    } else {
        alert("Erro ao atualizar país");
    }
};

/* ---------------------- SALVAR CIDADE ---------------------- */
formCidade.onsubmit = async (e) => {
    e.preventDefault();

    const dados = new FormData(formCidade);
    dados.append("id", idEdit);
    dados.append("tipo", "cidade");

    const req = await fetch("controle.php", {
        method: "POST",
        body: dados
    });

    const resp = await req.text();
    // verifica a resposta do servidor
    if (resp === "ok") {
        alert("Cidade atualizada!");
        location.reload();
    } else {
        alert("Erro ao atualizar cidade");
    }
};

/* --- EXCLUIR --- */
// contantes do modal de exclusão
const modalExcluir = document.getElementById("modal-excluir");
const fecharExcluir = document.getElementById("fechar-excluir");
const tituloExcluir = document.getElementById("titulo-excluir");
const textoExcluir = document.getElementById("texto-excluir");

const botoesExcluir = document.querySelectorAll(".delete"); // Seleciona todos os botões de excluir

let idExcluir = null; // variavel para armazenar o ID do item excluído
let categoriaExcluir = null; // variavel para armazenar a categoria do item excluído (pais ou cidade)

botoesExcluir.forEach((btn) => { // evento de clique para cada botão de excluir
    btn.addEventListener("click", () => { // abre o modal de exclusão
        modalExcluir.style.display = "flex"; // mostra o modal que estava oculto

        const linha = btn.closest("tr"); // seleciona a linha da tabela
        const tipo = btn.dataset.tipo; //puxa o tipo (pais ou cidade)

        idExcluir = linha.querySelector("td").textContent.trim(); // pega o ID da linha selecionada
        categoriaExcluir = tipo; // armazena a categoria (pais ou cidade)

        if (tipo === "pais") {
            tituloExcluir.textContent = "Excluir País";
            textoExcluir.textContent = "Tem certeza que deseja excluir este país?";
        } else {
            tituloExcluir.textContent = "Excluir Cidade";
            textoExcluir.textContent = "Tem certeza que deseja excluir esta cidade?";
        }
    });
});

fecharExcluir.addEventListener("click", () => {
    modalExcluir.style.display = "none"; // fecha o modal de exclusão ao clicar no "X"
});

document.getElementById("confirmar-excluir").addEventListener("click", async () => { // evento de clique para confirmar a exclusão

    const dados = new FormData(); // cria um objeto para enviar os dados
    dados.append("tipo", "excluir"); // tipo == excluir
    dados.append("id", idExcluir);// ID do item  excluído
    dados.append("categoria", categoriaExcluir); // categoria do item excluído (pais ou cidade)

    const req = await fetch("controle.php", { // faz a requisição para o controle.php
        method: "POST",
        body: dados // envia os dados do formulário através do método POST
    });

    const resp = await req.text(); // pega a resposta do servidor como texto
    // verifica a resposta do servidor
    if (resp === "ok") {
        alert("Registro excluído com sucesso!");
        location.reload();
    } else {
        alert("Erro ao excluir registro!");
    }

    modalExcluir.style.display = "none"; // fecha o modal de exclusão
});
