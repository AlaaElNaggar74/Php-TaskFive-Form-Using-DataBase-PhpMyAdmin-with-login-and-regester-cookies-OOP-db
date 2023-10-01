<?php include("checkCookies.php"); ?>

<?php

$id = isset($_GET["id"]) ? $_GET["id"] : "";

require("db.php");
$db = new Db();
$con = $db->get_connection();

if ($con->connect_errno) {
    die("vaild");
}
if ($id) {
    $resulte = $db->get_Data("student", "id='$id'");
    $data = $resulte->fetch_assoc();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Edit</title>
</head>

<body>
    <?php

    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    if ($id) {
    ?>
       <div class="box d-flex justify-content-end mb-3 mt-5 me-5">
        <a class="btn btn-danger" href="login.php">LogOut</a>
    </div>
        <div class="bo  min-vh-100 d-flex align-items-center">
            <div class="container  col-10 col-sm-8 col-md-6 col-lg-4 m-auto ">
                <div class="divForm p-3 rounded-3 border border-1 border-black ">
                    <h1 class="text-center">-3N-</h1>
                    <form method="POST" action="studentController.php" enctype="multipart/form-data">
                        <div class="mb-1">
                            <label for="ID" class="form-label fw-bold">ID </label>
                            <input type="text" value='<?= isset($data["id"]) ? $data["id"] : "" ?>' name="id" class="form-control" readonly id="ID" aria-describedby="fnameHelp" required>
                        </div>
                        <div class="mb-1">
                            <label for="fname" class="form-label fw-bold">First Name </label>
                            <input type="text" value='<?= isset($data["fname"]) ? $data["fname"] : "" ?>' name="fname" class="form-control" id="fname" aria-describedby="fnameHelp" required>
                        </div>
                        <div class="mb-1">
                            <label for="lname" class="form-label fw-bold">Last Name </label>
                            <input type="text" value='<?= isset($data["lname"]) ? $data["lname"] : "" ?>' name="lname" class="form-control" id="lname" aria-describedby="lnameHelp" required>
                        </div>
                        <div class="mb-1">
                            <label for="email" class="form-label fw-bold">Email Address </label>
                            <input type="email" value='<?= isset($data["email"]) ? $data["email"] : "" ?>' name="email" class="form-control" id="email" aria-describedby="fnameHelp" required>
                        </div>

                        <div class="mb-1">
                            <label for="exampleInputPassword1" class="form-label fw-bold">Password</label>
                            <input type="password" value='<?= isset($data["password"]) ? $data["password"] : "" ?>' name="password" class="form-control" id="exampleInputPassword1" required>
                        </div>
                        <div class="mb-1">
                            <label for="file" class="form-label fw-bold">Upload</label>
                            <input type="file" name="fileToUpload" class="form-control" required>
                        </div>
                        <div class="bt text-center mt-4">
                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    <?php  } else { ?>

        <div class="min-vh-100 d-flex justify-content-center align-items-center bg-danger bg-opacity-25">
            <div class="box text-center">
                <h1>GET ID TO EDIT YOUR CONTENT </h1>
                <a class="btn btn-danger" href="login.php">Login Page</a>
            </div>
        </div>
    <?php } ?>
</body>

</html>



<?php //include("checkCookies.php"); 
?>

<?php

// $id = isset($_GET["id"]) ? $_GET["id"] : "";

// require("db.php");
// $db = new Db();
// $con = $db->get_connection();

// if ($con->connect_errno) {
//     die("vaild");
// }
// $resulte = $db->get_Data("student", "id='$id'");
// $data = $resulte->fetch_assoc();

?>

<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Edit</title>
</head>

<body>
    <div class="bo  min-vh-100 d-flex align-items-center">
        <div class="container  col-10 col-sm-8 col-md-6 col-lg-4 m-auto ">
            <div class="divForm p-3 rounded-3 border border-1 border-black ">
                <h1 class="text-center">-3N-</h1>
                <form method="POST" action="studentController.php" enctype="multipart/form-data">
                    <div class="mb-1">
                        <label for="ID" class="form-label fw-bold">ID </label>
                        <input type="text" value='<?= $data["id"] ?>' name="id" class="form-control" readonly id="ID" aria-describedby="fnameHelp" required>
                    </div>
                    <div class="mb-1">
                        <label for="fname" class="form-label fw-bold">First Name </label>
                        <input type="text" value='<?= $data["fname"] ?>' name="fname" class="form-control" id="fname" aria-describedby="fnameHelp" required>
                    </div>
                    <div class="mb-1">
                        <label for="lname" class="form-label fw-bold">Last Name </label>
                        <input type="text" value='<?= $data["lname"] ?>' name="lname" class="form-control" id="lname" aria-describedby="lnameHelp" required>
                    </div>
                    <div class="mb-1">
                        <label for="email" class="form-label fw-bold">Email Address </label>
                        <input type="email" value='<?= $data["email"] ?>' name="email" class="form-control" id="email" aria-describedby="fnameHelp" required>
                    </div>

                    <div class="mb-1">
                        <label for="exampleInputPassword1" class="form-label fw-bold">Password</label>
                        <input type="password" value='<?= $data["password"] ?>' name="password" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="mb-1">
                        <label for="file" class="form-label fw-bold">Upload</label>
                        <input type="file" name="fileToUpload" class="form-control" required>
                    </div>
                    <div class="bt text-center mt-4">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </div>
                </form>
            </div>



        </div>
    </div>

</body>

</html> -->