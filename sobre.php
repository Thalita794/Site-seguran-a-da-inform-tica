<?php

// Configuração inicial da página
require ('_config.php');

// Define o título "desta" página
$titulo = "Sobre";

// Opção ativa no menu principal
$menu = "sobre";

// Aponta para o CSS "desta" página. Ex.: /css/contatos.css
// Deixe vazio para não usar CSS adicional nesta página
$css = "/css/sobre.css";

// Aponta para o JavaScript "desta" página. Ex.: /js/contatos.js
// Deixe vazio para não usar JavaScript adicional nesta página
$js = "";

/*********************************************/
/*  SEUS CÓDIGOS PHP DESTA PÁGINA FICAM AQUI */
/*********************************************/

// "Declarando" variáveis
$nome = $email = $assunto = $mensagem = $erro = $msgErro = $msgOk = $msgMail = '';

// Se o formulário foi enviado
if ( isset($_POST['enviado']) ) :

    // Obtém o nome do form
    $nome = sanitiza( filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING) );

    // Obtém o e-mail do form
    $email = sanitiza( filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) );

    // Obtém o nome do form
    $assunto = sanitiza( filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING) );

    // Obtém o nome do form
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
    
    // Verificar o preenchimento do nome
    if (strlen($nome) < 2) {
        $erro .= "<li>Seu nome está muito curto.</li>";
    }

    // Verificar o preenchimento do e-mail
    // O sinal "!" inverte TRUE com FALSE
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $erro .= "<li>Seu e-mail parece inválido.</li>";
    }

    // Verificar o preenchimento do assunto
    if (strlen($assunto) < 4) {
        $erro .= "<li>O assunto está muito curto.</li>";
    }
    
    // Verificar o preenchimento da mensagem
    if (strlen($mensagem) < 4) {
        $erro .= "<li>A mensagem está muito curta.</li>";
    }

    // Validando erros
    if ($erro != '') :

        // Cria mensagem de erros. Usamos HEREDOC.
        $msgErro .= <<<TEXTO

<div class="msgErro">
    <h3>Ooooops!</h3>
    <p>Ocorreram erros que impedem o envio do seu contato:</p>
    <ul>{$erro}</ul>
    <p>Por favor corrija os erros e tente novamente.</p>
</div>
        
TEXTO;

    else :
        
        // Preparando para salvar os dados
        $sql = <<<SQL

INSERT INTO contatos
    (nome, email, assunto, mensagem)
VALUES
    ('{$nome}', '{$email}', '{$assunto}', '{$mensagem}')
;

SQL;

        // Executa a query gerada em $sql
        $conn->query($sql);

        // Prepara dados para envio por e-mail
        $msgMail .= <<<TEXTO

Um novo contato foi enviado para o site "SemNome":

    Nome: {$nome}
    E-mail: {$email}
    Assunto: {$assunto}
    Mensagem: {$mensagem}

TEXTO;

        // Enviando e-mail --> Não funciona no XAMPP
        // O "@" oculta mensagens de erro --> CUIDADO!
        // Dê preferência a bibliotecas de e-mail à função "mail()" do PHP
        // Por exemplo, pesquise por "PHPMailer" e outras similares
        @mail('admin@semnome.com', 'Novo contato com SemNome', $msgMail);

        // Obtendo partes do nome
        // O primeiro nome estará em $partes[0]
        $partes = explode(' ', $nome);

        // Gerando mensagem de agradecimento
        $msgOk .= <<<TEXTO

<div class="msgOk">
    <h3>Olá {$partes[0]}!</h3>
    <p>Seu contato foi enviado para a equipe do site.</p>
    <p>Se necessário, em breve responderemos.</p>
    <p><em>Obrigado...</em></p>
</div>

TEXTO;
     
    endif;

endif;

/************************************************/
/*  SEUS CÓDIGOS PHP DESTA PÁGINA TERMINAM AQUI */
/************************************************/

// Inclui o cabeçalho do template
require ('_header.php');

?>

<div class="row">
    <div class="col1">

        <h2>Sobre Nós</h2>

        <?php
        if ($msgOk == ''):
        ?>

<p>A SEGURANÇA NA ÁREA DE INFORMÁTICA é uma empresa especializada em sistemas eletrônicos de segurança.</p>
<p>Fundada no ano de 2011, chegou ao mercado para se tornar referência no setor, desenvolvendo e executando com excelência, desde pequenos a grandes projetos, 
tendo como principal objetivo a satisfação e a segurança de seus clientes.</p>

Nossa equipe técnica é altamente capacitada e possui grande experiência no atendimento a residências, 
pequenos e grandes condomínios, empresas e até mesmo indústrias.
<p>Trabalhamos com os melhores fabricantes do mercado e desenvolvemos com muita seriedade, 
soluções customizadas para todos os tipos de ambientes e necessidades.</p> 
<img src="img/segurança01.jpg" widht="600" height="400">      

            </p>
        </form>

        <?php
        else:
            echo $msgOk;
        endif;
        ?>

    </div>
    <div class="col2">

        
        <ul>
            

    </div>
</div>









<?php

// Inclui o rodapé do template
require ('_footer.php');

?>
