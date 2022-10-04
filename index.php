<?php require_once 'controller/autoController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Grenze+Gotisch:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Style/style_home.css" >
    <link rel="stylesheet" href="Style/btn.css">
    <link rel="stylesheet" href="Style/navbar.css">
    <title>Rasoda.in | Home</title>
</head>

<body>
    <header>
        <a href="#home" class="logo">Rasoda.In</a>
        <form action="index.php" method="get">
            <button type="submit" name="user" class="autho">
                <?php if (!isset($_SESSION['id'])){

                    echo 'Login/Register';
                } else {
                    echo $_SESSION['username'];
                } ?>
            </button>
        </form>


    </header>
    <div class="slider">
        <section id="home">
            <div class="display">

                <div class="demo">

                    <h1>Welcome to Rasoda.in</h1>
                    <h3>We got something for everyone.</h3>
                    <div>

                        <a href="Food_Menu/menu.php"> <button class="btn btn2">Explore</button></a>

                    </div>

                </div>
            </div>

        </section>
        <section id="services">
          <div class="s_title">  <h1 id="serhead"> SERVICES</h1></div>
            <div class="srv_container ">

                <div class="box ">
                    <h2>01</h2>
                    <h3>Service One</h3>  <br>  
                    <p class="p1">Away from home missing ghar ka khana?</p><br>
                    <p class="p2">We provide deleciois home style food with minimal oil and masalas</p>
                </div>
                <div class="box">
                    <h2>02</h2>
                    <h3>Service Two</h3>  <br>  
                    <p class="p1">Do you like when someone appreciates your cooking skill?</p><br>
                    <p class="p2">Than let us take this appreciation to next level and you can earn from your own kitchen with us!</p>
                </div>
                <div class="box">
                    <h2>03</h2>
                    <h3>Service Three</h3> <br>  
                    <p class="p1">Why Join US?</p><br>
                    <p class="p2">We are here to satisfy your craving of 'maa ke hath ka khana' And let your appreaciation of food help you to fill your pockets.</p>
                </div>
                
            </div>
            </section>
       <footer>
         <div>  <span>Support :</span> 
          <span> <p>Email - Rasoda@support.com </p></span>
           <span><p>Contact Us - +917000237697 : Buisness</p></span>
           <span>&#169 RASODA.IN</span>
           </div>
                <div class="grp_by">
                   <span> A Project By :
                   Jai Dubey ,
                   Jayant Pawar ,
                   Khushali Chawrekar</span>
                </div>
        </footer> 
    <div class="navigation">
        <div class="control">
            <a href="#home"> <img src="asset/back.png" class="navdot" alt=""> </a>
        </div>
        <div class="navigation1">

            <div class="control">
                <a href="#services"> <img src="asset/next.png" class="navdot" alt=""></a>
            </div>

        </div>

    </div>
</body>

</html>