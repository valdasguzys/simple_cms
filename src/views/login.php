<!-- LOGIN LOGIC -->
<?php
    $msg = '';
    if (isset($_POST['login']) 
        && !empty($_POST['username']) 
        && !empty($_POST['password'])
    ) {	
        if ($_POST['username'] == 'admin' && 
            $_POST['password'] == 'admin'
            
        ) {
            $_SESSION['logged_in'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = 'admin';
        } else {
            $msg = 'Wrong username or password';
           
        }
    }
    


?>
<?php if($_SESSION['logged_in'] == true) {
    require_once 'admin.php';
} else { ?>
        <div>
            <form action="" method="POST">
                <h4><?php echo $msg; ?></h4>
                <input type="text" name="username" placeholder="username = admin" required autofocus></br>
                <input type="password" name="password" placeholder="password = admin" required></br>
                <button type="submit" name="login">Login</button>
            </form>
        </div>  
        <?php } ?>



<?php
    // LOGOUT LOGIC
    session_start();
    if(isset($_GET['action']) and $_GET['action'] == 'logout'){
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['logged_in']);
    }
    ?>