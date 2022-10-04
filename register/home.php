<?php require_once '../controller/autoController.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="../style/navbar.css">
    <title>Login | Rasoda.in</title>
    <style>
        h2 {
            margin-bottom: 20px;
        }

        .autho-sel {
            margin: 20px;
        }
    </style>
</head>

<body>
    <header>
        <a href="../index.php" class="logo">Rasoda.In</a>
        <form action="home.php" method="get">
            <button type="submit" name="user1" class="autho"> <?php if (!isset($_SESSION['id'])) {
                                                                    echo 'Login/Register';
                                                                } else {
                                                                    echo $_SESSION['username'];
                                                                } ?> </button> </form>


    </header>

    <section id="login">
        <div class="registercontainer">
            <img src="avaar.png" alt="">
            <h1>Register</h1>
            <form action="home.php" method="post">
                <h2>Want to join as:</h2>

                <input type="radio" class="autho-sel" checked="checked"  name="au" value="Customer">Customer
                <input type="radio" class="autho-sel" name="au" value="Supplier">Supplier
                

                    <button class="button" type="submit" name="reg_nxt">Next</button>
                
                <h3>Alredy Registered? <a href="../login/login.php">Login.</a> </h3>

            </form>
        </div>
    </section>
</body>

</html>