<?php
/*
* PARA MI AMIGO SR. KIMBLE DE TU GRAN AMIGO SR. IGLESIAS 
*/

// NOME DA PASTA ONDE IRÁ GRAVAR AS SESSIONS
$sess_path = "session";

// VERIFICANDO SE EXISTE A PASTA DA SESSION
if(!is_dir($sess_path)){
    mkdir ("session", 0755);
}

// SETANDO DA PASTA NO PHP
session_save_path($sess_path);

session_start();

// AQUI NESTE TESTE EU CRIO UMA SESSION EMAIL
$_SESSION['email']='teste2@teste.com';

// ABRINDO A PASTA DAS SESSIONS
$dir = opendir($sess_path);
if ($dir) {
    while (($item = readdir($dir)) !== false) {
        // IGNORANDO OS PONTOS NA LISTAGEM DA PASTA
        if ($item == '.' || $item == '..') {
            continue;
        }
        // DEFININDO O PADRÃO DOS ARQUIVOS A SEREM LIDOS NO CASO OS ARQUIVOS DE SESSIONS INICIAM COM sess_
        $pos =  strpos($item,'sess_');
        if(!$pos === true){
            // ABRINDO O ARQUIVO
            @$sess = file_get_contents("{$sess_path}/{$item}");
            // DECODIFICANDO O ARQUIVO
            session_decode($sess);
            // EXIBINDO O NOME DO ARQUIVO($item) E QUAL VALOR DA SESSION QUERO RETORNAR ($_SESSION['email'])
            echo "{$item} <br> ".$_SESSION['email']."<br><br>";
        }
    }
    closedir($dir);
}
?>
