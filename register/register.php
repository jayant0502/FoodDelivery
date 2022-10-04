<?php require_once '../controller/autoController.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="../style/navbar.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Login | Rasoda.in</title>
</head>
<body>
  <header>
        <a href="../index.php" class="logo" >Rasoda.In</a>




        <form action="register.php" method="get">
            <button type="submit" name="user1" class="autho"> <?php if (!isset($_SESSION['id'])) {
                                                                                                    echo 'Login/Register';
                                                                                                } else {
                                                                                                    echo $_SESSION['username'];
                                                                                                } ?> </button> </form>


    </header>

    <section id="login">
        <div class="registercontainer1">
            <img src="avaar.png" alt="">
            <h1>Register!</h1>
            <form method="post" action="register.php">
            <h1>Earn From Your Kitchen!</h1>
            
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-warning">  <?php foreach($errors as $error): ?>
        <li><?php echo $error; ?></li>
        <?php endforeach; ?>
        </div> 
    <?php endif; ?>
    
            <input type="text" name="fname" class="input-box" placeholder="Enter Your First Name" required><br><br>

            <input type="text" name="lname" class="input-box" placeholder="Enter Your Last Name" required><br><br>
            <input type="text" name="username" id="name"class="input-box" placeholder="Enter Username" required><br><br>
                              
            <input type="number" name="mnum" class="input-box" placeholder="Enter Your Mobile Number" required><br><br>
            <input type="text" name="email" class="input-box" placeholder="Enter Your Email id" required><br><br>
            <input type="password" name="password1" class="input-box" placeholder="Enter Your Password" required><br><br>
            <input type="password" name="password2" class="input-box" placeholder="Confirm Password" required><br><br>
            <label for="gender">Gender: </label>
            <input type="radio" name="gender" checked="checked" value="Male" ><span >&nbsp; Male</span>&nbsp;&nbsp;
            <input type="radio" name="gender"  value="Female"><span >&nbsp; Female</span>&nbsp;&nbsp;<br><br>
            <button class="button" type="submit" name="register-btn"  >Register</button>
            <h3>Already Registered? <a href="../login/login.php">Login.</a> </h3>

              </form>
        </div>
    </section>
</body>
</html>