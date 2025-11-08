<!DOCTYPE html> 
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espaço Mundo - Controle</title>
    <script src="https://kit.fontawesome.com/fbd385f3f7.js" crossorigin="anonymous"></script>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 40px 0 40px;
        }

        body {
            font-family: 'Segoe UI', 'Arial', sans-serif;
            background: #101624;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            color: #101624;
            gap: 40px;
        }

        .container {
            background: #f7f9fa;
            border-radius: 12px;
            padding: 36px 28px;
            width: 90%;
            max-width: 900px;
            box-shadow: 0 12px 40px rgba(2, 6, 23, 0.6);
        }

        /* Espaço extra no final da página */
        #tabela-cidades {
            margin-bottom: 80px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid rgba(16, 22, 36, 0.6);
            padding-bottom: 10px;
            margin-bottom: 24px;
        }

        .header h1 {
            font-size: 1.8rem;
            color: #101624;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
        }

        .header a {
            text-decoration: none;
        }

        .new-btn {
            border-radius: 28px;
            background: #b8e0ff;
            color: #101624;
            border: none;
            padding: 10px 18px;
            cursor: pointer;
            font-weight: 500;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background 0.3s;
        }

        .new-btn:hover {
            background: #383e4a;
            color: #b8e0ff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
        }

        thead {
            background: #b8e0ff;
            color: #101624;
            text-align: left;
        }

        th,
        td {
            padding: 12px 16px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        tbody tr:hover {
            background: #f4f7f8;
        }

        td i {
            cursor: pointer;
            font-size: 1rem;
        }

        .edit {
            color: #356df0;
            margin-right: 10px;
        }

        .delete {
            color: #d64545;
        }

        .edit:hover {
            color: #5a8fff;
        }

        .delete:hover {
            color: #ff6b6b;
        }

        .voltar-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.1);
            transition: background 0.3s;
        }

        .voltar-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        @media (max-width: 600px) {
            .container {
                padding: 28px;
            }

            table {
                font-size: 0.9rem;
            }

            th,
            td {
                padding: 10px;
            }
        }
    </style>
</head>

<body>

    <a href="index.html" class="voltar-btn">
        <i class="fas fa-arrow-left"></i>
        Voltar
    </a>

    <!-- PRIMEIRA TABELA -->
    <div class="container" id="tabela-paises">
        <div class="header">
            <h1><i class="fa-solid fa-earth-americas"></i> Gerenciamento - Países</h1>
            <a href="cadastro_pais.html"><button class="new-btn"><i class="fas fa-plus"></i> Novo Cadastro</button></a>
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
                <tr>
                    <td>1</td>
                    <td>Brasil</td>
                    <td>55</td>
                    <td>América do Sul</td>
                    <td>214.000.000</td>
                    <td>Português</td>
                    <td><i class="fas fa-edit edit" title="Editar"></i><i class="fas fa-trash delete" title="Excluir"></i></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Japão</td>
                    <td>81</td>
                    <td>Ásia</td>
                    <td>125.000.000</td>
                    <td>Japonês</td>
                    <td><i class="fas fa-edit edit" title="Editar"></i><i class="fas fa-trash delete" title="Excluir"></i></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Alemanha</td>
                    <td>49</td>
                    <td>Europa</td>
                    <td>83.000.000</td>
                    <td>Alemão</td>
                    <td><i class="fas fa-edit edit" title="Editar"></i><i class="fas fa-trash delete" title="Excluir"></i></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>África do Sul</td>
                    <td>27</td>
                    <td>África</td>
                    <td>60.000.000</td>
                    <td>Inglês / Zulu</td>
                    <td><i class="fas fa-edit edit" title="Editar"></i><i class="fas fa-trash delete" title="Excluir"></i></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- SEGUNDA TABELA -->
    <div class="container" id="tabela-cidades">
        <div class="header">
            <h1><i class="fas fa-city"></i> Gerenciamento - Cidades</h1>
            <a href="cadastro_cidade.html"><button class="new-btn"><i class="fas fa-plus"></i> Novo Cadastro</button></a>
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
                <tr>
                    <td>1</td>
                    <td>São Paulo</td>
                    <td>Brasil</td>
                    <td>12.300.000</td>
                    <td><i class="fas fa-edit edit" title="Editar"></i><i class="fas fa-trash delete" title="Excluir"></i></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tóquio</td>
                    <td>Japão</td>
                    <td>13.900.000</td>
                    <td><i class="fas fa-edit edit" title="Editar"></i><i class="fas fa-trash delete" title="Excluir"></i></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Berlim</td>
                    <td>Alemanha</td>
                    <td>3.700.000</td>
                    <td><i class="fas fa-edit edit" title="Editar"></i><i class="fas fa-trash delete" title="Excluir"></i></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Cidade do Cabo</td>
                    <td>África do Sul</td>
                    <td>4.600.000</td>
                    <td><i class="fas fa-edit edit" title="Editar"></i><i class="fas fa-trash delete" title="Excluir"></i></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>
