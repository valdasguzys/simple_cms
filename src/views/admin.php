<?php

require 'header.php';

session_start();
// reloads the current page
function redirect_to_root(){
    header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}

// New page
if(isset($_POST['save'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $page = new Page($title, $content);
    $entityManager->persist($page);
    $entityManager->flush();
    redirect_to_root();
}

// Delete product
if(isset($_GET['delete'])){
    $page = $entityManager->find('Page', $_GET['delete']);
    $entityManager->remove($page);
    $entityManager->flush();
    redirect_to_root();
}

// Update
if(isset($_POST['save_update'])){
    $page = $entityManager->find('Page', $_POST['id']);
    $page->setTitle($_POST['update_title']);
    $page->setContent($_POST['update_content']);
    $entityManager->flush();
    redirect_to_root();
}
?>

<?php /////////////// if logded in -> show content ?>

<?php //nav bar ?>
<div class="container w-50 mt-3">
    <ul class="nav shadow p-1 mb-3 rounded nav-tabs" >
        <li><i class="fas fa-users-cog fa-3x"></i></li>
        <li class="nav-item"><a class="nav-link" style="color: black" href ="admin">admin</a></li>
        <li class="nav-item"><a class="nav-link" style="color: black" href ="content" target="_blank">website</a></li>
        <li class="nav-item"><a class="nav-link" style="color: black" href ="admin.php?action=logout">logout</a></li>
    </ul>


    <?php //display this form if 'new page' was pressed
        if(isset($_POST['newpage'])) { ?>
        <form action="" method="POST">
            <div><label class="form-label">Add new Page</label></div>
            <div><input class="form-control shadow mb-2 bg-white rounded " type="text" name="title" placeholder="Enter project title" value="" required></div>
            <div><textarea class="form-control shadow bg-white rounded " rows="10" cols="30" name="content" placeholder="Add some content" value="" required></textarea></div>
            <button class="btn btn-outline-primary mt-3" type="submit" name="save">Save</button>            
        </form>

        
    <?php } else { ?>


    <?php //display this form if 'update' button was pressed
     if(isset($_GET['update'])) { 
        $page = $entityManager->find('Page', $_GET['update']); 
         ?>
    
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $page->getId() ?>">
            <div><label class="form-label">Update Page</label></div>
            <div><input class="form-control shadow mb-2 bg-white rounded " type="text" name="update_title" placeholder="Enter project title" required value="<?php echo $page->getTitle() ?>"></div>
            <div><textarea class="form-control shadow bg-white rounded " rows="10" cols="30" name="update_content" placeholder="Add some content" required><?php echo $page->getContent()  ?></textarea></div>
            <button class="btn btn-outline-primary mt-3" type="submit" name="save_update">Update</button>            
        </form>

        
    <?php } else //if none of the buttons pressed -> display contents
                {?>

    <div class="shadow p-3 bg-white rounded ">
        <table class="w-100">
            <tr>
                <th class="border-bottom">Page title</th>
                <th class="border-bottom">Action</th>
            </tr>
            <?php //retrieves page titles from DB for site navigation
            $pages = $entityManager->getRepository('Page')->findAll();
            foreach($pages as $p) {
                    echo '<tr>';               
                    echo '<td class="border-bottom">' . $p->getTitle(). '</td>'; 
                    echo '<td><a href="?delete=' . $p->getId() . '"><button class="btn btn-outline-danger m-1">DELETE</button></a>';
                    echo '<a href="?update=' . $p->getId() . '"><button class="btn btn-outline-success m-1">UPDATE</button></a></td>';    
                    echo '</tr>';             
        } ?>

        </table>
    </div>
        
        <form action="" method="POST">       
            <button class="btn btn-outline-primary mt-3" type="submit" name="newpage">New Page</button>         
        </form>
        <?php 
        } 
    }    
?>

</div>
     

<footer class="container shadow p-3 mb-5 bg-white rounded w-50">
    <span>Copyright 2021. All rights reserved</span>
</footer>


</body>
</html>



 
