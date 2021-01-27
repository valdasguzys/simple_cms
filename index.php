<?php
include_once "bootstrap.php";

$pages = $entityManager->getRepository('Page')->findAll();


$request = $_SERVER['REQUEST_URI'];
$root_url = '/simple_cms/';
//$request turi sutapti su case'u
switch ($request) {
    // case $rootUrl . '/content/?page=1' :
    //     require __DIR__ . '/src/views/content.php';
    //     break;
    case $root_url . '/' :
        require __DIR__ . '/src/views/index.php';
        break;
    case $root_url . '' :
        require __DIR__ . '/src/views/index.php';
        break;
    case $root_url . 'content' :
        require __DIR__ . '/src/views/content.php';
        break;
    case $root_url . 'admin' :
        require __DIR__ . '/src/views/admin_panel.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/src/views/404.php';
        break;
}
?>

<a href="admin">admin</a>
<a href="content">content</a>
<a href="/simple_cms/">home</a>