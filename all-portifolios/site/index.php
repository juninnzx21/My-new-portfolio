<?php 
// verifica host
include 'functions/host.php';

$url = (isset($_GET['url'])) ? $_GET['url']:'inicial';
$url = array_filter(explode('/',$url));

#SE QUEM TIVER ACESSANDO FOR CLIENTE
$file = 'pages/'.$url[0].'.php';

if (file_exists($file)) {
    //mostrar em todas as paginas
    include 'includes/head.php';
    include 'includes/header.php';
    
    include $file;
    
    include 'includes/footer.php';
}
else{
    
    require_once './pages/404.php';
}