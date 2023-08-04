<?php
    $insert =false;
    if(isset($_POST['name'])){

        // set connection variable
        $server = "localhost";
        $username = "root";
        $password = "";

        // create a database connection
        $con = mysqli_connect($server, $username,$password);
        
        // check for connection success
        if(!$con){
            die("connection to this database failed due to".
            mysqli_connect_error());
        }
        // echo "Succesfully connected to database";

        // collect post variables
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['add'];
        $desc = $_POST['desc'];

        // excute the query
        $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `address`, `description`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', 
        '$address', '$desc', current_timestamp())";
        // echo $sql;


        if($con->query($sql)==true) $insert =true; // using flag for successful connection
        else echo "ERROR: $sql <br> $con->error";

        // close the database connection
        $con->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <img class="bg" src="bg.jpg" alt="Chitkara University">

    <div class="container">
        <h1>Welcome to Chitkara University Trip Form</h1>
        
       
        <?php
            if($insert==true){
            echo '<p class="submit_msg">Thanks for your participation.
             We are happy to see you joining us for trip</p>';
        
            }else{
                echo '<p>Fill your details and submit form to confirm your participation </p>';
            }
        ?>
        <form class="form" action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            
            <textarea name="add" id="add" cols="30" rows="5" placeholder="Enter your Address"></textarea>
            <textarea name="desc" id="desc" cols="30" rows="5" placeholder="Enter your other information"></textarea>
                
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        
        </form>
    </div>

    <script src="script.js"></script>
    
</body>
</html>
