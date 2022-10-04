<?php require_once '../controller/autoController.php';
if ($_SESSION['type'] == "Customer") {
    header('location:../food_menu/menu.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Rasoda.in | Client Panel</title>
</head>

<body>
    <header>
        <a href="../index.php" class="logo">Rasoda.In</a>
        <form action="panel.php" method="get">
            <button type="submit" name="user1" class="autho">
                <?php if (!isset($_SESSION['id'])) {

                    echo 'Login/Register';
                } else {
                    echo $_SESSION['username'];
                } ?>
            </button>
        </form>
    </header>
    <div class="adm-wrap">
        <div class="alrt-p alert alert-info " role="alert">
            Hello , <?php echo ucfirst($_SESSION['fname']); ?>. <br> Welcome to Admin Page!
        </div>
        <div class="d-flex justify-content-evenly">
            <div class="card " style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Register Mess / Edit</h5>
                    <p class="card-text">Register your mess with us and start your buisness today.</p>
                    <a href="mess_reg.php" class="btn btn-primary">Register/Edit</a>
                </div>

            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Active Customer Details</h5>
                    <p class="card-text">Acess details for your registerd customers.</p>
                    <a href="customer.php" class="btn btn-primary">Show</a>
                </div>
            </div>
        </div>
    </div>
    

   
</body>

</html>