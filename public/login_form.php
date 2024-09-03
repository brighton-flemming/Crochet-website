<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        section
        {
            position: absolute;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            flex-wrap: wrap;
            overflow: hidden;
        }

        section ::before
        {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
        }
    </style>
    <title>Login</title>
</head>
<body>
<div class="login">
    <div class="content">
        <h2>Log In</h2>
        <div class="form">
            <div class="inputBox">
                <input type="text" required>
                <i>Username</i>
            </div>
            <div class="inputBox">
                <input type="email" required>
                <i>Email</i>
            </div>
            <div class="inputBox">
                <input type="password" required>
                <i>Password</i>
            </div>
            <div class="links">
                <a href="#">Forgot Password</a>
                <a href="register_form.php">Sign Up</a>
            </div>
            <div class="inputBox">
                <input type="submit" value="Login">
            </div>
        </div>
    </div>
</div>

</body>
</html>