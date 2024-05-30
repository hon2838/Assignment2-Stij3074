<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'dbconnect.php';
    
    // Get user input
    $email = $_POST['email'];
    $password = sha1($_POST['password']); // Hash the password

    // Prepare and execute the SQL query with a parameterized query
    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE u_email = :email AND u_Pw = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // Check if the user exists
    $number_of_rows = $stmt->rowCount();

    if ($number_of_rows > 0){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        echo "<script>alert('Login Successful')</script>";
        echo "<script>window.location.href='main.php'</script>";
    } else {
        echo "<script>alert('Login Failed')</script>";
        echo "<script>window.location.href='login.php'</script>";
    }

    // Close the database connection
    $conn = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Clinic Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body onload="loadCookies()">
    <header>
        <nav class="navbar bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand mb-0 h1" href="#">My Clinic</a>
            </div>
        </nav>
    </header>

    <div class="container mt-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 offset-md-3">
                <h2>Login</h2>
                <form action="login.php" method="post" name="loginForm">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember" onclick="validateForm()">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>

                </form>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">Matthew H's Clinic © 2024</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="scripts/login.js">
    let cookieNotice = document.getElementById('cookieNotice');
    document.getElementById('btn-close').addEventListener('click', function() {
        document.cookie = 'cookieNotice=hidden; expires=Fri, 31 Dec 9999 23:59:59 GMT';
        cookieNotice.style.display = 'none';
    });
        cookieNotice.style.display = 'none';

    </script> 
</body>
</html>
