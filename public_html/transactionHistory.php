<?php
// Include config file
require_once "config.php";

// Check if the user is logged in, if not then redirect him to login page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
    header("location: login.php");
    exit;
}
session_start();
$id = $_SESSION['id'];
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Transactions</title>
</head>
<body>
    <h4>My Tansactions</h4>
    <?php
    // Attempt select query execution
$sql = "SELECT * FROM accounts where user_id = $id";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_array($result)){
           
            //Get account id
                $accountId = $row['account_id'];
                $transactions_query = "SELECT * FROM transactions where accountSrc = $accountId ";
            if($result = mysqli_query($link, $transactions_query)){
                if(mysqli_num_rows($result) > 0){
                    echo "<table>";
                        echo "<tr>";
                            echo "<th>Transaction id</th>";
                            echo "<th>AccountSrc</th>";
                            echo "<th>AccountDest</th>";
                            echo "<th>Transaction type</th>";
                            echo "<th>Memo</th>";
                            echo "<th>BalanceChange</th>";
                        echo "</tr>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td>" . $row['transaction_id'] . "</td>";
                            echo "<td>" . $row['accountSrc'] . "</td>";
                            echo "<td>" . $row['accountDest'] . "</td>";
                            echo "<td>" . $row['transactionType'] . "</td>";
                            echo "<td>" . $row['memo'] . "</td>";
                            echo "<td>" . $row['balanceChange'] . "</td>";
                        
                        echo "</tr>";
                    }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

               
        }
        
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
    ?>
</body>
</html>