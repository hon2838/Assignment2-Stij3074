<?php
    session_start();
    if (!isset($_SESSION['email'])&&!isset($_SESSION['password'])) {
        header('Location: login.php');
        exit;
    }

    include 'dbconnect.php';
    $sqlloadpatients = "SELECT * FROM tbl_patient";
    $stmt = $conn->prepare($sqlloadpatients);
    $stmt->execute();
    $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows=$stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Clinic View Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="main.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4 ms-4">My Clinic</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="main.php" class="nav-link" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="viewpatient.php" class="nav-link active" aria-current="page">View Patient</a></li>
        <li class="nav-item"><a href="newpatient.php" class="nav-link">New Patient</a></li>
        <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
        <li class="nav-item"><a href="#" data-bs-toggle="modal" data-bs-target="#modal1" class="nav-link">About</a></li>
      </ul>
    </header>

    <div class="container">
        <div class="row">
            <div>
                <h2>Patients</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Time Registered</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($rows as $row) {
                                echo "<tr>";
                                echo "<td>" . $row['p_id'] . "</td>";
                                echo "<td>" . $row['p_name'] . "</td>";
                                echo "<td>" . $row['p_email'] . "</td>";
                                echo "<td>" . $row['p_phone'] . "</td>";
                                echo "<td>" . $row['p_date_reg'] . "</td>";
                                echo "<td><a href='editpatient.php?id=" . $row['p_id'] . "' class='btn btn-primary'>Edit</a> <a href='deletepatient.php?id=" . $row['p_id'] . "' class='btn btn-danger'>Delete</a></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="modal1Title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">About Us</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>This web app is a demo system owned by My Clinic.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

        