<?php 
    require 'header.php';
    ?>

<div class="container w-50 mt-3"> 
    <div>
        <ul class="nav shadow p-1 mb-3 rounded nav-tabs"  >
        <li><i class="fab fa-php fa-3x"></i></li>
            <?php //retrieves page titles from DB for site navigation
            $pages = $entityManager->getRepository('Page')->findAll();
            foreach($pages as $p) {
                echo '<li class="nav-item " >';
                echo '<a class="nav-link" style="color: black;" href="?page=' . $p->getId(). '">' . $p->getTitle() . '</a>';
                echo '</li>'; 
            } ?>
        </ul>    
    </div>            
    
    <div>
        <?php //home page
            if (!isset($_GET['page'])) {
                $page = $entityManager->find('Page', 1);

                echo '<h1>' . $page->getTitle() . '</h1>';
                echo '<div class="shadow p-3 mb-5 bg-white rounded ">' . $page->getContent() . '</div>';
                } 
        ?>
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

<footer class="container shadow p-3 mb-5 bg-white rounded w-50 text-center">

    <span >Copyright 2021. All rights reserved</span>

</footer>


</body>
</html>





