

<?php

$fnameDb = isset($_POST["fname"]) ? $_POST["fname"] : "";
$lnameDb = isset($_POST["lname"]) ? $_POST["lname"] : "";
$emailDb = isset($_POST["email"]) ? $_POST["email"] : "";
$passwordDb = isset($_POST["password"]) ? $_POST["password"] : "";
$id = isset($_POST["id"]) ? $_POST["id"] : "";

$imgForm = $_FILES["fileToUpload"];
$imgDb = $imgForm["name"];

$oldPath = $imgForm["tmp_name"];
$newPath = "uploadImages/" . $imgForm["name"];
move_uploaded_file($oldPath, $newPath);


require("db.php");

$db = new Db();
$con = $db->get_connection();

if ($con->connect_errno) {
    die("vaild");
}


if (isset($_POST['add'])) {


    $fnameDb = validate($fnameDb);
    $lnameDb = validate($lnameDb);
    $emailDb = validate($emailDb);

    $fnameDb = ucfirst(strtolower($fnameDb));
    $lnameDb = ucfirst(strtolower($lnameDb));

    $arrayError = [];

    if (strlen($fnameDb) < 2) {
        $arrayError["fname"] = "Not Valid First Name";
    }

    if (strlen($lnameDb) < 2) {
        $arrayError["lname"] = "Not Valid Last Name";
    }

    if (!filter_var($emailDb, FILTER_VALIDATE_EMAIL)) {

        $arrayError["email"] = "Not Valid Email Address  ";
    } else {
        $checkAtr = $db->get_Data("student", "email='$emailDb'");
        $trans = $checkAtr->fetch_assoc();

        if ($trans) {
            $arrayError["email"] = " Email Address Exist Use Another";
        }
    }
    if (!isImage($_FILES["fileToUpload"]["type"])) {

        $arrayError["image"] = "Uploaded  File Not Image Address";
    }

    if (count($arrayError) > 0) {
        $err = json_encode($arrayError);
        header("location: register.php?errors=$err");
    } else {
        $db->insert_Data("student", "(fname,lname,email,password,img)", "('$fnameDb','$lnameDb','$emailDb','$passwordDb','$imgDb')");

        header("location:display.php");
    }
} elseif (isset($_POST["update"])) {

    $db->edit_Data("student", "fname = '$fnameDb', lname= '$lnameDb', email= '$emailDb', password= '$passwordDb' , img= '$imgDb'", "id='$id'");

    header("location:display.php");
} elseif (isset($_POST["login"])) {


    $checkAtr = $db->get_Data("student", "email='$emailDb' and password='$passwordDb'");
    $trans = $checkAtr->fetch_assoc();


    if ($trans) {
        setcookie("fname", $trans["fname"]);
        setcookie("lname", $trans["lname"]);
        setcookie("email", $trans["email"]);
        setcookie("password", $trans["password"]);
        setcookie("img", $trans["img"]);
        setcookie("id", $trans["id"]);
        header("location:display.php");
    } else {

        header("location:login.php?logErr");
    }
}

function validate($value)
{
    $validData = trim($value);
    $validData = stripslashes($value);
    $validData = htmlspecialchars($value);

    return $validData;
}

function isImage($image)
{
    $extension = $image;
    $imgExtArr = ['image/jpg', 'image/jpeg', 'image/png'];
    if (in_array($extension, $imgExtArr)) {
        return true;
    }
    return false;
}

?>

