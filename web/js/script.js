/*  CONTROLE.PHP */

// VARIÁVEL PARA IDENTIFICAR O ID QUE ESTÁ SENDO EDITADO
let idEdit = null;

/* --- EDITAR --- */
const modal = document.getElementById("modal");
const fechar = document.getElementById("fechar");
const titulo = document.getElementById("titulo-modal");
const formPais = document.getElementById("form-pais");
const formCidade = document.getElementById("form-cidade");

const botoesEditar = document.querySelectorAll(".edit");

botoesEditar.forEach((btn) => {
    btn.addEventListener("click", () => {
        modal.style.display = "flex";

        const linha = btn.closest("tr");
        const tds = linha.querySelectorAll("td");
        const tipo = btn.dataset.tipo;

        idEdit = tds[0].textContent.trim(); // ← pega ID da linha editada

        if (tipo === "pais") {
            titulo.textContent = "Editar País";

            formPais.style.display = "block";
            formCidade.style.display = "none";

            formPais.nome.value = tds[1].textContent.trim();
            formPais.codigo.value = tds[2].textContent.trim();
            formPais.continente.value = tds[3].textContent.trim();
            formPais.populacao.value = tds[4].textContent.replace(/\./g, "");
            formPais.idioma.value = tds[5].textContent.trim();

        } else {
            titulo.textContent = "Editar Cidade";

            formPais.style.display = "none";
            formCidade.style.display = "block";

            formCidade.nome.value = tds[1].textContent.trim();
            formCidade.pais.value = tds[2].getAttribute("data-pais-id");
            formCidade.populacao.value = tds[3].textContent.replace(/\./g, "");
        }
    });
});

fechar.addEventListener("click", () => {
    modal.style.display = "none";
});

/* ---------------------- SALVAR PAÍS ---------------------- */
formPais.onsubmit = async (e) => {
    e.preventDefault();

    const dados = new FormData(formPais);
    dados.append("id", idEdit);
    dados.append("tipo", "pais");

    const req = await fetch("controle.php", {
        method: "POST",
        body: dados
    });

    const resp = await req.text();

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

    if (resp === "ok") {
        alert("Cidade atualizada!");
        location.reload();
    } else {
        alert("Erro ao atualizar cidade");
    }
};

/* --- EXCLUIR --- */
const modalExcluir = document.getElementById("modal-excluir");
const fecharExcluir = document.getElementById("fechar-excluir");
const tituloExcluir = document.getElementById("titulo-excluir");
const textoExcluir = document.getElementById("texto-excluir");

const botoesExcluir = document.querySelectorAll(".delete");

let idExcluir = null;
let categoriaExcluir = null;

botoesExcluir.forEach((btn) => {
    btn.addEventListener("click", () => {
        modalExcluir.style.display = "flex";

        const linha = btn.closest("tr");
        const tipo = btn.dataset.tipo;

        idExcluir = linha.querySelector("td").textContent.trim();
        categoriaExcluir = tipo;

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
    modalExcluir.style.display = "none";
});

document.getElementById("confirmar-excluir").addEventListener("click", async () => {

    const dados = new FormData();
    dados.append("tipo", "excluir");
    dados.append("id", idExcluir);
    dados.append("categoria", categoriaExcluir);

    const req = await fetch("controle.php", {
        method: "POST",
        body: dados
    });

    const resp = await req.text();

    if (resp === "ok") {
        alert("Registro excluído com sucesso!");
        location.reload();
    } else {
        alert("Erro ao excluir registro!");
    }

    modalExcluir.style.display = "none";
});
