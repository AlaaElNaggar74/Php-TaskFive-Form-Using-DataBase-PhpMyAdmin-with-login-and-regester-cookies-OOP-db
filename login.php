
<?php
if (isset($_GET["logErr"])) {
    $logError="Your Data Not Valid Pleas Try Again";
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <div class="bo  min-vh-100 d-flex align-items-center">
        <div class="container  col-10 col-sm-8 col-md-6 col-lg-4 m-auto ">
            <div class="divForm p-3 rounded-3 border border-1 border-black ">
                <h1 class="text-center">-3N-</h1>
                <form method="POST" action="studentController.php">
                    <div class="mb-1">
                        <label for="email" class="form-label fw-bold">Email Address </label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="fnameHelp" required>
                        <?php echo isset($emailErro)?"<p   class='dnone text-danger'>".$emailErro."</p>":"" ?>
                    </div>

                    <div class="mb-1">
                        <label for="exampleInputPassword1" class="form-label fw-bold">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <?php echo isset($logError) ? "<p class='dnone text-danger'>".$logError."</p>" : "" ?>

                    <div class="bt text-center mt-4">
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                    </div>
                </form>
            </div>



        </div>
    </div>
<script src="indexLog.js"></script>
</body>

</html>