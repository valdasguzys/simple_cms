<?php
include_once "bootstrap.php";


$request = $_SERVER['REQUEST_URI'];
$root_url = '/simple_cms/';
//$request turi sutapti su case'u
switch ($request) {

    case $root_url . '/' :
        require __DIR__ . '/src/views/content.php';
        break;
    case $root_url . '' :
        require __DIR__ . '/src/views/content.php';
        break;
    case $root_url . 'content' :
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
    case $root_url . 'admin' :
        require __DIR__ . '/src/views/admin.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/src/views/404.php';
        break;
}
?>

<a href="admin">admin</a>
<a href="content">content</a>
