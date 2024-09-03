!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User registration</title>
</head>
<body>

<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if (isset($_POST['username']) &&
     isset($_POST['email']) && 
     isset($_POST['password']) && 
     isset($_POST['confirm_password'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password =  $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
    
    // Creating database connection
    $conn = new mysqli("localhost", "root", "", "crochet__website");

    // Check connection
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    };


    // Check if passwords match

    if($password !== $confirm_password){
        die("Passwords do not match.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert into the database 
    $sql = "INSERT INTO users (username, email, password) VALUES(?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()){
        echo "UserForm has been registered successfully.";
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    }
}

?>
    
</body>
</html>
