
<?php

$id = $_GET["id"];

$id = $_GET["id"];

require("db.php");
$db = new Db();
$con = $db->get_connection();
if ($con->connect_errno) {
    die("vaild");
}

$db->delete_Spec_Data("student", "id='$id'");

// $sql = "DELETE FROM student WHERE id=$id";
// $con->query($sql);

header("location:display.php");

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Check Adding</title>
</head>

<body>
    <div class="bo  min-vh-100 d-flex align-items-center">
        <div class="container   m-auto ">
            <h1 class="mt-2 text-center text-danger mb-5">Delete Page</h1>
            <div class="bt text-center">
                <h1 class="mb-3">Student Data With ID <span class="text-danger"> <?php echo ($_GET["id"]+1); ?> </span> Delete </h1>
                <div class=" b text-center mt-5">
                    <a class="btn btn-success me-3" href="register.php">Back To Home</a>
                    <a class="btn btn-danger" href="display.php">Show Tables</a>

                </div>
            </div>
        </div>
    </div>

</body>

</html>