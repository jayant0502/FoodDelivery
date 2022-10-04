<?php require '../controller/autoController.php'; ?>
<?php require_once 'panelController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rasoda.in | Customer Details</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/navbar.css">
</head>

<body>
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


    <?php
    if(!isset($_SESSION['mess_name'])){
        echo "<div class=\"failed_list\"><h1 >SORRY , NO CUSTOMER YET.</h1></div>";
    }else{
    // $conn_ = mysqli_connect("localhost", "root", "", "tiffincentre");
    $menu = "SELECT customer.* , users.fname , users.lname FROM customer INNER JOIN users ON customer.email = users.email  WHERE  mess_name like '%" . $_SESSION['mess_name'] . "%'";
    $output = $conn->query($menu);
    if ($output->num_rows > 0) {
        echo "<table class=\"table table-dark table-striped customer_table\">
            <thead>
              <tr>
                <th scope=\"col\">#</th>
                <th scope=\"col\">Name</th>
                <th scope=\"col\">Email</th>
                <th scope=\"col\">Address</th>
                <th scope=\"col\">City</th>
              </tr>
            </thead>
            <tbody>";
            $i = 1;
        while ($row = $output->fetch_assoc()) {
            echo "<tr>
                    <th scope=\"row\">" . $i . "</th>
                    <td>" . $row['fname'] . " " . $row['lname'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['address'] . "</td>
                    <td>" . $row['city'] . " </td>
                    </tr>";
                    $i++ ;
        }
        echo " </tbody>
         </table>";
    }else{
        echo "<div class=\"failed_list\"><h1 >SORRY , NO CUSTOMER YET.</h1></div>";
    }}
    ?>





</body>

</html>