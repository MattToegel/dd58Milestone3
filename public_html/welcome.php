<?php
// Include config file
require_once "config.php";
// Initialize the session
session_start();
$balance = "";
$balance_err = "";

// Check if the user is logged in, if not then redirect him to login page
//Basic authentication
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}




$username = $_SESSION["username"];
$getUser = "SELECT * FROM users WHERE username = 'admin'";

if ($result = mysqli_query($link, $getUser)) {
    if (mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_array($result);
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo mysqli_error($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
            
        }
    </style>
</head>

<body>
    <!-- Add bootstrap navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarCenteredExample" aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
                <!-- Left links -->
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="welcome.php">Create Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="myAccount.php">MyAccount</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Deposit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Withdraw</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="transfer.php">Transfer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Display user profile Basically fetch user info from database -->
    
    <div class="container">
        <h4 class="mt-2"> Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h4>
        <h4>Your profile is : <b><?php echo htmlspecialchars($user['email']); ?></b></h4>
        
        
    </div>

</body>

</html>