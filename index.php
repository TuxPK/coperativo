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
    <?php include_once 'includes/cabecalho.php'; ?>
    <!--Noticias e artigos.-->
    <section id="corpo">
        <article id="noticias">
            <?php
            $q = "select id, titulo, datapub, conteudo from artigo order by datapub desc";
            $busca = $banco->query($q);
            if(!$busca){
                echo "<p>Infelizmente não foram encontrados registros na base de dados!.</p>";
            }else{
                if($busca->num_rows==0){
                    echo "<p>Nenhum registro encontrado!</p>";
            }else{
                while($reg=$busca->fetch_object()){
                    echo "<header id='cabnoticias'>";
                    echo "<h1><a href='detalhes.php?d=$reg->id'>$reg->titulo</a></h1>";
                    echo "<h3>$reg->datapub</h3></header>";
                    //Codigo responsavel pela limitacao do texto(mb_strmwidth) e exclusao das tags HTML(strip_tags)
                    echo "<p>".mb_strimwidth(strip_tags($reg->conteudo), 0, 400, "...")."</p>";
                }
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