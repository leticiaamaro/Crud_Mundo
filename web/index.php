<?php
require_once 'conect.php';

// Busca todos os países do banco
$sqlPaises = "select id_pais, nome, codigo_pais, continente, populacao 
              from paises 
              order by nome ASC";
$paises = $conn->query($sqlPaises); // faz conexao recebe a query e envia para o banco
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espaço Mundo - Home Page</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/fbd385f3f7.js" crossorigin="anonymous"></script>
</head>

<body>

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
                    <p class="banner-desc">Conhecer países ao redor do mundo é uma experiência enriquecedora...</p>
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
                    <p class="sobre-desc">Acreditamos não apenas em explorar mais...</p>
                </div>
            </div>
        </section>

        <section id="paises" class="secao-paises">
            <div class="paises-conteudo">
                <h2 class="paises-titulo"><i class="fa-solid fa-globe"></i> Países</h2>

                <!-- Requisição de paises feita com JavaScript -> carregamento para nao sobrecarregar -->
                <div class="cards-paises" id="lista-paises">
                    <p style="color:white; text-align:center;">Carregando países...</p>
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
                <a href="tel:+5511999999999" class="item-footer-contato"><i class="fas fa-phone"></i>(11) 99999-9999</a>
                <a href="mailto:contato@espacomundo.com.br" class="item-footer-contato"><i class="fas fa-envelope"></i>contato@espacomundo.com.br</a>
                <a href="https://www.instagram.com/" target="_blank" class="item-footer-contato"><i class="fab fa-instagram"></i>@espacomundo</a>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT-->
    <script>
        const paisesPHP = <?php
                            $lista = [];
                            while ($p = $paises->fetch_assoc()) { //retorna cada pais como array associativo
                                $lista[] = $p; // adiciona o pais na lista
                            }
                            echo json_encode($lista); // transforma a lista em JSON para conseguir usar no JS
                            ?>;

        // Função principal
        async function carregarPaises() { // função assincrona para esperar o fetch
            // pega o container onde os cards serão colocados pelo id
            const container = document.getElementById("lista-paises"); 
            container.innerHTML = "<p style='color:white'>Carregando países...</p>"; // mensagem de carregamento
            const cards = []; // array para guardar os cards

            for (const pais of paisesPHP) { // para cada pais no array de paises do PHP
                // formata o codigo do pais para 3 digitos com zeros a esquerda
                const codigo = pais.codigo_pais.toString().padStart(3, "0"); 
                let bandeira = "assets/img_erro.jpg"; // Inicia bandeira com uma imagem de erro padrão

                try { //o try garante que se der erro no fetch, o código não para de funcionar
                    // Faz a requisição para a API de países
                    const resp = await fetch(`https://restcountries.com/v3.1/alpha/${codigo}`);
                    // Converte a resposta para JSON
                    const data = await resp.json();

                    if (data[0]?.flags?.svg) { // Verifica se a bandeira existe em SVG
                        bandeira = data[0].flags.svg; //pega a bandeira SVG que fica no indice 0 do array da API
                    }
                } catch (erro) { // executado se um erro ocorrer dentro do try
                    // o catch garante que a imagem de erro seja usada no caso de erro
                    bandeira = "assets/img_erro.jpg";
                }

                // a lista 'cards' vai puxar os templates de cada card de país
                cards.push(` <div class="card">
                                <img src="${bandeira}" alt="Bandeira de ${pais.nome}" class="card-img">

                                <div class="card-body">
                                    <h3 class="card-titulo">${pais.nome}</h3>
                                    <p class="card-texto">
                                        Continente: ${pais.continente}<br>
                                        População: ${Number(pais.populacao).toLocaleString("pt-BR")}
                                    </p>
                                    <a href="pais.php?id=${pais.id_pais}" class="card-btn">Saiba mais</a>
                                </div>
                            </div>`);
            }
            container.innerHTML = cards.join("");// junta todos os cards em uma string só e coloca no container
        }
        carregarPaises(); // chama a função principal para carregar os países
    </script>
</body>

</html>
