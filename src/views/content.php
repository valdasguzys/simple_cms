<?php


?>

    <div>
        <ul>
        <?php //retrieves page titles from DB for site navigation
        $pages = $entityManager->getRepository('Page')->findAll();
        foreach($pages as $p) {
            echo '<li><a href="?page=' . $p->getId(). '">' . $p->getTitle() . '</a></li>'; 
        } ?>
        </ul>    
    </div>            
    
    <div>
        <?php //retrieves content by page id
            if (isset($_GET['page'])) {

            $page = $entityManager->find('Page', $_GET['page']);
            $page != NULL ? 
            print '<br>' . $page->getTitle() . '<br>' . $page->getContent() . ' ' : '';
            } 
        ?>
    </div>







