<?php

echo 'admin';

// Helper functions
function redirect_to_root(){
    header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}

// Delete product
if(isset($_GET['delete'])){
    $user = $entityManager->find('Models\Product', $_GET['delete']);
    $entityManager->remove($user);
    $entityManager->flush();
    redirect_to_root();
}

// Update
if(isset($_POST['update_name'])){
    $user = $entityManager->find('Models\Product', $_POST['update_id']);
    $user->setName($_POST['update_name']);
    $entityManager->flush();
    redirect_to_root();
}