<?php include("checkCookies.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>View</title>
</head>

<body>
    <?php 
    
    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    if ($id) {
    ?>
   <div class="box d-flex justify-content-end mb-3 mt-5 me-5">
        <a class="btn btn-danger" href="login.php">LogOut</a>
    </div>
    <div class="container pb-3">
 
        <h1 class='text-center mt-5 mb-5 text-success '>Welcome In View Page</h1>
        <div class="bo p-3 rounded-2 border-1 border border-black bg-info bg-opacity-50 py-5 d-flex justify-content-between align-items-center ">
            <?php
        
                require("db.php");
                $db = new Db();
                $result = $db->get_Data("student", "id='$id'");
                $data = $result->fetch_assoc();
                       ?>
            <div class="right me-5">
                <?php
                echo "<td><img class='w-100' src='uploadImages/" . (isset($data["img"]) ? $data["img"] : "") . "' alter='ERROR'> </td>";
                ?>
            </div>

            <div class="left ">
                <?php
                echo "<h3>First Name Is : <span class='text-danger'>" . (isset($data["fname"]) ? $data["fname"] : "") . "</span></h3>";
                echo "<h3>Last Name Is : <span class='text-danger'>" . (isset($data["lname"]) ? $data["lname"] : "") . "</span></h3>";
                echo "<h3>Email Address Is : <span class='text-danger'>" . (isset($data["email"]) ? $data["email"] : "") . "</span></h3>";
                echo "<h3>Password Is : <span class='text-danger'>" . (isset($data["password"]) ? $data["password"] : "") . "</span></h3>";
                ?>
                <div class=" b  mt-5 ">
                    <a class="btn btn-danger" href="register.php">Back To Home</a>
                    <a class="btn btn-primary" href="display.php">Back To Tables</a>

                </div>
            </div>

        </div>
    </div>
    <?php  } else { ?>

            <div class="min-vh-100 d-flex justify-content-center align-items-center bg-danger bg-opacity-25">
               <div class="box text-center">
               <h1>GET ID TO DISPLAY YOUR CONTENT </h1>
                    <a class="btn btn-danger" href="login.php">Login Page</a>
               </div>
            </div>
        <?php }?>
</body>

</html>