<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User registration form</title>

</head>
<body>
    <h2>Sign Up</h2>
<form action="register.php" method="post">
    Username: <label>
        <input type="text" name="username" id="username" placeholder="Enter your username" required>
    </label> <br>

    Email: <label>
        <input type="email" name="email" id="email" placeholder="Enter your email address" required>
    </label> <br>

    Password: <label>
        <input type="password" name="password" id="password" placeholder="Enter your password"  required>
    </label> <br>

    Password confirmation: <label>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password" required>
    </label> <br>

    Agreement(Terms and Conditions): 
    <label>
        <input type="checkbox" name="agree_terms" id="agree_terms" required>
        I agree to the terms and conditions
    </label> <br>

    <button type="submit">Register</button>
    </form>
<?php 
$errors = [];
if ($_SERVER ['REQUEST_METHOD'] == 'POST'){
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password =  $_REQUEST['password'];
    $confirm_password = $_REQUEST['confirm_password'];

    if(empty($username)){
        $errors[] = "Enter a valid username.";
    }

    if(empty($email)){
        $errors[] = "Enter a valid email.";
    }

    if(empty($password !== $confirm_password)){
        $errors[] = "Passwords do not match.";
    }
}

if(!empty($errors)){
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
}

?>

</body>
<script>
function validateForm(){
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirm_password').value;

    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return false;
    };
    return true;
};

</script>
    
</html>

<!-- Write better exceptions and error catch messages -->




