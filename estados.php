<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBank 1.0</title>
    <link rel="icon" href="assets/logo.svg">
    <link rel="stylesheet" type="text/css" href="styles/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header class="cabecalho">
        <section class="cabecalho-logo">
            <img class="cabecalho-logo-imagem" src="./assets/logo.svg">
            <h1 class="cabecalho-logo-texto">MyBank 1.0</h1>
        </section>
        <section class="cabecalho-menu">
            <nav class="cabecalho-menu-navegacao">
                <a class="cabecalho-menu-navegacao-item" href="index.php">Principal</a>
                <a class="cabecalho-menu-navegacao-item" href="estados.php">Estados</a>
                <a class="cabecalho-menu-navegacao-item" href="cidades.php">Cidades</a>
                <a class="cabecalho-menu-navegacao-item" href="clientes.php">Clientes</a>
                <a class="cabecalho-menu-navegacao-item" href="agencias.php">Agências</a>
                <a class="cabecalho-menu-navegacao-item" href="tiposdecontas.php">Tipos de<br> Contas</a>
                <a class="cabecalho-menu-navegacao-item" href="contascorrentes.php">Contas<br>Correntes</a>
                <a class="cabecalho-menu-navegacao-item" href="tiposdemoviments.php">Tipos de<br>Movimentos</a>
                <a class="cabecalho-menu-navegacao-item" href="contascorrentes.php">Depósitos</a>
                <a class="cabecalho-menu-navegacao-item" href="contascorrentes.php">Saques</a>
            </nav>
        </section>
    </header>
    <main class="conteudo-dados">
        <section class="conteudo-dados-titulo">
            <h1 class="conteudo-dados-titulo-texto">
                Estados
            </h1>
        </section>
        <section class="conteudo-dados-novo">
            <a href="estado.php" class="conteudo-dados-acao">
                <button class="conteudo-dados-acao-novo">
                    Novo
                </button>
            </a>
        </section>

        <section class="conteudo-dados-tabela">
            <table>
                <thead>
                    <tr class="tr-cabecalho">
                        <th>#</th>
                        <th>Sigla</th>
                        <th>Nome</th>
                        <th>Cidades</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("classeestado.php");
                    $estado = new Estado();
                    $estados = $estado->listar();
                    foreach ($estados as $registro) {

                    ?>
                        <tr class="tr-registro">
                            <td><?php echo $registro["IDESTADO"]; ?></td>
                            <td><?php echo $registro["SIGLA"]; ?></td>
                            <td><?php echo $registro["NOME"]; ?></td>
                            <td><?php echo $registro["CIDADES"]; ?></td>
                            <td>
                                <a href="estado.php?idestado=<?php echo $registro["IDESTADO"]; ?>" class="conteudo-dados-acao">
                                    <button class="conteudo-dados-acao-alterar">
                                        Alterar
                                    </button>
                                </a>
                            </td>
                            <td>
                                <?php
                                if ($registro["CIDADES"] == 0){
                                    ?>
                                    <button onclick="excluir(<?php echo $registro['IDESTADO']; ?>)" class="conteudo-dados-acao-excluir">
                                        Excluir
                                    </button>
                                </a>
                                <?php
                                }
                                ?>

                            
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </section>


        <section class="conteudo-dados-novo">
            <a href="estado.php" class="conteudo-dados-acao">
                <button class="conteudo-dados-acao-novo">
                    Novo
                </button>
            </a>
        </section>

    </main>

    <footer class="rodape">
        <section class="rodape-autor">
            <p class="rodape-autor-nome">
                Pedro Henrique David - Direitos Reservados &reg;
            </p>
        </section>
        <section class="rodape-contato">
            <a href="#" class="rodape-contato-link">
                <i class="fa-brands fa-youtube rodape-contato-link-icone"></i>
                <spam class="rodape-contato-icone-legenda">Youtube</spam>
            </a>
            <a href="#" class="rodape-contato-link">
                <i class="fa-brands fa-facebook rodape-contato-link-icone"></i>
                <spam class="rodape-contato-icone-legenda">Facebook</spam>
            </a>
            <a href="#" class="rodape-contato-link">
                <i class="fa-brands fa-square-instagram rodape-contato-link-icone"></i>
                <spam class="rodape-contato-icone-legenda">Instagram</spam>
            </a>
            <a href="#" class="rodape-contato-link">
                <i class="fa-brands fa-linkedin rodape-contato-link-icone"></i>
                <spam class="rodape-contato-icone-legenda">Linkedin</spam>
            </a>
            <a href="#" class="rodape-contato-link">
                <i class="fa-brands fa-square-whatsapp rodape-contato-link-icone"></i>
                <spam class="rodape-contato-icone-legenda">Whatsapp</spam>
            </a>
        </section>
    </footer>

    <div class="chat-whatsapp">
        <a href="https://wa.me/SEUNUMERO" target="_blank">
            <i class="fa-brands fa-whatsapp chat-whatsapp-icone"></i>
        </a>
        <spam class="chat-whatspp-legenda">Fale Conosco</spam>
    </div>
</body>

</html>

<script>
    function excluir(id){
        if (confirm("Você realmente deseja excluir o estado?")){
            if (confirm("Realmente deseja excluir? Não é possível reverter a operação.")){
                let linkExcluir = "excluirestado.php?idestado="+id;
                window.location.href=linkExcluir;
            }
        } else{
            
        }
    }
</script>