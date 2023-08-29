<?php
include 'connect.php';

$username_err = $password_err = "";

if (isset($_POST["login"])) {
    if (empty($_POST["userName"])) {
        $username_err = "Username cannot be empty";
    } else if (strlen($_POST["userName"]) < 6) {
        $username_err = "Username must be at least 6 characters.";
    } else {
        $username = $_POST["userName"];
    }
    if (empty($_POST["password"])) {
        $password_err = "Password cannot be blank";
    } else {
        $password = $_POST["password"];
    }
    if (isset($username) && isset($password)) {
        $selection = "SELECT * FROM users WHERE user_name = '$username'";

        $run = mysqli_query($connect, $selection);

        $numberRecords = mysqli_num_rows($run);

        if ($numberRecords > 0) {
            $relatedRecord = mysqli_fetch_assoc($run);

            $hashPassword = $relatedRecord["password"];

            if (password_verify($password, $hashPassword)) {

                session_start();
                $_SESSION["userName"] = $relatedRecord["userName"];
                $_SESSION["email"] = $relatedRecord["email"];

                header('location: profile.php');
            } else {
                echo '
                <div class="alert alert-danger" role="alert">
                The password is incorrect.
            </div>
                ';
            }
        } else {
            echo '
            <div class="alert alert-danger" role="alert">
            Username is incorrect.
        </div>
            ';
        }

        mysqli_close($connect);
    }
}
?>

<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">

    <title>Member Login Process</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Log In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container p-5">
        <div class="card p-5">
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User Name</label>
                    <input type="text" class="form-control" <?php

                                                            if (!empty($username_err)) {
                                                                echo "is-invalid";
                                                            }

                                                            ?> id="exampleInputEmail1" name="userName">
                    <div class="invalid-feedback">
                        <?php echo $username_err; ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" <?php

                                                                if (!empty($password_err)) {
                                                                    echo "is-invalid";
                                                                }

                                                                ?> id="exampleInputPassword1" name="password">
                    <div class="invalid-feedback">
                        <?php echo $password_err; ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>