<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles.css" rel="stylesheet">
    <title>Login System</title>
</head>
<body>

    <?php 
    
        if(isset($_GET['error'])) {
            echo '<h3 style="color: red;">Error: ' .$_GET['error'] .'</h3>';
        }

    ?>
    
    <section id="login-signup-area">

        <div id="login-signup">

            <?php
            
                if(isset($_SESSION['useruid'])) {
                    echo '<h1>Hello, ' .$_SESSION['useruid'] .'</h1>' 
                        .'<form action="./includes/logout.inc.php"><input type="submit" id="logout" class="red-btn top-btn" value="log out"></form>';
                }
                elseif(isset($_GET['msg'])) {
                    echo '<h1>Successfully signed up!</h1>';
                }
                else {

            ?>

            <h1>Welcome</h1>
            <div id="login-blck" class="invisible blck">
                <p class="info">Already have an account?</p>
                <button class="toggle-btn blue-btn top-btn">Sign in</button>
            </div>

            <div id="signup-blck" class="blck">
                <p class="info">Don't have an account yet?</p>
                <button class="toggle-btn blue-btn top-btn">Sign up</button>
            </div>

            <?php
            
                }
            
            ?>
        </div>

        <div id="signup" class="invisible">
            <h2 class="formtext">Signup</h2>
            <form id="signup-form" action="./includes/signup.inc.php" class="form" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-input" placeholder="eg. John Doe">
                <label for="uid">Username</label>
                <input type="text" id="uid" name="uid" class="form-input" placeholder="eg. johndoe453">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="eg. johndoe@example.com">
                <label for="pword">Password</label>
                <input type="password" id="pword" name="pword" class="form-input">
                <label for="conf-pword">Confirm Password</label>
                <input type="password" class="form-input" name="conf-pword"0 id="conf-pword">
                <input type="submit" class="form-input btn" value="SIGN UP" name="submit">
            </form>
        </div>

        <div id="login">

            <h2 class="formtext">Login</h2>
            <form id="login-form" action="./includes/login.inc.php" class="form" method="post">
                <label for="email">Username or Email</label>
                <input type="text" name="email-uid" class="form-input" id="email-uid">
                <label for="pword">Password</label>
                <input type="password" id="pword" name="pword" class="form-input">
                <input type="submit" class="form-input btn" value="LOG IN" name="submit">
            </form>
        </div>

    </section>

    <script src="script.js"></script>

</body>
</html>