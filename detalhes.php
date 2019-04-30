<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="_css/estilo.css"/>
    <meta charset="UTF-8"/>
    <title>Coperativo</title>
</head>
<body>
<div id="interface">
    <!--Cabeçalho da página.-->
    <?php include_once 'includes/cabecalho.php';?>
    <!--Noticias-->
    <section id="corpo">
        <article id="noticias">
            <?php
            $d = $_GET['d'] ?? 1;
            $q = "select a.titulo, a.datapub, a.conteudo, a.liberado, u.nome from artigo a "
               . "join usuario u where u.id = a.idusuario and a.id = $d";
            $busca = $banco->query($q);
            if(!$busca){
                echo "<p>Infelizmente não foram encontrados registros na base de dados!.</p>";
            }else{
                if($busca->num_rows==0){
                    echo "<p>Nenhum registro encontrado!</p>";
                }else{
                    $reg=$busca->fetch_object();
                    echo "<header id='cabnoticias'>";
                    echo "<h1>$reg->titulo<h1>";
                    echo "<h3>$reg->datapub ~ $reg->nome</h3>";
                    echo $reg->conteudo;
                }
            }
            ?>
        </article>
    </section>
    <!--Área reservada para publicidade e rodape-->
    <?php include_once 'includes/publicidade.php';
          include_once 'includes/rodape.php';  
    ?>
</div>
</body>
</html>