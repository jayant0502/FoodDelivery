<?php require '../controller/autoController.php'; 
if (isset($_SESSION['id'])) {
    header('location:../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login | Rasoda.in</title>
</head>
<body>
<header>
        <a href="../index.php" class="logo">Rasoda.In</a>




        <form action="login.php" method="get">
            <button type="submit" name="user1" class="autho"> <?php if (!isset($_SESSION['id'])) {
                                                                                                    echo 'Login/Register';
                                                                                                } else {
                                                                                                    echo $_SESSION['username'];
                                                                                                } ?> </button> </form>


    </header>

    <section id="login">
        <div class="logincontainer">
            <img src="avaar.png" alt="">
            <h1>LogIN</h1>
            <form method="POST" action="login.php">
          
                  <?php if(count($errors) > 0): ?>
                    <div class="alert alert-warning">
                    <li>     <?php foreach($errors as $error): ?>
                    <?php echo $error; ?>
                    <?php endforeach; ?> </li>
                    </div>
                    <?php endif; ?>   
               
                <input type="text"   class="input-box" name="username" placeholder="YOUR USERNAME" required autofocus><br>
                
                <input type="password"  class="input-box" name="password" placeholder="YOUR PASSWORD" required><br><br>
                <button type="submit" class="button" name="login-btn">Login</button>
                <p>Not Registered Yet? <a href="../register/home.php">Click here</a></p>
      
              </form>
        </div>
    </section>
</body>
</html>