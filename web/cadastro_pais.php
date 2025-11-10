<?php
require_once 'conect.php';

// Cadastro de País
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $continente = $_POST['continente'];
    $populacao = $_POST['populacao'];
    $idioma = $_POST['idioma'];

    // Corrigindo o prepare + bind_param para mysqli
    $stmt = $conn->prepare("insert into paises (nome, continente, codigo_pais, populacao, idioma) values (?, ?, ?, ?, ?)");

    // Verifica se o prepare foi bem-sucedido
    if ($stmt === false) {
        die("Erro ao preparar a query: " . $conn->error);
    }

    // 'ssiis' significa: string, string, integer, integer, string
    $stmt->bind_param("ssiis", $nome, $continente, $codigo, $populacao, $idioma);

    if ($stmt->execute()) {
        echo "<script>alert('País cadastrado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar país: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espaço Mundo - Cadastro País</title>
    <link rel="stylesheet" href="./css/cad_pais.css">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/fbd385f3f7.js" crossorigin="anonymous"></script>
    <style>
        
    </style>
</head>

<body>

    <a href="controle.php" class="voltar-btn">
        <i class="fas fa-arrow-left"></i>
        Voltar
    </a>

    <div class="conteudo-card" role="region" aria-label="Criar conta">
        <h2 class="card-titulo">Cadastro - País</h2>

        <form action="cadastro_pais.php" method="POST" autocomplete="off">
            <label class="form-label">
                <i class="fas fa-flag"></i>
                <input type="text" name="nome" placeholder="Nome do País"
                    pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]{2,}"
                    onkeypress="return /[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/i.test(event.key)" required>
            </label>
            <!-- *pattern: estabelece o padrão/regra
                 *onkeypress: previne a digiração de caracteres fora da regra
                 *i.test(event.key):expressão que verifica se as teclas pressionada seguem o padrão
            -->

            <label class="form-label">
                <i class="fas fa-hashtag"></i>
                <input type="number" name="codigo" placeholder="Código do País" inputmode="numeric" pattern="\\d+" required onkeypress="return /[0-9]/.test(event.key)">
            </label>

            <label class="form-label">
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

            <label class="form-label">
                <i class="fas fa-users"></i>
                <input type="number" name="populacao" placeholder="População" min="0" step="1" inputmode="numeric"
                    required onkeypress="return /[0-9]/.test(event.key)">
            </label>

            <label class="form-label">
                <i class="fas fa-language"></i>
                <input type="text" name="idioma" placeholder="Idioma Principal"
                    pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]{2,}"
                    onkeypress="return /[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/i.test(event.key)" required>
            </label>

            <div class="link-codigos">Não sabe o código? <a
                    href="https://www.dadosmundiais.com/codigos-de-pais.php">Consulte aqui.</a>
            </div>
            <button class="cadastrar-btn" type="submit">Cadastrar País</button>
        </form>

    </div>

</body>

</html>
