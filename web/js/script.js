<?php
require_once 'conect.php';

// UPDATE PAISES E CIDADES
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // ==== ATUALIZAR PAÍS ====
    if ($_POST["tipo"] === "pais") {

        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $codigo = $_POST["codigo"];
        $continente = $_POST["continente"];
        $populacao = $_POST["populacao"];
        $idioma = $_POST["idioma"];

        $sql = "UPDATE paises 
                SET nome=?, codigo_pais=?, continente=?, populacao=?, idioma=?
                WHERE id_pais=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssisi", $nome, $codigo, $continente, $populacao, $idioma, $id);
        $stmt->execute();

        echo "ok";
        exit;
    }

    // ==== ATUALIZAR CIDADE ====
    if ($_POST["tipo"] === "cidade") {

        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $pais = $_POST["pais"];
        $populacao = $_POST["populacao"];

        $sql = "UPDATE cidades 
                SET nome=?, id_pais=?, populacao=?
                WHERE id_cidade=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisi", $nome, $pais, $populacao, $id);
        $stmt->execute();

        echo "ok";
        exit;
    }
}

// ===== EXCLUIR =====
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["tipo"] === "excluir") {

    $id = $_POST["id"];
    $categoria = $_POST["categoria"]; // pais ou cidade

    if ($categoria === "pais") {
        $sql = "DELETE FROM paises WHERE id_pais = ?";
    } else {
        $sql = "DELETE FROM cidades WHERE id_cidade = ?";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo "ok";
    exit;
}

// ====== BUSCAR PAÍSES ======
$sqlPaises = "SELECT id_pais, nome, codigo_pais, continente, populacao, idioma FROM paises";
$paises = $conn->query($sqlPaises);

// ====== BUSCAR CIDADES ======
$sqlCidades = "SELECT 
                  cidades.id_cidade, 
                  cidades.nome AS cidade, 
                  cidades.populacao,
                  cidades.id_pais,
                  paises.nome AS pais 
               FROM cidades  
               INNER JOIN paises ON cidades.id_pais = paises.id_pais";
$cidades = $conn->query($sqlCidades);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Espaço Mundo - Controle</title>
    <link rel="stylesheet" href="./css/style_controle.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/fbd385f3f7.js" crossorigin="anonymous"></script>
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
                        <td colspan="7">Nenhum país cadastrado.</td>
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

                            <!-- IMPORTANTE: data-pais-id -->
                            <td data-pais-id="<?= $cidade['id_pais'] ?>">
                                <?= htmlspecialchars($cidade['pais']) ?>
                            </td>

                            <td><?= number_format($cidade['populacao'], 0, ',', '.') ?></td>

                            <td>
                                <i class="fas fa-edit edit" data-tipo="cidade"></i>
                                <i class="fas fa-trash delete" data-tipo="cidade"></i>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Nenhuma cidade cadastrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- ================= MODAL DE EDIÇÃO ================= -->
    <div class="modal-conteudo" id="modal">
        <div class="card-modal">
            <i class="fas fa-times close-btn" id="fechar"></i>
            <h2 class="modal-titulo" id="titulo-modal">Editar</h2>

            <!-- FORMULÁRIO DE PAÍS -->
            <form id="form-pais">

                <label class="label-form">
                    <i class="fas fa-flag"></i>
                    <input type="text" name="nome" placeholder="Nome do País" required>
                </label>

                <label class="label-form">
                    <i class="fas fa-hashtag"></i>
                    <input type="number" name="codigo" placeholder="Código do País" required>
                </label>

                <label class="label-form">
                    <i class="fas fa-globe-americas"></i>
                    <select name="continente" required>
                        <option value="" disabled selected>Selecione o Continente</option>
                        <option value="África">África</option>
                        <option value="América">América</option>
                        <option value="Ásia">Ásia</option>
                        <option value="Europa">Europa</option>
                        <option value="Oceania">Oceania</option>
                        <option value="Antártida">Antártida</option>
                    </select>
                </label>

                <label class="label-form">
                    <i class="fas fa-users"></i>
                    <input type="number" name="populacao" placeholder="População" required>
                </label>

                <label class="label-form">
                    <i class="fas fa-language"></i>
                    <input type="text" name="idioma" placeholder="Idioma Principal" required>
                </label>

                <button class="enviar-btn" type="submit">Salvar Alterações</button>
            </form>

            <!-- FORMULÁRIO DE CIDADE -->
            <form id="form-cidade" style="display: none;">

                <label class="label-form">
                    <i class="fa-solid fa-building"></i>
                    <input type="text" name="nome" placeholder="Nome da Cidade" required>
                </label>

                <label class="label-form">
                    <i class="fas fa-flag"></i>
                    <select name="pais" required>
                        <option value="" disabled selected>Selecione o País</option>
                        <?php foreach ($paises as $pais): ?>
                            <option value="<?= $pais['id_pais'] ?>"><?= htmlspecialchars($pais['nome']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>

                <label class="label-form">
                    <i class="fas fa-users"></i>
                    <input type="number" name="populacao" placeholder="População" required>
                </label>

                <button class="enviar-btn" type="submit">Salvar Alterações</button>
            </form>

        </div>
    </div>

    <!-- ============= MODAL EXCLUSÃO ============= -->
    <div class="modal-conteudo" id="modal-excluir">
        <div class="card-modal">
            <i class="fas fa-times close-btn" id="fechar-excluir"></i>

            <h2 id="titulo-excluir" style="text-align:center;">Excluir Registro</h2>
            <p id="texto-excluir" style="text-align:center;">Tem certeza?</p>

            <button class="enviar-btn" id="confirmar-excluir">Excluir</button>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>

</html>
