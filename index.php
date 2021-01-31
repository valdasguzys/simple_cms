<?php
include_once "bootstrap.php";

function getPath($request){
    $path = explode('/', $request);
    return $path[count($path) - 1];
}


$request = $_SERVER['REQUEST_URI'];

$root_url = getPath($request);

//$request turi sutapti su case'u
switch ($request) {

    case $root_url == '/' :
        require __DIR__ . '/src/views/content.php';
        break;
    case $root_url == '' :
        require __DIR__ . '/src/views/content.php';
        break;
    case $root_url == 'content' :
        require __DIR__ . '/src/views/content.php';
        break;
    case isset($_GET['page']) and $_GET['page'] != "":
        require  __DIR__ . '/src/views/content.php';
        break;
    case isset($_POST['save']):
        require  __DIR__ . '/src/views/admin.php';
        break;
    case isset($_GET['delete']):
        require  __DIR__ . '/src/views/admin.php';
        break;
    case isset($_POST['newpage']):
        require __DIR__ . '/src/views/admin.php';
        break;
    case isset($_GET['update']):
        require __DIR__ . '/src/views/admin.php';
        break;
    case $_SESSION['logged_in'] == true:
        require __DIR__ . '/src/views/admin.php';
        break;
    case isset($_GET['action']):
        require __DIR__ . '/src/views/login.php';
        break;
    case $root_url == 'admin' :
        require __DIR__ . '/src/views/login.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/src/views/404.php';
        break;
}
?>
