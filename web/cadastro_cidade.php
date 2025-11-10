<?php
require_once 'conect.php'; // ajuste o caminho conforme sua estrutura

// Inserção no banco
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $id_pais = $_POST['pais'];
    $populacao = $_POST['populacao'];

    $sql = "insert into cidades (nome, populacao, id_pais) values (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $nome, $populacao, $id_pais);

    if ($stmt->execute()) {
        echo "<script>alert('Cidade cadastrada com sucesso!'); window.location.href='cadastro_cidade.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar cidade: " . $conn->error . "');</script>";
    }
}

// Buscar países cadastrados para o select
$paises = [];
$result = $conn->query("SELECT id_pais, nome FROM paises ORDER BY nome ASC");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $paises[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espaço Mundo - Cadastro Cidade</title>
    <link rel="stylesheet" href="./css/cad_cidade.css">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/fbd385f3f7.js" crossorigin="anonymous"></script>
</head>

<body>

    <a href="controle.php" class="voltar-btn">
        <i class="fas fa-arrow-left"></i>
        Voltar
    </a>

    <div class="conteudo-card" role="region" aria-label="Criar conta">
        <h2 class="card-titulo">Cadastro - Cidade</h2>

        <form action="#" method="post" autocomplete="off">

            <label class="form-label">
                <i class="fa-solid fa-building"></i>
                <input type="text" name="nome" placeholder="Nome da Cidade"
                    pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]{2,}"
                    onkeypress="return /[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/i.test(event.key)" required>
            </label>
             <!-- *pattern: estabelece o padrão/regra
                 *onkeypress: previne a digiração de caracteres fora da regra
                 *i.test(event.key):expressão que verifica se as teclas pressionada seguem o padrão
            -->

            <label class="form-label">
                <i class="fas fa-flag"></i>
                <select name="pais" required style="border:0;background:transparent;outline:none;font-size:1rem;width:100%">
                    <option value="" disabled selected>Selecione o País</option>
                    <?php foreach ($paises as $pais): ?>
                        <option value="<?= $pais['id_pais'] ?>"><?= htmlspecialchars($pais['nome']) ?></option>
                    <?php endforeach; ?>
                </select>
            </label>

            <label class="form-label">
                <i class="fas fa-users"></i>
                <input type="number" name="populacao" placeholder="População" min="0" step="1" inputmode="numeric"
                    required onkeypress="return /[0-9]/.test(event.key)">
            </label>

            <button class="cadastrar-btn" type="submit">Cadastrar Cidade</button>
        </form>

    </div>

</body>

</html>
