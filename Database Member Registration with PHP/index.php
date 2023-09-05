<?php
include 'connect.php';

$username_err = $email_err = $password_err = $passwordAgain_err = "";

if (isset($_POST["save"])) {
    if (empty($_POST["userName"])) {
        $username_err = "Username cannot be empty";
    } else if (strlen($_POST["userName"]) < 6) {
        $username_err = "Username must be at least 6 characters.";
    } else if (!preg_match('/^[a-z\d_]{5,20}$/i', $_POST["userName"])) {
        $username_err = "Username must consist of upper and lower case letters and numbers..";
    } else {
        $username = $_POST["userName"];
    }
    if (empty($_POST["email"])) {
        $email_err = "Email field cannot be empty.";
    } else if (!preg_match("/^[a-zA-Z-' ]*$/", $username_err)) {
        $name_Err = "Invalid email format";
    } else {
        $email = $_POST["email"];
    }
    if (empty($_POST["password"])) {
        $password_err = "Password cannot be blank";
    } else {
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }
    if (empty($_POST["passwordAgain"])) {
        $passwordAgain_err = "Password repeat field cannot be empty";
    } else if ($_POST["password"] != $_POST["password"]) {
        $passwordAgain_err = "Password does not match.";
    } else {
        $passwordAgain = $_POST["passwordAgain"];
    }
    if (isset($username) && isset($email) && isset($password)) {
        $add = "INSERT INTO users (user_name, email, password) VALUES ('$username', '$email', '$password');";

        $runAdd = mysqli_query($connect, $add);

        if ($runAdd) {
            echo '
        <div class="alert alert-success" role="alert">
        Registration Successfully Added.
        </div>
        ';
        } else {
            echo '
        <div class="alert alert-danger" role="alert">
        Failed to Add Record, Try Again.
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
    <title>Member Registration Process</title>
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
            <form action="index.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User name</label>
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
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" <?php
                                                                if (!empty($email_err)) {
                                                                    echo "is-invalid";
                                                                }
                                                                ?> id="exampleInputEmail1" name="email">
                    <div class="invalid-feedback">
                        <?php echo $email_err; ?>
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
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password Again</label>
                    <input type="password" class="form-control" <?php

                                                                if (!empty($passwordAgain_err)) {
                                                                    echo "is-invalid";
                                                                }

                                                                ?> id="exampleInputPassword1" name="passwordAgain">
                    <div class="invalid-feedback">
                        <?php echo $passwordAgain_err; ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="save">save</button>
            </form>
        </div>
    </div>
    
    <div class="card-footer text-body-secondary">
        <center>
            <p>Design by <a href="https://www.linkedin.com/in/%C3%B6mer-k%C4%B1l%C4%B1%C3%A7-5513b1252" target="_blank" style="text-decoration: none; color:black;"><b>ÖMER KILIÇ </b></a> | &copy; 2023</p>
        </center>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>