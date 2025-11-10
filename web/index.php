<?php
require_once 'conect.php';

// Busca todos os países
$sqlPaises = "select id_pais, nome, codigo_pais, continente, populacao from paises order by nome ASC";
$paises = $conn->query($sqlPaises);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espaço Mundo - Home Page</title>
    <link rel="stylesheet" href="./css/style.css">
    <!--FontAwesome-->
    <script src="https://kit.fontawesome.com/fbd385f3f7.js" crossorigin="anonymous"></script>
<body>
    <!-- Header estilizado -->
    <header class="header" id="header">
        <div class="logo">
            <a href="#banner" class="logo-link">
                <img src="assets/logo_mundo.png" alt="logo" class="logo-img">
                Espaço Mundo
            </a>
        </div>
        <nav class="nav">
            <a href="#sobre" class="nav-link">Sobre</a>
            <a href="#paises" class="nav-link">Países</a>
            <a href="#contato" class="nav-link">Contato</a>
        </nav>
        <div class="grupo-btns">
            <a href="controle.php"><button class="estilo-btn">Gerenciamento</button></a>
        </div>
    </header>

    <main>
        <section id="banner">
            <div class="conteudo-banner">
                <div class="info-banner">
                    <span class="banner-titulo">VENHA CONHECER OS PAÍSES DO SEU</span>
                    <h1 class="banner-subtitulo">PLANETA TERRA</h1>
                    <p class="banner-desc">Conhecer países ao redor do mundo é uma experiência enriquecedora que amplia horizontes e transforma perspectivas.Cada destino traz histórias, culturas e tradições únicas que despertam curiosidade e admiração.</p>
                    <div class="banner-saiba-mais">
                        <button class="banner-btn">Saiba Mais</button>
                    </div>
                </div>
                <div class="banner-imagem">
                    <img src="assets/mundo.jpg" alt="Planeta Terra" class="planeta-img">
                </div>
            </div>
        </section>

        <section id="sobre" class="secao-sobre">
            <div class="sobre-conteudo">
                <div class="sobre-imagem">
                    <img src="assets/img_sobre.jpg" alt="Imagem Mundo" class="sobre-img">
                </div>
                <div class="sobre-texto">
                    <h2 class="sobre-titulo">Sobre Nós</h2>
                    <p class="sobre-desc">Acreditamos não apenas em explorar mais, mas em explorar melhor. E explorar melhor significa alinhar o sucesso da sua jornada com experiências únicas e inesquecíveis em cada país. Uma experiência onde todos ganham!</p>
                </div>
            </div>
        </section>

        <section id="paises" class="secao-paises">
            <div class="paises-conteudo">
                <h2 class="paises-titulo"><i class="fa-solid fa-globe"></i> Países</h2>

                <div class="cards-paises" aria-hidden="false">
                    <?php
                    if ($paises->num_rows > 0) {
                        while ($pais = $paises->fetch_assoc()) {
                            // Preenche zeros à esquerda para garantir 3 dígitos
                            $codigo_pais = str_pad($pais['codigo_pais'], 3, "0", STR_PAD_LEFT);
                            // Usando a API REST Countries para pegar a bandeira
                            $api_url = "https://restcountries.com/v3.1/alpha/{$codigo_pais}";
                            $json = @file_get_contents($api_url);
                            $bandeira= "assets/img_erro.jpg"; // fallback se der erro
                            if ($json) {
                                $data = json_decode($json, true);
                                if (isset($data[0]['flags']['svg'])) {
                                    $bandeira= $data[0]['flags']['svg'];
                                }
                            }
                    ?>
                            <div class="card">
                                <img src="<?= $bandeira?>" alt="Bandeira de <?= htmlspecialchars($pais['nome']) ?>" class="card-img">
                                <div class="card-body">
                                    <h3 class="card-titulo"><?= htmlspecialchars($pais['nome']) ?></h3>
                                    <p class="card-texto">
                                        Continente: <?= htmlspecialchars($pais['continente']) ?><br>
                                        População: <?= number_format($pais['populacao'], 0, ',', '.') ?><br>
                                    </p>
                                    <a href="pais.php?id=<?= $pais['id_pais'] ?>" class="card-btn">Saiba mais</a>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<p style='color:#fff; text-align:center;'>Nenhum país cadastrado.</p>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <section id="contato" class="secao-contato">
            <div class="contato-conteudo">
                <h2 class="contato-titulo"><i class="fas fa-envelope"></i> Contate-nos</h2>
                <p class="contato-subtitulo">Alguma pergunta ou observação? Basta nos escrever uma mensagem!</p>
                <form class="contato-form">
                    <div class="form-conteudo">
                        <input type="email" placeholder="E-mail" class="form-input">
                        <input type="text" placeholder="Nome" class="form-input">
                    </div>
                    <textarea placeholder="Digite sua mensagem aqui..." class="form-input message-input"></textarea>
                    <button type="submit" class="contato-btn">ENVIAR</button>
                </form>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer-conteudo">
            <a href="#banner" class="footer-logo">
                <img src="assets/logo_mundo.png" alt="logo">
                Espaço Mundo
            </a>
            <div class="footer-contatos">
                <a href="tel:+5511999999999" class="item-footer-contato">
                    <i class="fas fa-phone"></i>
                    (11) 99999-9999
                </a>
                <a href="mailto:contato@espacomundo.com.br" class="item-footer-contato">
                    <i class="fas fa-envelope"></i>
                    contato@espacomundo.com.br
                </a>
                <a href="https://www.instagram.com/" target="_blank" class="item-footer-contato">
                    <i class="fab fa-instagram"></i>
                    @espacomundo
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
