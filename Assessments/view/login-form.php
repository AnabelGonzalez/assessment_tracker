<?php

ini_set('display_errors', 0);
//error_reporting(0);
//error_reporting(~0);
 
require ('../model/db_conn.php');

session_start();

if(isset($_POST['login'])){
    
    
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    //Finds user
    $sql = "SELECT user_ID, username, password FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    
    //Binds value
    $stmt->bindValue(':username', $username);
    
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //Sets a year from the login time
    $year = time() + 31536000;

    //Check if the remember checkbox was ticked
    if($_POST['remember']){

        //Store the username in a cookie
        setcookie('remember_me', $username, $year);
        setcookie('remember_pass', $passwordAttempt, $year);
        
        } //If the remember checkbox was not ticked, unsets the cookie
        elseif(!$_POST['remember']){
            if(isset($_COOKIE['remember_me'])){
            $past = time() - 100;
            setcookie('remember_me', '', $past);
            setcookie('remember_pass', '', $past);
        } 
    }
    
    if($user === false){
        //user not found
        die('User does not exists! <a href="../access.php">Go Back</a>');
        
    } else{
 
        $validPassword = password_verify($passwordAttempt, $user['password']);
        
        if($validPassword){
            
            $_SESSION['user_id'] = $user['user_ID'];
            $_SESSION['logged_in'] = time();
            
            header('Location:../index.php');
            exit;
            
        } else{
            die('Wrong password combination! <a href="../access.php">Go Back</a>');
        }
    }
    
} 


?> 



<form class="form-signin" id="signin" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    
    <?php

    $user_remember = $_COOKIE['remember_me'];
    $pass_remember = $_COOKIE['remember_pass'];

    ?>
    <p>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="form-control" value="<?php echo trim($user_remember);?>" required autofocus>
    </p>
    <p>
        <label for="inputPassword">Password</label>
        <input type="password" id="password" name="password" class="form-control" value="<?php echo trim($pass_remember);?>" required>
        
    </p>
    <div class="checkbox mb-3">
        <label>
        <input type="checkbox" value="remember" name="remember"> &nbsp;Remember me
        </label>
    </div>
    <input type="submit" name="login" class="btn btn-info btn-block" value="Sign In">
</form>
        