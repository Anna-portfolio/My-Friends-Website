<?php 

    //import database connection
    include('db_config/db_connect.php');

    //define variables and errors array
    $email = $password = $firstName = $lastName = $age = $city = $country = $phone = $avatar = $captcha = $terms = '' ;
    $errors = array('email' => '', 'password' => '', 'first-name' => '', 'last-name' => '', 'age' => '', 'city' => '', 'country' => '', 'phone' => '', 'avatar' => '', 'captcha' => '', 'terms' => '');

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

	if(empty($_POST['first-name'])){
		$errors['first-name'] = 'First name is required';
	} else {
		$firstName = $_POST['first-name'];
		if(!preg_match('/^[a-zA-Z]+$/', $firstName)){
			$errors['first-name\s'] = 'First name must be letters and spaces only';
		}
	}

	if(empty($_POST['last-name'])){
		$errors['last-name'] = 'Last name is required';
	} else {
		$lastName = $_POST['last-name'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $lastName)){
			$errors['last-name'] = 'Last name must be letters and spaces only';
		}
	}

	if(empty($_POST['age'])){
		   $errors['age'] = '';
	} else {
		$age = $_POST['age'];
		if(!is_numeric($age)){
			$errors['age'] = 'Must be numbers only (max length: 3)';
		}
            	if($age < 18){
			$errors['age'] = 'You must be at least 18 to register';
		}
	}

	if(empty($_POST['city'])){
		$errors['city'] = 'City is required';
	} else {
		$city = $_POST['city'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $city)){
			$errors['city'] = 'City must be letters and spaces only';
		}
	}

	if(empty($_POST['country'])){
		$errors['country'] = 'Country is required';
	} else {
		$country = $_POST['country'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $country)){
			$errors['country'] = 'Country must be letters and spaces only';
		}
	}

	if(empty($_POST['phone'])){
		   $errors['phone'] = '';
	} else {
		$phone = $_POST['phone'];
		if(!is_numeric($phone)){
			$errors['phone'] = 'Must be numbers only (max length: 10)';
		}
	}

        if(empty($_POST['captcha'])){
			$errors['captcha'] = 'This field is required';
		}  else {
		 	if($_POST['captcha'] == '1'){
		 	$errors['captcha'] = '';
		 	};
		}

        if(empty($_POST['terms'])){
			$errors['terms'] = 'This field is required';
		}  else {
		 	if($_POST['terms'] == '1'){
		 	$errors['terms'] = '';
		 	};
		}

		// //save the uploaded image to a variable
		$img = $_FILES['avatar']['name'];

		if(!$img){
		    $img = 'user-default.png';
		}
    
		if(!array_filter($errors)){
			
			// escape the SQL characters
            		$avatar = mysqli_real_escape_string($conn, 'images/users/' . $img);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$firstName = mysqli_real_escape_string($conn, $_POST['first-name']);
			$lastName = mysqli_real_escape_string($conn, $_POST['last-name']);
			$age = mysqli_real_escape_string($conn, $_POST['age']);
			$city = mysqli_real_escape_string($conn, $_POST['city']);
			$country = mysqli_real_escape_string($conn, $_POST['country']);
			$phone = mysqli_real_escape_string($conn, $_POST['phone']);

			// use a prepared statement to prevent SQL injection
			$sql = "INSERT INTO users(avatar, email, password, first_name, last_name, age, city, country, phone) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
			$stmt = mysqli_stmt_init($conn);
			
			if(!mysqli_stmt_prepare($stmt, $sql)){
				echo "SQL error";
			} else {
				mysqli_stmt_bind_param($stmt, "sssssssss", $avatar, $email, $password, $firstName, $lastName, $age, $city, $country, $phone);
				mysqli_stmt_execute($stmt);
				move_uploaded_file($_FILES['avatar']['tmp_name'], "images/users/$img");
				header('Location: register-success.php');
			}
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
<script src="js/captcha.js" defer></script>
<script src="js/burger-nav.js" defer></script>
<script src="https://kit.fontawesome.com/c94e259708.js" defer></script>
<link rel="stylesheet" href="style.css">
<title>Register | My Friends</title>
</head>
<body id="sign-in-body">
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
        <section class="register-container">
            <div class="register-container__header">
                <h1>Join My Friends<br>and meet new people today!</h1>
            </div>
            <div class="register-container__form">
                <h2>Create New Account</h2>
                <form action="register.php" method="POST" enctype="multipart/form-data">
                    <div class="register-container__form__grid">
                        <div class="register-container__form__grid__field">
                            <input type="email" name="email" autocomplete="off" placeholder="Email*" class="input-field" value="<?php echo htmlspecialchars($email) ?>">
                            <span class="register-container__form__grid__error"><?php echo $errors['email']; ?></span>
                        </div>
                        <div class="register-container__form__grid__field">
                            <input type="password" name="password" autocomplete="off" placeholder="Password*" class="input-field" value="<?php echo htmlspecialchars($password) ?>">
                            <span class="register-container__form__grid__error"><?php echo $errors['password']; ?></span>
                        </div> 
                        <div class="register-container__form__grid__field">     
                            <input type="text" name="first-name" autocomplete="off" placeholder="First name*" class="input-field" value="<?php echo htmlspecialchars($firstName) ?>">
                            <span class="register-container__form__grid__error"><?php echo $errors['first-name']; ?></span>
                        </div>
                        <div class="register-container__form__grid__field">
                            <input type="text" name="last-name" autocomplete="off" placeholder="Last name*" class="input-field" value="<?php echo htmlspecialchars($lastName) ?>">
                            <span class="register-container__form__grid__error"><?php echo $errors['last-name']; ?></span>
                        </div>
                        <div class="register-container__form__grid__field">
                            <input type="text" name="age" autocomplete="off" placeholder="Age (optional)" class="input-field" value="<?php echo htmlspecialchars($age) ?>">
                            <span class="register-container__form__grid__error"><?php echo $errors['age']; ?></span>
                        </div>
                        <div class="register-container__form__grid__field">
                            <input type="text" name="city" autocomplete="off" placeholder="City*" class="input-field" value="<?php echo htmlspecialchars($city) ?>">
                            <span class="register-container__form__grid__error"><?php echo $errors['city']; ?></span>
                        </div>
                        <div class="register-container__form__grid__field">
                            <input type="text" name="country" autocomplete="off" placeholder="Country*" class="input-field" value="<?php echo htmlspecialchars($country) ?>">
                            <span class="register-container__form__grid__error"><?php echo $errors['country']; ?></span>
                        </div>
                        <div class="register-container__form__grid__field">
                            <input type="text" name="phone" autocomplete="off" placeholder="Phone (optional)" class="input-field" value="<?php echo htmlspecialchars($phone) ?>">
                            <span class="register-container__form__grid__error"><?php echo $errors['phone']; ?></span>
                        </div>
                    </div>
                    <div class="register-container__form__add">
                        <label>Upload a picture from device (optional; only .jpeg, .png, and .gif):</label><br>
                        <input type="file" name="avatar" accept="image/jpeg, image/png, image/gif" value="<?php echo htmlspecialchars($avatar) ?>">
                        <div class="captcha-box"> 
                            <input type="checkbox" name="captcha" value="1" id="captcha-btn">
                            Prove that you are not a robot*
                            <span class="register-container__form__grid__error" id="captcha-error"><?php echo $errors['captcha']; ?></span>
                        </div>
                        <div> 
                            <input type="checkbox" name="terms" value="1">
                            I agree to the <a href="#!" id="terms">Terms & Conditions</a> *.
                            <span class="register-container__form__grid__error"><?php echo $errors['terms']; ?></span>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Register" class="input-btn">
                    <div id="captcha-container">
                        <h3>Choose the image that is<br>the correct way up:</h3>
                        <div id="captcha-pic-container">
                            <div class="captcha-pic" id="pic-1"></div>
                            <div class="captcha-pic" id="pic-2"></div>
                            <div class="captcha-pic" id="pic-3"></div>
                            <div class="captcha-pic" id="pic-4"></div>
                            <div class="captcha-pic" id="pic-5"></div>
                            <div class="captcha-pic" id="pic-6"></div>
                        </div>  
                    </div>
                </form>
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
