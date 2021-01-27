<?php


?>

    <div>
        <ul>
        <?php //retrieves page titles from DB for site navigation
        $pages = $entityManager->getRepository('Page')->findAll();
        foreach($pages as $p) {
            echo '<li><a href="' . $_SERVER['REQUEST_URI'] . '/?page=' . $p->getId(). '">' . $p->getTitle() . '</a></li>'; 
        } ?>
        </ul>    
    </div>            
    
    
    <?php 
    echo 'veikia';
    if (isset($_GET['page'])) {
    
    // $page = $entityManager->find('Page', $_GET['page']);
    // echo $page->getTitle();
    
    }
    
?>








