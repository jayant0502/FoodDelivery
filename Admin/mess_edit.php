<?php require_once '../controller/autoController.php'; ?>
<?php require_once 'panelController.php'; ?>
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
        <form action="mess_edit.php" method="get">
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
        <div class="form-check m-3">
  <input class="form-check-input " type="checkbox"  id="det_edit">
  <label class="form-check-label" for="det_edit">
    <h5>Edit Details.</h5>
  </label>
</div>
        <form action="mess_reg.php" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                <input type="text" name="mess_name" id="mess_name" class="form-control" value="<?php echo $_SESSION['mess_name'];?>" aria-describedby="inputGroup-sizing-default" disabled>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Description</span>
                <textarea name="mess_desc" class="form-control" id="mess_desc" aria-label="Description" disabled> <?php echo $_SESSION['mess_desc']; ?></textarea>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                <input type="text" class="form-control" value="<?php echo $_SESSION['mess_price'];?>" name="mess_price" id="mess_price" disabled>
            </div>
            <div class="menu_input">
                <div>
                    <h3 class="alert alert-primary">SCHEDULE</h3>
                    <input type="checkbox" name="lunch" id="breakfast" disabled >
                    <label for="lunch" class="form-check-label">
                        <h4>Breakfast</h4>
                    </label>
                    <div class="lunchinput form-check">
                        <input type="text" id="breakfast_input" value="<?php echo $_SESSION['breakfast'];?>" name="breakfast_menu" class="form-control"  disabled placeholder="Item 1+Item 2 + Item 3..." >

                    </div>
                    <input type="checkbox" name="lunch" id="lunch" disabled >
                    <label for="lunch" class="form-check-label">
                        <h4>Lunch</h4>
                    </label>
                    <div class="lunchinput form-check">
                        <input type="text" id="lunch_input" name="l_input" value="<?php echo $_SESSION['lunch'];?>" class="form-control"  disabled placeholder="Item 1+Item 2 + Item 3..." >

                    </div>
                    <input type="checkbox" name="lunch" id="dinner" disabled >
                    <label for="lunch" class="form-check-label">
                        <h4>Dinner</h4>
                    </label>
                    <div class="lunchinput form-check">
                        <input type="text" id="dinner_input" name="d_input" value="<?php echo $_SESSION['dinner'];?>" class="form-control" placeholder="Item 1+Item 2 + Item 3..."  disabled>

                    </div>
                </div>
                <div class="container2">
                    <h3 class="alert alert-primary">SERVICES</h3>
                    <div id="services">
                        <input type="text" id="ser1" class="form-control" value="<?php echo $_SESSION['serv1'];?>" placeholder="Enter Service Provided." name="serv1" disabled>
                        <input type="text" id="ser2" class="form-control" value="<?php echo $_SESSION['serv2'];?>" placeholder="Enter Service Provided." name="serv2" disabled>
                        <input type="text" id="ser3" class="form-control" value="<?php echo $_SESSION['serv3'];?>" placeholder="Enter Service Provided." name="serv3" disabled>
                        <input type="text" id="ser4" class="form-control" value="<?php echo $_SESSION['serv4'];?>" placeholder="Enter Service Provided." name="serv4" disabled>
                        <input type="text" id="ser5" class="form-control" value="<?php echo $_SESSION['serv5'];?>" placeholder="Enter Service Provided." name="serv5" disabled>
                        <input type="text" id="ser6" class="form-control" value="<?php echo $_SESSION['serv6'];?>" placeholder="Enter Service Provided." name="serv6" disabled>
                        <input type="text" id="ser7" class="form-control" value="<?php echo $_SESSION['serv7'];?>" placeholder="Enter Service Provided." name="serv7" disabled>
                    </div>
                    <!-- <button type="button" id="add_field" class="btn btn-secondary btn-sm" disabled onclick="addf();">+ Add More Field</button> -->

                </div>
            </div>
            
            <button type="submit" name="reg_updt" id="reg" disabled class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="script/adminscript.js"></script>
</body>

</html>