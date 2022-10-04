<?php require_once '../controller/autoController.php'; ?>
<?php if (!isset($_POST['window'])) {
    header('location: ../food_menu/menu.php');
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/section_style.css">
    <link rel="stylesheet" href="../Style/navbar.css">
    <link rel="stylesheet" href="../Style/style_home.css">
    <title>Rasoda.in | <?php echo ucwords($_POST['window']); ?> </title>
</head>

<body onload="pop()">
    <header>
        <a href="../index.php" class="logo">Rasoda.In</a>
        <form action="section_menu.php" method="get">
            <button type="submit" name="user1" class="autho"> <?php if (!isset($_SESSION['id'])) {
                                                                    echo 'Login/Register';
                                                                } else {
                                                                    echo $_SESSION['username'];
                                                                } ?> </button> </form>

    </header>
    
    <div id="box">
        <div>
            You are already registered to a Tiffin Centre!  
            Please relinquish current active plan.
</div>
        <button id="close" onclick="pop()">OK</button>
    </div>
    <form action="section_checkout.php" method="get">
        <div class="menu-container">
            <h1 style="text-transform: uppercase;"> <img src="../Asset/tacu-tacu.png" style="width: 40px;margin-top: 5px;" alt=""> Directly from the kitchen of <?php echo $_POST['window']; ?></h1>
            
            <div class="details">
                
                <?php
                if (isset($_POST['mess'])) {
                    $window = $_POST['window'];

                    $menu = "SELECT * FROM menu INNER JOIN registered_tc ON menu.username = registered_tc.username WHERE  mess_name like '%" . $window . "%'  LIMIT 1";
                    $output = $conn->query($menu);
                    $row = $output->fetch_assoc();
                    $mess_pricegst = $row['mess_price'] * (18 / 100);
                    $mess_pricetotal = $mess_pricegst + $row['mess_price'];
                    echo "<div class=\"schedule\" style=\"display: inline-block;\"> <h2 style=\"font-size: 1.9em;\">SCHEDULE</h2> <br>";
                    if ($row['breakfast'] != "") {
                        echo "<p><b> Breakfast: </b>";
                        echo strtoupper($row['breakfast']);
                        echo "</p>";
                    }
                    if ($row['lunch'] != "") {
                        echo "<p><b> Lunch: </b>";
                        echo strtoupper($row['lunch']);
                        echo "</p>";
                    }
                    if ($row['dinner'] != "") {
                        echo "<p> <b> Dinner: </b> " . strtoupper($row['dinner']) . " </p>";
                    }
                    echo " <br><br>
                    <p>*Everyday Different Seasonal Vegetable</p>
                    
                </div> 
                
                <div class=\"mess-service\">
                    <h2>SERVICES</h2><br>";
                    $i = 1;
                    if ($row['serv1'] != "") {
                        echo   "<p>" . $i . ". " . strtoupper($row['serv1']) . "</p> ";
                        $i++;
                    }
                    if ($row['serv2'] != "") {
                        echo   "<p>" . $i . ". " . strtoupper($row['serv2']) . "</p> ";
                        $i++;
                    }
                    if ($row['serv3'] != "") {
                        echo   "<p>" . $i . ". " . strtoupper($row['serv3']) . "</p> ";
                        $i++;
                    }
                    if ($row['serv4'] != "") {
                        echo   "<p>" . $i . ". " . strtoupper($row['serv4']) . "</p> ";
                        $i++;
                    }
                    if ($row['serv5'] != "") {
                        echo   "<p>" . $i . ". " . strtoupper($row['serv5']) . "</p> ";
                        $i++;
                    }
                    if ($row['serv6'] != "") {
                        echo   "<p>" . $i . ". " . strtoupper($row['serv6']) . "</p> ";
                        $i++;
                    }
                    if ($row['serv7'] != "") {
                        echo   "<p>" . $i . ". " . strtoupper($row['serv7']) . "</p> ";
                        $i++;
                    }


                    echo "</div></div><br><br>";

                    echo "<div class=\"invoice\">
                               
                                    <div class=\"amount\">";
                    if ($row['mess_price'] != "") {

                        echo " <p>
                                            Charge Per Month:  " . $row['mess_price'] . "</p><p>18% GST:  " . $mess_pricegst . "</p><p>Grand Total:  " . $mess_pricetotal . " </p>";
                    }


                    echo " </div>";

                    echo "<form method=\"POST\" id=\"checkout_val\" action=\"section_checkout.php\" enctype=\"multipart/form-data\">";
                    $_SESSION['payment1'] = $row['mess_name'];
                    $_SESSION['payment1total'] = $mess_pricetotal;
                    echo "<button class=\"pay-btn\" type=\"submit\" id=\"liveToastBtn\" name=\"pay\"";
                    if ($_SESSION['purchase'] == $row['mess_name']) {
                        echo "disabled><p>Paid</p></button>";
                    } else {
                        if($_SESSION['purchase']){
                        if($_SESSION['purchase']!= $row['mess_name']){
                            echo "disabled";
                        }}
                        echo "><p>Checkout</p></button>";
                        
                    }
                    
                    
                    
                    echo "</form></div>";
                }
                ?>
            </div>
    </form>
    <script type="text/javascript">
    if(<?php if($_SESSION['purchase']){echo 1;}?>){
    if(<?php if($_SESSION['purchase']!= $row['mess_name']){echo 1;}?>){
        var c = 0 ;
    }else{
    var c = 1 ;
}}else{
    var c = 1;
}
// document.querySelector('body').addEventListener('onload',pop);
// document.querySelector('close').addEventListener('onclick',pop);

function pop(){
  if(c == 0){
    document.getElementById("box").style.display = "block";
  c=1;
  }else{
    document.getElementById("box").style.display = "none";
  c=0;
  }
}
</script>
</body>

</html>