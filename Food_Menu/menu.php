<?php
require_once '../controller/autoController.php';
if (!isset($_SESSION['id'])) {
    header('location:../login/login.php');
    exit();
}
if ($_SESSION['type'] == "Supplier") {
    header('location:../admin/panel.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="menu_style.css">
    <link rel="stylesheet" href="../style/navbar.css">
    <title>Rasoda.in | Menu</title>
</head>

<body>
    <header>
        <a href="../index.php" class="logo">Rasoda.In</a>
        <form action="menu.php" method="get">
            <button type="submit" name="user1" class="autho"> <?php if (!isset($_SESSION['id'])) {
                                                                    echo 'Login/Register';
                                                                } else {
                                                                    echo $_SESSION['username'];
                                                                } ?> </button> </form>


    </header>
    <div class="wrapper">
        <div class="title">
            <h4><span></span>our menu </h4>
        </div>
        <div class="menu" id="cont_wrap">
            <?php
            $_SESSION['purchase'] = 0;
            $menu = "SELECT * FROM registered_tc  INNER JOIN menu ON registered_tc.username = menu.username";
            $output = $conn->query($menu);

            if ($output->num_rows > 0) {
                while ($row = $output->fetch_assoc()) {
                    $i = mt_rand(1, 5);
                    echo " <div class=\"single-menu\">";
                    if ($i == 1) {
                        echo "<img src=\"https://cdn.pixabay.com/photo/2017/01/07/20/40/candy-1961536_960_720.jpg\" >";
                    }
                    if ($i == 2) {
                        echo "<img src=\"https://cdn.pixabay.com/photo/2017/01/11/11/33/cake-1971552_960_720.jpg\" >";
                    }
                    if ($i == 3) {
                        echo "<img src=\"https://cdn.pixabay.com/photo/2017/05/07/08/56/pancakes-2291908_960_720.jpg\" >";
                    }
                    if ($i == 4) {
                        echo "<img src=\"https://cdn.pixabay.com/photo/2017/12/09/08/18/pizza-3007395_960_720.jpg\" >";
                    }
                    if ($i == 5) {
                        echo "<img src=\"https://images.pexels.com/photos/1095550/pexels-photo-1095550.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260\" >";
                    }
                    echo "<div class=\"menu-content\">";
                    echo "<h4>";
                    echo ucwords($row['mess_name']);
                    echo "</h4>";
                    echo "<ul>";
                    echo "<li> <span>";
                    echo $row['mess_price'];
                    echo "₹/month</span></li>";
                    echo "<li><p>";
                    echo ucfirst($row['mess_desc']);
                    echo "</p></li>";
                    echo "<form method=\"POST\" action=\"../section_menu/section_menu.php\">";
                    echo "<input type=\"hidden\" name=\"window\" value=\"" . $row['mess_name'] . "\">";
                    $sold = "SELECT * FROM customer WHERE  email like '%" . $_SESSION['email'] . "%'";
                    $sold_O = $conn->query($sold);
                    if ($sold_O->num_rows > 0) {
                        $row4 = $sold_O->fetch_assoc();
                        if ($row['mess_name'] == $row4['mess_name']) {
                            $_SESSION['purchase'] = $row['mess_name'];
                            
                            echo "<div class=\"d-inline p-2 bg-warning mr-2 text-white\">Purchased</div>";
                        }
                    }
                    echo "<button type=\"submit\" name=\"mess\" class=\"btn btn-info\">See More</button></form>";

                    echo "</div></div>";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>