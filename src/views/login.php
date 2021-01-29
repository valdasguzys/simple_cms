<?php 
    require 'header.php';
    ?>



<?php
    // LOGIN LOGIC

    session_start();
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


<?php //LOGIN FORM
    if($_SESSION['logged_in'] == true) { 

    require_once 'admin.php';

        } else { ?>

        <div class="container">
            <form action="" method="POST">
                <label class="mt-3">Enter username and password</label>
                <input class="form-control shadow bg-white rounded w-25" type="text" name="username" placeholder="username = admin" required autofocus></br>
                <input class="form-control shadow bg-white rounded w-25" type="password" name="password" placeholder="password = admin" required></br>
                <button class="btn btn-outline-primary" type="submit" name="login">Login</button>
                <h4><?php echo $msg; ?></h4>
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