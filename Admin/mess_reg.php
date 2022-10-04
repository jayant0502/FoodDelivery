<?php require_once '../controller/autoController.php'; ?>
<?php require_once 'panelController.php'; ?>
<?php

if (isset($_SESSION['mess_name'])) {
    header('location:mess_edit.php');
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

<body onload="validation();">
    <header>
        <a href="../index.php" class="logo">Rasoda.In</a>
        <form action="mess_reg.php" method="get">
            <button type="submit" name="user1" class="autho">
                <?php if (!isset($_SESSION['id'])) {

                    echo 'Login/Register';
                } else {
                    echo $_SESSION['username'];
                } ?>
            </button>
        </form>
    </header>

    <div class="container-wrap">
        <div class="alert alert-primary" role="alert">
            Fill your following details.
        </div>
        <div class="alert alert-warning" role="alert">
            Note - Please Provide Items with respective quantity.
        </div>
      
        <form action="mess_reg.php" method="POST" enctype="multipart/form-data">
        <?php if(count($errors_adm) > 0): ?>
                    <div class="alert alert-warning">
                    <li>     <?php foreach($errors_adm as $error): ?>
                    <?php echo $error; ?>
                    <?php endforeach; ?> </li>
                    </div>
                    <?php endif; ?>       
        <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
              
              <input type="text" name="mess_name" class="form-control" aria-describedby="inputGroup-sizing-default" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Description</span>
                <textarea name="mess_desc" class="form-control" aria-label="Description" required></textarea>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                <input type="text" class="form-control" name="mess_price" id="mess_price" required>
            </div>
            <div class="menu_input">
                <div>
                    <h3 class="alert alert-primary">SCHEDULE</h3>
                    <input type="checkbox" name="lunch" id="breakfast">
                    <label for="breakfast" class="form-check-label">
                        <h4>Breakfast</h4>
                    </label>
                    <div class="lunchinput form-check">
                        <input type="text" id="breakfast_input" name="breakfast_menu" class="form-control" placeholder="Item 1+Item 2 + Item 3..." >

                    </div>
                    <input type="checkbox" name="lunch" id="lunch">
                    <label for="lunch" class="form-check-label">
                        <h4>Lunch</h4>
                    </label>
                    <div class="lunchinput form-check">
                        <input type="text" id="lunch_input" name="l_input" class="form-control" placeholder="Item 1+Item 2 + Item 3..." >

                    </div>
                    <input type="checkbox" name="lunch" id="dinner">
                    <label for="dinner" class="form-check-label">
                        <h4>Dinner</h4>
                    </label>
                    <div class="lunchinput form-check">
                        <input type="text" id="dinner_input" name= "dinner" class="form-control" placeholder="Item 1+Item 2 + Item 3..." >

                    </div>
                </div>
                <div class="container2">
                    <h3 class="alert alert-primary">SERVICES</h3>
                    <div id="services">
                        <input type="text" id="ser1" class="form-control" placeholder="Enter Service Provided." name="serv1">
                        <input type="text" id="ser2" class="form-control" placeholder="Enter Service Provided." name="serv2">
                        <input type="text" id="ser3" class="form-control" placeholder="Enter Service Provided." name="serv3">
                        <input type="text" id="ser4" class="form-control" placeholder="Enter Service Provided." name="serv4">
                        <input type="text" id="ser5" class="form-control" placeholder="Enter Service Provided." name="serv5">
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="addf();">+ Add More Field</button>

                </div>


            </div>
           
            <button type="submit" name="reg_sub" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="script/adminscript.js"></script>
</body>

</html>