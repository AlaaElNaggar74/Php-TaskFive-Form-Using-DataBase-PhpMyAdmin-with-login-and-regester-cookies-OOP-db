<?php include("checkCookies.php");  ?>


<?php

if (isset($_GET["errors"])) {
    $newArr = json_decode($_GET["errors"], true);

    $fnameErro = isset($newArr["fname"]) ? $newArr["fname"] : "";
    $lnameErro = isset($newArr["lname"]) ? $newArr["lname"] : "";
    $emailErro = isset($newArr["email"]) ? $newArr["email"] : "";
    $imageErro = isset($newArr["image"]) ? $newArr["image"] : "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Register</title>
</head>

<body>
    <div class="box d-flex justify-content-end mb-3 mt-5 me-5">
        <a class="btn btn-danger" href="login.php">LogOut</a>
    </div>
    <div class="bo   d-flex align-items-center">
        <div class="container  col-10 col-sm-8 col-md-6 col-lg-4 m-auto ">

            <div class="divForm p-3 rounded-3 border border-1 border-black ">
                <h1 class="text-center">-3N-</h1>
                <form runat="server" method="POST" action="studentController.php" enctype="multipart/form-data">
                    <div class="mb-1">
                        <label for="fname" class="form-label fw-bold">First Name </label>
                        <input type="text" name="fname" class="form-control" id="fname" aria-describedby="fnameHelp">
                        <?php echo isset($fnameErro) ? "<p  class='dnone text-danger'>" . $fnameErro . "</p>" : "" ?>

                    </div>
                    <div class="mb-1">
                        <label for="lname" class="form-label fw-bold">Last Name </label>
                        <input type="text" name="lname" class="form-control" id="lname" aria-describedby="lnameHelp">
                        <?php echo isset($lnameErro) ? "<p class='dnone text-danger'>" . $lnameErro . "</p>" : "" ?>

                    </div>
                    <div class="mb-1">
                        <label for="email" class="form-label fw-bold">Email Address </label>
                        <input type="text" name="email" class="form-control" id="email" aria-describedby="fnameHelp">
                        <?php echo isset($emailErro) ? "<p   class='dnone text-danger'>" . $emailErro . "</p>" : "" ?>

                    </div>

                    <div class="mb-1">
                        <label for="exampleInputPassword1" class="form-label fw-bold">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-1">
                        <label for="file" class="form-label fw-bold">Upload</label>
                        <div class="dfl d-flex align-items-center">
                            <div class="im me-3">
                                <input type="file" name="fileToUpload" style="width:100px" id="imgInp">
                            </div>
                            <img id="blah" src="#" alt="your image" class="rounded-5" />
                        </div>
                        <?php echo isset($imageErro) ? "<p   class='dnone text-danger'>" . $imageErro . "</p>" : "" ?>

                    </div>
                    <div class="bt text-center mt-4">
                        <button type="submit" class="btn btn-primary" name="add">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="index.js"></script>
</body>

</html>