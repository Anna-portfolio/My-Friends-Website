 <?php
    include('db_config/db_connect.php');

    //select all from the users table
    $sql = "SELECT * FROM users";

    //get the results and put them in an array
    $result = mysqli_query($conn, $sql);
	$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //close connection
    $conn->close();
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
<title>Browse Friends | My Friends</title>
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
        <section class="browse-container">
            <div class="browse-container__header">
                <h1> Browse My Friends now!</h1>
                <h3>(PS <a href="register.php">Register</a> to see your profile :))</h3>
            </div>
            <div class="browse-container__section">
                <?php foreach($users as $user){ ?>
                <div class="browse-container__section__user">
                    <div class="browse-container__section__user__user-data">
                        <img src="<?php echo $user['avatar']; ?>">
                        <h3><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ;?></h2>
                        <h5>Age: <?php echo htmlspecialchars($user['age']) ;?></h5>
                        <h5>From: <?php echo htmlspecialchars($user['city'] . ', ' . $user['country']) ;?></h5>
                    </div>
                </div>
                <?php } ?>
                <a href="login.php" class="register"><div class="browse-container__section__user__invite">
                    <h5>&lt;place for your account&gt;</h5><br>
                    <h3>Join My Friends<br>to see more!</h3>
                </div></a>
            </div>
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
        </section>
    </main>
</body>
</html>