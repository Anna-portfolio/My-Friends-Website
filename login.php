<?php

    //import database connection
    include('db_config/db_connect.php');

    //define variables and errors array
    $email = $password = $global = '';
    $errors = array('email' => '', 'password' => '', 'global' => '');

    //configure the form
    if(isset($_POST['submit'])){
          
        if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be valid';
            }
		}

        if((empty($_POST['password'])) or (strlen($_POST['password']) < 8)){
			$errors['password'] = 'Password must be at least 8 characters long';
		} else {
			$password = $_POST['password'];
			if(!preg_match('/^[a-zA-Z0-9!?@#$]+$/', $password)){
				$errors['password'] = 'Only letters, numbers and special chars: !?@#$';
			}
		}

        //a SQL query to check whether both email and password are valid
        $sql = mysqli_query($conn, "SELECT email, password FROM users WHERE email = '$email' AND password = '$password'");


        //condition to check if the SQL query returns any value
        if(mysqli_num_rows($sql) != 0){
            header('Location: login-success.php');
        } else {
            $errors['global'] = "Email or password are incorrect";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description"
    content="My Friends | Find new friends on My Friends! Meet people with the same areas of interest as yours! Over 1.000.000 satisfied users, more than 250.000 online meetings in total">
<meta name="keywords" content="My, Friends, community, user, profiles, SASS">
<meta name="author" content="@Anna-portfolio">
<link rel="icon" href="images/logo/my-friends-icon.png" sizes="16x16">
<script src="js/burger-nav.js" defer></script>
<script src="https://kit.fontawesome.com/c94e259708.js" defer></script>
<link rel="stylesheet" href="style.css">
<title>Sign In | My Friends</title>
</head>
<body>
    <header>
        <nav id="nav-main">
            <a href="index.html">
                <img src="images/logo/my-friends-logo.png">
            </a>
            <ul id="nav-list">
                <li class="nav-list__item">
                    <a href="index.html" class="nav-list__link active">
                        Home
                    </a>
                </li>
                <li class="nav-list__item">
                    <a href="why-us.html" class="nav-list__link">
                        Why Us?
                    </a>
                </li>
                <li class="nav-list__item">
                    <a href="browse-friends.php" class="nav-list__link">
                        Browse Friends
                    </a>
                </li>
                <li class="nav-list__item">
                    <a href="faq.html" class="nav-list__link">
                        FAQ
                    </a>
                </li>
                <li class="nav-list__item">
                    <a href="login.php" class="nav-list__user">
                        Sign In
                    </a>
                </li>
            </ul>
            <div id="burger" onclick="burgerMenu()">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </header>
    <main>
        <section class="sign-in-container">
            <div class="sign-in-container__header">
                <h1>Join My Friends<br>and meet new people today!</h1>
            </div>
            <div class="sign-in-container__form">
                <h2>Sign In</h2>
                <form action="login.php" method="POST">
                    <div class="register-container__form__grid__field">
                        <input type="text" name="email" autocomplete="off" placeholder="Email" class="input-field" value="<?php echo htmlspecialchars($email) ?>">
                        <span class="register-container__form__grid__error"><?php echo $errors['email']; ?></span>
                    </div>
                    <div class="register-container__form__grid__field">
                        <input type="password" name="password" autocomplete="off" placeholder="Password" class="input-field" value="<?php echo htmlspecialchars($password) ?>">
                        <span class="register-container__form__grid__error"><?php echo $errors['password']; ?></span>
                        <span class="register-container__form__grid__error"><?php echo $errors['global']; ?></span>
                    </div> 
                    <input type="submit" name="submit" value="Sign In" class="input-btn">
                </form>
            </div>
            <div class="sign-in-container__register-link">
                <h2> Not a user?<a href="register.php"> Create an account</a></h2>
            </div>
        </section>
        <div class="footer-container" title="Links intentionally left inactive">
                <div>
                    <p><strong>About Us</strong><br>
                    <ul>
                        <li><a href="#!">Item 1</a></li>
                        <li><a href="#!">Item 2</a></li>
                        <li><a href="#!">Item 3</a></li>
                        <li><a href="#!">Item 4</a></li>
                    </ul><br>
                    <p>Email: <a href="mailto:myfriends@lorem.com?subject=Contact_request"
                            class="mail">myfriends@lorem.com</a><br>M: +12 345 678 910</p>
                </div>
                <div>
                    <p><strong>My Friends Map</strong><br>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="why-us.html">Why Us</a></li>
                        <li><a href="browse-friends.php">Browse Friends</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="login.php">Sign In</a></li>
                    </ul>
                </div>
                <div>
                    <p><strong> &#169 My Friends Service 2004 &#8212 2021 </strong></p>
                    <ul>
                        <li><a href="#!">About us</a></li>
                        <li><a href="#!">Terms of Use</a></li>
                        <li><a href="#!">Privacy Notice</a></li>
                        <li><a href="#!">Cookies Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="social-icons">
                <a href="#!" title="Icon intentionally left inactive">
                    <i class="fab fa-twitter fa-2x"></i>
                </a>
                <a href="#!" title="Icon intentionally left inactive">
                    <i class="fab fa-facebook fa-2x"></i>
                </a>
                <a href="#!" title="Icon intentionally left inactive">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
                <a href="#!" title="Icon intentionally left inactive">
                    <i class="fab fa-youtube fa-2x"></i>
                </a>
            </div>
    </main>
</body>
</html>