
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Clinic Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand mb-0 h1" href="#">My Clinic</a>
            </div>
        </nav>
    </header>

    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="main.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4 ms-4">Matthew H's Clinic</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="main.php" class="nav-link active" aria-current="page">Login</a></li>
            <li class="nav-item"><a href="newpatient.php" class="nav-link">Register</a></li>
        </ul>
    </header>

    <div class="container mb-3 mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Welcome to My Clinic</h2>
                <p>My Clinic is a web application that helps you manage your clinic. You can use this application to manage your patients, appointments, and more.</p>
                <p>Please login or register to get started.</p>
                <div class="mb-3">
                    <a href="login.php" class="btn btn-primary">Login</a>
                    <a href="register.php" class="btn btn-primary">Register</a>
                </div>
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
</body>