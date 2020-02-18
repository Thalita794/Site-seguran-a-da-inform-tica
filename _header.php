<?php

// Tratamento do título da página
if ($titulo == "") {
    $titulo = "Segurança na área informática- Informática.";
} else {
    $titulo = "{$titulo} - Segurança na área informática";
}

// Tratamento do CSS da página
if ($css != "") {
    $css = "<link rel=\"stylesheet\" href=\"{$css}\">\n";
} else {
    $css = null;
}

// Tratamento do JavaScript da página --> _footer.php
if ($js != "") {
    $js = "<script src=\"{$js}\"></script>\n";
} else {
    $js = null;
}

?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo ?></title>
    <link rel="shortcut icon" href="/img/social.jpg">
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <?php echo $css ?>
</head>
<body>
<a id="topo"></a>

<div class="wrap">

    <header class="header">
        <a href="/" title="Segurança da informática - Informática"><img src="img/social.jpg" alt="Segurança da informática"></a>
        <h1>Segurança na área informática<small>Informática.</small></h1>
    </header>

    <nav class="nav">
        <a href="/"><i class="fas fa-fw fa-home"></i></a>
        <div id="menulinks">
            <a <?php echo ( $menu == 'artigos' ) ? 'class="active"' : null ?> href="/artigos.php"><i class="fas fa-fw fa-pen-nib"></i> Artigos</a>
            <a <?php echo ( $menu == 'noticias' ) ? 'class="active"' : null ?> href="/noticias.php"><i class="fas fa-fw fa-newspaper"></i> Notícias</a>
            <a <?php echo ( $menu == 'contatos' ) ? 'class="active"' : null ?> href="/contatos.php"><i class="fas fa-fw fa-mail-bulk"></i> Contatos</a>
            <a <?php echo ( $menu == 'sobre' ) ? 'class="active"' : null ?> href="/sobre.php"><i class="fas fa-fw fa-info-circle"></i> Sobre</a>
            <a <?php echo ( $menu == 'procurar' ) ? 'class="active"' : null ?> href="/procurar.php" id="procurar" title="Procurar no site"><i class="fas fa-fw fa-search"></i><span> Procurar</span></a>
        </div>
        <a href="#menu" id="menu"><i class="fas fa-fw fa-bars"></i></a>
    </nav>

    <main class="main">
<!-- CONTEÚDO DA PÁGINA -->
        
        
