<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espaço Mundo - Home Page</title>
    <link rel="stylesheet" href="styles.css">
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
            <a href="#buscas" class="nav-link">Buscas</a>
            <a href="#contato" class="nav-link">Contato</a>
        </nav>
            <div class="grupo-btns">
                <a href="controle.php"><button class="estilo-btn">Gerenciamento</button></a>
            </div>
    </header>

    <style>
    body {
        margin: 0;
        background: #101624;
        font-family: 'Segoe UI', 'Arial', sans-serif;
        color: #fff;
        padding-top: 90px;
    }
    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 24px 40px;
        background: rgba(16, 22, 36, 0.95);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        backdrop-filter: blur(8px);
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    }
    .logo {
        font-size: 1.5rem;
        font-weight: bold;
    }
    .logo-link{
        text-decoration: none;
        color: #b8e0ff;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .logo-img {
        max-width: 40px;
        height: auto;
        width: 100%;
        display: block;
    }
    @media (max-width: 600px) {
        .logo-img {
            max-width: 40px;
        }
        .header {
            padding: 16px 12px 0 12px;
        }
        .nav {
            gap: 16px;
        }
    }
    .nav {
        display: flex;
        gap: 32px;
    }
    .nav-link {
        color: #fff;
        text-decoration: none;
        font-size: 1.1rem;
        padding-bottom: 4px;
        position: relative;
        transition: color 0.2s;
    }
    .nav-link:hover {
        color: #b8e0ff;
    }
    .nav-link:hover::after {
        content: '';
        display: block;
        width: 60%;
        height: 2px;
        background: #b8e0ff;
        position: absolute;
        left: 20%;
        bottom: -4px;
        border-radius: 2px;
        animation: navLinkLine 0.3s ease;
    }
    @keyframes navLinkLine {
        from {
            width: 0;
            left: 50%;
        }
        to {
            width: 60%;
            left: 20%;
        }
    }
    .estilo-btn {
        background: #b8e0ff;
        color: #101624;
        border: none;
        border-radius: 20px;
        padding: 8px 28px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        transition: background 0.2s, color 0.2s;
        font-family: 'Segoe UI', sans-serif;
    }
    .estilo-btn:hover {
        background: #fff;
        color: #101624;
    }
    .grupo-btns {
        display: flex;
        gap: 10px;
        align-items: center;
    }
    </style>

    <main>
        <section id="banner">
            <div class="banner-content">
                <div class="banner-text">
                    <span class="banner-subtitle">VENHA CONHECER OS PAÍSES DO SEU</span>
                    <h1 class="banner-title">PLANETA TERRA</h1>
                    <p class="banner-desc">A Terra é o terceiro planeta a partir do Sol. O eixo de rotação da Terra é inclinado em relação ao seu plano orbital, o que produz as estações do ano na Terra. A interação gravitacional entre a Terra e a Lua causa marés, estabiliza a orientação da Terra em seu eixo e desacelera gradualmente sua rotação..</p>
                    <div class="banner-actions">
                        <button class="banner-btn">Saiba Mais</button>
                    </div>
                </div>
                <div class="banner-image">
                    <img src="assets/mundo.jpg" alt="Planeta Terra" class="planet-img">
                </div>
            </div>
    </section>

        <section id="sobre" class="mission-section">
            <div class="mission-content">
                <div class="mission-image">
                    <img src="assets/img_sobre.jpg" alt="Imagem ilustrativa do Espaço Mundo" class="mission-img">
                </div>
                <div class="mission-text">
                    <h2 class="mission-title">Sobre Nós</h2>
                    <p class="mission-desc">Acreditamos não apenas em explorar mais, mas em explorar melhor. E explorar melhor significa alinhar o sucesso da sua jornada com experiências únicas e inesquecíveis em cada país. Uma experiência onde todos ganham!</p>
                </div>
            </div>
        </section>

    <section id="buscas" class="search-section">
            <div class="search-container">
                <h2 class="search-title"><i class="fas fa-search"></i>Buscas</h2>
                <form class="search-form" role="search" aria-label="Buscar país">
                    <input type="text" class="search-input" placeholder="Insira o nome de um país">
                    <button type="submit" class="search-btn">Buscar</button>
                </form>

                <div class="cards-grid" aria-hidden="false">
                    <article class="card">
                        <img src="assets/mundo.jpg" alt="Card 1" class="card-img">
                        <div class="card-body">
                            <h3 class="card-title">Card title</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-btn">Saiba mais</a>
                        </div>
                    </article>
                    <article class="card">
                        <img src="assets/img_sobre.jpg" alt="Card 2" class="card-img">
                        <div class="card-body">
                            <h3 class="card-title">Card title</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-btn">Saiba mais</a>
                        </div>
                    </article>
                        <article class="card">
                            <img src="assets/mundo.jpg" alt="Card 3" class="card-img">
                            <div class="card-body">
                                <h3 class="card-title">Card title</h3>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-btn">Saiba mais</a>
                            </div>
                        </article>
                        <article class="card">
                            <img src="assets/img_sobre.jpg" alt="Card 4" class="card-img">
                            <div class="card-body">
                                <h3 class="card-title">Card title</h3>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="card-btn">Saiba mais</a>
                            </div>
                        </article>
                </div>
            </div>
        </section>

        <section id="contato" class="contact-section">
            <div class="contact-container">
                <h2 class="contact-title"><i class="fas fa-envelope"></i> Contate-nos</h2>
                <p class="contact-subtitle">Alguma pergunta ou observação? Basta nos escrever uma mensagem!</p>
                <form class="contact-form">
                    <div class="form-group">
                        <input type="email" placeholder="E-mail" class="form-input">
                        <input type="text" placeholder="Nome" class="form-input">
                    </div>
                    <textarea placeholder="Digite sua mensagem aqui..." class="form-input message-input"></textarea>
                    <button type="submit" class="contact-btn">ENVIAR</button>
                </form>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer-content">
            <a href="#banner" class="footer-brand">
                <img src="assets/logo_mundo.png" alt="logo">
                Espaço Mundo
            </a>
            <div class="footer-contacts">
                <a href="tel:+5511999999999" class="footer-contact-item">
                    <i class="fas fa-phone"></i>
                    (11) 99999-9999
                </a>
                <a href="mailto:contato@espacomundo.com.br" class="footer-contact-item">
                    <i class="fas fa-envelope"></i>
                    contato@espacomundo.com.br
                </a>
                <a href="https://www.instagram.com/" target="_blank" class="footer-contact-item">
                    <i class="fab fa-instagram"></i>
                    @espacomundo
                </a>
            </div>
        </div>
    </footer>

    
</body>
    <style>
        /*Section - banner*/
    #banner {
        width: 100%;
        min-height: 480px;
        background: radial-gradient(ellipse at center, #1a2236 0%, #101624 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 48px 0 32px 0;
        position: relative;
        overflow: hidden;
    }
    .banner-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
        gap: 32px;
    }
    .banner-text {
        flex: 1;
        color: #fff;
        z-index: 2;
    }
    .banner-subtitle {
        font-size: 1.1rem;
        color: #b8e0ff;
        letter-spacing: 2px;
        font-weight: 500;
        margin-bottom: 12px;
        display: block;
    }
    .banner-title {
        font-size: 3rem;
        font-weight: 700;
        letter-spacing: 4px;
        margin: 0 0 18px 0;
        color: #fff;
        text-shadow: 0 2px 24px #0a0f1c;
    }
    .banner-desc {
        font-size: 1.1rem;
        color: #b8e0ff;
        max-width: 480px;
        margin-bottom: 32px;
        line-height: 1.6;
    }
    .banner-actions {
        display: flex;
        align-items: center;
        gap: 18px;
    }
    .banner-btn {
        background: #fff;
        color: #101624;
        border: none;
        border-radius: 24px;
        padding: 12px 32px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        transition: background 0.2s, color 0.2s;
    }
    .banner-btn:hover {
        background: #b8e0ff;
        color: #101624;
    }
    .banner-image {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
    }
    .planet-img {
        width: 340px;
        max-width: 90vw;
        height: auto;
        border-radius: 50%;
        box-shadow: 0 8px 48px 0 #0a0f1c;
        background: #0a0f1c;
        object-fit: cover;
        filter: drop-shadow(0 0 32px #1a2236);
    }
    @media (max-width: 900px) {
        .banner-content {
            flex-direction: column;
            gap: 24px;
        }
        .banner-image {
            margin-top: 24px;
        }
        .planet-img {
            width: 220px;
        }
        .banner-title {
            font-size: 2.5rem;
        }
    }
    /* Estilos da seção de busca */
    .search-section {
        padding: 80px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: radial-gradient(ellipse at center, #1a2236 0%, #101624 100%);
    }
    .search-container {
        max-width: 1200px;
        width: 100%;
        text-align: center;
    }
    .search-title {
        font-size: 2.8rem;
        color: #fff;
        margin-bottom: 30px;
        font-weight: 600;
        text-align: center;
    }
    .search-title i {
        color: #b8e0ff;
        margin-right: 12px;
        font-size: 2.2rem;
    }
    .search-form {
        display: flex;
        gap: 16px;
        max-width: 700px;
        margin: 0 auto;
    }
    .search-input {
        flex: 1;
        padding: 16px 24px;
        border-radius: 8px;
        border: 1px solid rgba(184, 224, 255, 0.2);
        background: rgba(255, 255, 255, 0.05);
        color: #fff;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        font-family: 'Segoe UI', 'Arial', sans-serif;
    }
    .search-input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }
    .search-input:focus {
        outline: none;
        border-color: #b8e0ff;
        background: rgba(184, 224, 255, 0.1);
    }
    .search-btn {
        background: #b8e0ff;
        color: #101624;
        border: none;
        padding: 16px 32px;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 4px 12px rgba(184, 224, 255, 0.2);
        font-family: 'Segoe UI', 'Arial', sans-serif;
    }
    .search-btn:hover {
        background: #fff;
        transform: translateY(-2px);
    }
    
    /* Cards (buscas) */
    .cards-grid {
        display: flex;
        gap: 24px;
        justify-content: center;
        margin-top: 32px;
        flex-wrap: wrap;
    }
    .card {
        background: #0f1620;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(2,6,23,0.6);
        width: 100%;
        max-width: 320px;
        display: flex;
        flex-direction: column;
    }
    .card-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        display: block;
    }
    .card-body {
        padding: 18px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        flex: 1;
    }
    .card-title {
        margin: 0;
        color: #fff;
        font-size: 1.05rem;
    }
    .card-text {
        margin: 0;
        color: rgba(255,255,255,0.85);
        line-height: 1.4;
        flex: 1;
    }
    .card-btn {
        display: inline-block;
        background: #b8e0ff;
        color: #101624;
        padding: 8px 14px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        box-shadow: 0 8px 20px rgba(184,224,255,0.12);
        transition: transform 0.18s ease, box-shadow 0.18s ease, background-color 0.18s ease;
    }
    .card-btn:hover {
        background: #fff;
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(16,22,36,0.35);
    }

    @media (max-width: 900px) {
        .cards-grid {
            gap: 18px;
        }
        .card-img {
            height: 160px;
        }
    }

    /* For wide screens: 4 cards in a single row */
    @media (min-width: 1200px) {
        .cards-grid {
            flex-wrap: nowrap;
        }
        .card {
            flex: 0 0 calc((100% - 72px) / 4); /* 3 gaps of 24px */
            max-width: none;
        }
    }

    @media (max-width: 600px) {
        .search-form {
            flex-direction: column;
            gap: 12px;
        }
        .search-title {
            font-size: 2rem;
        }
        .search-btn {
            width: 100%;
        }
        .cards-grid {
            flex-direction: column;
            align-items: center;
        }
    }

    /* Estilos da seção Sobre/Missão */
    .mission-section {
        padding: 80px 20px;
    }
    .mission-content {
        display: flex;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
        gap: 60px;
    }
    .mission-image {
        flex: 1;
        position: relative;
        border-radius: 12px;
        overflow: hidden;
    }
    .mission-img {
        width: 100%;
        height: auto;
        border-radius: 12px;
        transition: transform 0.3s ease;
    }
    .mission-img:hover {
        transform: scale(1.05);
    }
    .mission-text {
        flex: 1;
        padding: 20px;
    }
    .mission-title {
        font-size: 2.5rem;
        color: #b8e0ff;
        margin-bottom: 24px;
        line-height: 1.2;
    }
    .mission-desc {
        font-size: 1.1rem;
        color: #fff;
        line-height: 1.6;
        opacity: 0.9;
    }
    @media (max-width: 900px) {
        .mission-content {
            flex-direction: column;
            gap: 40px;
        }
        .mission-title {
            font-size: 2rem;
        }
        .mission-desc {
            font-size: 1rem;
        }
    }

    /* Estilos da seção de contato */
    .contact-section {
        padding: 80px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .contact-container {
        max-width: 800px;
        width: 100%;
        text-align: center;
    }
    .contact-title {
        font-size: 2.5rem;
        color: #fff;
        margin-bottom: 16px;
        font-weight: 600;
    }
    .contact-title i {
        color: #b8e0ff;
        margin-right: 10px;
    }
    .contact-subtitle {
        color: #fff;
        font-size: 1.2rem;
        margin-bottom: 40px;
    }
    .contact-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
        max-width: 600px;
        margin: 0 auto;
    }
    .form-group {
        display: flex;
        gap: 20px;
    }
    .form-input {
        flex: 1;
        padding: 16px 20px;
        border-radius: 8px;
        border: none;
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        font-size: 1rem;
        transition: background-color 0.3s;
    }
    .form-input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }
    .form-input:focus {
        outline: none;
        background: rgba(184, 224, 255, 0.1);
    }
    .message-input {
        min-height: 150px;
        resize: vertical;
        width: 100%;
        box-sizing: border-box;
        font-family: 'Segoe UI', 'Arial', sans-serif;
    }
    .contact-btn {
        background: #b8e0ff;
        color: #101624;
        border: none;
        padding: 16px 40px;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .contact-btn:hover {
        background: #fff;
        transform: translateY(-2px);
    }
    @media (max-width: 600px) {
        .form-group {
            flex-direction: column;
        }
        .contact-title {
            font-size: 2rem;
        }
        .contact-subtitle {
            font-size: 1rem;
        }
    }
    /* Estilos do Footer */
    footer {
        background: #0a0f1c;
        padding: 24px 40px;
        margin-top: 40px;
    }
    .footer-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
    }
    .footer-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #b8e0ff;
        text-decoration: none;
        font-size: 1.2rem;
        font-weight: bold;
    }
    .footer-brand img {
        max-width: 32px;
        height: auto;
    }
    .footer-contacts {
        display: flex;
        gap: 24px;
    }
    .footer-contact-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #fff;
        text-decoration: none;
    }
    .footer-contact-item i {
        color: #b8e0ff;
        font-size: 1.2rem;
    }
    </style>

    
</html>
