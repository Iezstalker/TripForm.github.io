<?php
$insert = false;
if (isset($_POST['name'])) {
    // set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if (!$con) {
        die("connection to this database faailed due to" .
            mysqli_connect_error());
    }
    // echo "Success connecting to the php";   

    // Collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `phone`, `email`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$phone', '$email', '$desc', current_timestamp());";
    // echo $sql;

    // Execute the query
    if ($con->query($sql) == true) {
        // echo "successfully inserted";

        // Flag forsuccessful insertion
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }
    // Close the database connection
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>US Trip Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="./bg.jpg" alt="USA">
    <div class="container">
        <h1>Welcome To US Trip Form</h1>
        <p>Enter your details & submit this to confirm your participation in the trip</p>
        <?php
        if ($insert == true) {
            echo "<p class='submitmsg'>Thanks for submitting your form. We are happy to see you joining for the US Trip</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="text" name="phone" id="phone" placeholder="Enter Your Phone No.">
            <input type="text" name="email" id="email" placeholder="Email">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->

        </form>

    </div>

    <script src="index.js"></script>

</body>

</html>