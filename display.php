
<?php  include("checkCookies.php"); ?>

<?php
require("db.php");
$db=new Db();
$con=$db->get_connection();


if ($con->connect_errno) {
    die("vaild");
}

$resulte = $db->get_Data("student");
$data = $resulte->fetch_all(MYSQLI_ASSOC);


if (!$data) {
    $db->reset_Index("student");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Display Data</title>
</head>

<body>

<div class="box d-flex justify-content-end mb-3 mt-5 me-5">
        <a class="btn btn-danger" href="login.php">LogOut</a>
    </div>
    <div class="container  col-12">

        <h1 class="text-center mt-5 mb-3"> All Register Student </h1>
        <div class="ov overflow-x-auto ">

            <table class="table table-bordered  " style="width:900px ;margin:auto">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Password</th>
                        <th scope="col">Images</th>
                        <th scope="col">Operation</th>

                    </tr>
                </thead>
                <tbody>


                    <?php
                    foreach ($data as $keyPar =>  $eachRow) {
                        echo "<tr class='text-center'>";
                        foreach ($eachRow as $key => $value) {


                            if ($key == "img") {
                                echo "<td><img src='uploadImages/" . $value . "' width=50> </td>";
                            } else {
                                echo "<td>$value</td>";
                            }
                        }
                        $id = $data[$keyPar]["id"];
                        echo "<td> <a href='view.php?id=$id' class='btn btn-info me-1'>" . "View" . "";
                        echo " <a href='edit.php?id=$id' class='btn btn-danger me-1'>" . "Edit" . "";
                        echo " <a href='delete.php?id=$id' class='btn btn-danger'>" . "Delete" . "</td>";

                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class=" b text-center mt-5">
        <a class="btn btn-primary" href="register.php">Back To Register </a>
    </div>

    </table>

</body>

</html>