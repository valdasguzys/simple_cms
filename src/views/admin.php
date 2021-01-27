<?php
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
if(isset($_POST['update'])){
    $page = $entityManager->find('Page', $_POST['update']);
    $page->setTitle($_POST['update_title']);
    $page->setContent($_POST['update_content']);
    $entityManager->flush();
    redirect_to_root();
}
?>
<?php //if logded in show content
     ?>

    <ul>
    <li>admin</li>
    <li>website</li>
    <li><a href = "admin.php?action=logout">logout</a></li>
    </ul>


    <?php //display this form id 'new page' was pressed
        if(isset($_POST['newpage'])) { ?>
        <form action="" method="POST">
            <div><label>Add new Page</label></div>
            <div><input type="text" name="title" placeholder="Enter project title" value=""></div>
            <div><textarea rows="10" cols="30" name="content" placeholder="Add some content" value=""></textarea></div>
            <button type="submit" name="save">Save</button>            
        </form>

        
    <?php } else { ?>


    <?php //display this form if 'update' button was pressed
     if(isset($_GET['update'])) { 
        $page = $entityManager->find('Page', $_GET['update']); 
        echo $page->getId() . $page->getTitle() ;
         ?>
    
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $page->getId() ?>">
            <div><label>Update Page</label></div>
            <div><input type="text" name="update_title" placeholder="Enter project title" value="<?php echo $page->getTitle() ?>"></div>
            <div><textarea rows="10" cols="30" name="update_content" placeholder="Add some content" value=""><?php echo $page->getContent()  ?></textarea></div>
            <button type="submit" name="update">Update</button>            
        </form>

        
    <?php } else //if none of the buttons pressed - display contents
                {?>

    <div>
        <table>
            <tr>
                <th>Page title</th>
                <th>Action</th>
            </tr>
            <?php //retrieves page titles from DB for site navigation
            $pages = $entityManager->getRepository('Page')->findAll();
            foreach($pages as $p) {
                echo '<tr>';            
                echo '<td>' . $p->getTitle(). '</td>'; 
                echo '<td><a href="?delete=' . $p->getId() . '">Delete</a> <a href="?update=' . $p->getId() . '">Update</a></td>';    
                echo '</tr>'; 
               
        } ?>

        </table>
        
        <form action="" method="POST">       
            <button type="submit" name="newpage">New Page</button>         
        </form>
        <?php 
        } 
    }    

?>

     





 
