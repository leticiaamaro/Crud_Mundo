<?php
require_once 'conect.php'; // ajuste conforme sua estrutura de pastas

// ====== BUSCAR PAÍSES ======
$sqlPaises = "select id_pais, nome, codigo_pais, continente, populacao, idioma from paises ";
$paises = $conn->query($sqlPaises);

// ====== BUSCAR CIDADES (com nome do país) ======
$sqlCidades = "select cidades.id_cidade, cidades.nome as cidade, cidades.populacao, paises.nome as pais 
               from cidades  
               inner join paises on cidades.id_pais = paises.id_pais";
$cidades = $conn->query($sqlCidades);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Espaço Mundo - Controle</title>
    <link rel="stylesheet" href="./css/style_controle.css">
    <!--FontAwesome-->
    <script src="https://kit.fontawesome.com/fbd385f3f7.js" crossorigin="anonymous"></script>
    <style>

    </style>
</head>


<body>
    <a href="index.php" class="voltar-btn">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>

    <!-- TABELA DE PAÍSES -->
    <div class="conteudo-tabelas" id="tabela-paises">
        <div class="header-tabelas">
            <h1><i class="fa-solid fa-earth-americas"></i> Gerenciamento - Países</h1>
            <a href="cadastro_pais.php"><button class="novo-cad-btn"><i class="fas fa-plus"></i> Novo Cadastro</button></a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>CÓDIGO</th>
                    <th>CONTINENTE</th>
                    <th>POPULAÇÃO</th>
                    <th>IDIOMA</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($paises->num_rows > 0): ?>
                    <?php while ($pais = $paises->fetch_assoc()): ?>
                        <tr>
                            <td><?= $pais['id_pais'] ?></td>
                            <td><?= htmlspecialchars($pais['nome']) ?></td>
                            <td><?= htmlspecialchars($pais['codigo_pais']) ?></td>
                            <td><?= htmlspecialchars($pais['continente']) ?></td>
                            <td><?= number_format($pais['populacao'], 0, ',', '.') ?></td>
                            <td><?= htmlspecialchars($pais['idioma']) ?></td>
                            <td>
                                <i class="fas fa-edit edit" data-tipo="pais"></i>
                                <i class="fas fa-trash delete" data-tipo="pais"></i>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align:center; color:#666;">Nenhum país cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- TABELA DE CIDADES -->
    <div class="conteudo-tabelas" id="tabela-cidades">
        <div class="header-tabelas">
            <h1><i class="fas fa-city"></i> Gerenciamento - Cidades</h1>
            <a href="cadastro_cidade.php"><button class="novo-cad-btn"><i class="fas fa-plus"></i> Novo Cadastro</button></a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>PAÍS</th>
                    <th>POPULAÇÃO</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($cidades->num_rows > 0): ?>
                    <?php while ($cidade = $cidades->fetch_assoc()): ?>
                        <tr>
                            <td><?= $cidade['id_cidade'] ?></td>
                            <td><?= htmlspecialchars($cidade['cidade']) ?></td>
                            <td><?= htmlspecialchars($cidade['pais']) ?></td>
                            <td><?= number_format($cidade['populacao'], 0, ',', '.') ?></td>
                            <td>
                                <i class="fas fa-edit edit" data-tipo="cidade"></i>
                                <i class="fas fa-trash delete" data-tipo="cidade"></i>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align:center; color:#666;">Nenhuma cidade cadastrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- MODAL DE EDIÇÃO -->
    <div class="modal-conteudo" id="modal">
        <div class="card-modal">
            <i class="fas fa-times close-btn" id="fechar"></i>
            <h2 class="modal-titulo" id="titulo-modal">Editar País</h2>

            <!-- FORMULÁRIO DE PAÍS -->
            <form id="form-pais">

                <label class="label-form">
                <i class="fas fa-flag"></i>
                <input type="text" name="nome" placeholder="Nome do País"
                    pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]{2,}"
                    onkeypress="return /[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/i.test(event.key)" required>
                </label>


                <label class="label-form">
                    <i class="fas fa-hashtag"></i>
                    <input type="number" name="codigo" placeholder="Código do País" inputmode="numeric" pattern="\\d+" required onkeypress="return /[0-9]/.test(event.key)">
                </label>


                <label class="label-form">
                    <i class="fas fa-globe-americas"></i>
                    <select name="continente" required
                        style="border:0;background:transparent;outline:none;font-size:1rem;width:100%">
                        <option value="" disabled selected>Selecione o Continente</option>
                        <option value="africa">África</option>
                        <option value="america">América</option>
                        <option value="asia">Ásia</option>
                        <option value="europa">Europa</option>
                        <option value="oceania">Oceania</option>
                        <option value="antartida">Antártida</option>
                    </select>
                </label>

                <label class="label-form">
                    <i class="fas fa-users"></i>
                    <input type="number" name="populacao" placeholder="População" min="0" step="1" inputmode="numeric"
                        required onkeypress="return /[0-9]/.test(event.key)">
                </label>


                <label class="label-form">
                    <i class="fas fa-language"></i>
                    <input type="text" name="idioma" placeholder="Idioma Principal"
                        pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]{2,}"
                        onkeypress="return /[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/i.test(event.key)" required>
                </label>

                <div class="signup-sub">Não sabe o código? <a
                        href="https://www.dadosmundiais.com/codigos-de-pais.php">Consulte aqui.</a>
                </div>

                <button class="enviar-btn" type="submit">Salvar Alterações</button>
            </form>

            <!-- FORMULÁRIO DE CIDADE -->
            <form id="form-cidade" style="display: none;">

                <label class="label-form">
                    <i class="fa-solid fa-building"></i>
                    <input type="text" name="nome" placeholder="Nome da Cidade"
                        pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]{2,}"
                        onkeypress="return /[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/i.test(event.key)" required>
                </label>

                <label class="label-form">
                    <i class="fas fa-flag"></i>
                    <select name="pais" required style="border:0;background:transparent;outline:none;font-size:1rem;width:100%">
                        <option value="" disabled selected>Selecione o País</option>
                        <?php foreach ($paises as $pais): ?>
                            <option value="<?= $pais['id_pais'] ?>"><?= htmlspecialchars($pais['nome']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>

                <label class="label-form">
                    <i class="fas fa-users"></i>
                    <input type="number" name="populacao" placeholder="População" min="0" step="1" inputmode="numeric"
                        required onkeypress="return /[0-9]/.test(event.key)">
                </label>

                <button class="enviar-btn" type="submit">Salvar Alterações</button>
            </form>
        </div>
    </div>

    <!-- MODAL DE EXCLUSÃO -->
    <div class="modal-conteudo" id="modal-excluir">
        <div class="card-modal">
            <i class="fas fa-times close-btn" id="fechar-excluir"></i>
            <h2 class="modal-titulo" id="titulo-excluir">Excluir Registro</h2>
            <p class="confirm-text" id="texto-excluir">Tem certeza de que deseja excluir este registro?</p>
            <button class="enviar-btn" id="confirmar-excluir">Excluir</button>
        </div>
    </div>

    <script>
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
                const tipo = btn.getAttribute("data-tipo");

                if (tipo === "pais") {
                    titulo.textContent = "Editar País";
                    formPais.style.display = "block";
                    formCidade.style.display = "none";
                } else {
                    titulo.textContent = "Editar Cidade";
                    formPais.style.display = "none";
                    formCidade.style.display = "block";
                }
            });
        });

        fechar.addEventListener("click", () => (modal.style.display = "none"));
        window.addEventListener("click", (e) => {
            if (e.target === modal) modal.style.display = "none";
        });

        /* --- EXCLUIR --- */
        const modalExcluir = document.getElementById("modal-excluir");
        const fecharExcluir = document.getElementById("fechar-excluir");
        const tituloExcluir = document.getElementById("titulo-excluir");
        const textoExcluir = document.getElementById("texto-excluir");

        const botoesExcluir = document.querySelectorAll(".delete");

        botoesExcluir.forEach((btn) => {
            btn.addEventListener("click", () => {
                modalExcluir.style.display = "flex";
                const tipo = btn.getAttribute("data-tipo");

                if (tipo === "pais") {
                    tituloExcluir.textContent = "Excluir País";
                    textoExcluir.textContent = "Tem certeza de que deseja excluir este país?";
                } else {
                    tituloExcluir.textContent = "Excluir Cidade";
                    textoExcluir.textContent = "Tem certeza de que deseja excluir esta cidade?";
                }
            });
        });

        fecharExcluir.addEventListener("click", () => (modalExcluir.style.display = "none"));
        window.addEventListener("click", (e) => {
            if (e.target === modalExcluir) modalExcluir.style.display = "none";
        });

        document.getElementById("confirmar-excluir").addEventListener("click", () => {
            alert("Registro excluído com sucesso!");
            modalExcluir.style.display = "none";
        });
    </script>
</body>

</html>
