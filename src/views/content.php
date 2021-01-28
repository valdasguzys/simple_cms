<?php 
    require 'header.php';
    ?>

<div class="container"> 
    <div>
        <ul class="nav nav-item shadow p-1 mb-3 bg-white rounded">
        <?php //retrieves page titles from DB for site navigation
        $pages = $entityManager->getRepository('Page')->findAll();
        foreach($pages as $p) {
            echo '<li class="nav-item"><a class="nav-link" href="?page=' . $p->getId(). '">' . $p->getTitle() . '</a></li>'; 
        } ?>
        </ul>    
    </div>            
    
    <div>
        <?php //retrieves content by page id
            if (isset($_GET['page'])) {
            $page = $entityManager->find('Page', $_GET['page']);

            echo '<h1>' . $page->getTitle() . '</h1>';
            echo '<div class="shadow p-3 mb-5 bg-white rounded ">' . $page->getContent() . '</div>';
            } 
        ?>
    </div>
</div>

</body>
</html>





