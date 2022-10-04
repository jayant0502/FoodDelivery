<?php require_once '../controller/autoController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/navbar.css">
    <title>Rasoda.in</title>
 <style>
     
    .form-div{
    margin: 50px auto 50px;
    padding: 25px 15px 10px 15px;
    border: 1px solid #80ced7;
    border-radius : 5px;
    font-size:1.1em;
    width: 40%;
    font-family: var(--bs-font-sans-serif);
}
.container-up{
    margin: 150px auto;
}
.form-control:focus{
    box-shadow: none;
}
form p{
    font-size: .89em;
}
.form-div.login{
    margin-top:100px;
}
 
 </style>

</head>

<body>
<header>
        <a href="../index.php" class="logo">Rasoda.In </a>
        
    </header>
<form action="up.php" method="get">
    <div class="container-up">
        <div class="row">
            <div class=" form-div login">
                <div class="alert alert-success">
                You are logged in!
                </div>
                <h3> <strong>Welcome, <?php echo ucwords($_SESSION['fname']); ?>.</strong> </h3>
                <h4>Thanks For Visiting!</h4> <br>
                <?php
   if (isset($_SESSION['id'])) {
    // $conn_4 = mysqli_connect("localhost", "root", "", "customer_purchase");
    $menu4= "SELECT * FROM customer WHERE  email like '%".$_SESSION['email']."%'";
    $output4 = $conn->query($menu4);
    $menu= "SELECT mess_price FROM purchase WHERE  email like '%".$_SESSION['email']."%'";
    $output = $conn->query($menu);
    $fetch_p = $output->fetch_assoc(); 
    if ($output4->num_rows > 0) {
        echo "<table class=\"table table-dark table-striped customer_table\">
            <thead>
              <tr>
                <th scope=\"col\">#</th>
                <th scope=\"col\">Name</th>
                <th scope=\"col\">Price</th>
                <th scope=\"col\">Expire</th>
                <th scope=\"col\">Actions</th>
                
              </tr>
            </thead>
            <tbody>";
        while ($fetch = $output4->fetch_assoc()) {
            $i = 1;
            $expires = strtotime('+30 days', strtotime($fetch['reg_date']));
            echo "<tr>
                    <th scope=\"row\">" . $i . "</th>
                    <td> " . ucwords($fetch['mess_name']) . "</td>
                    <td>" . ucwords($fetch_p['mess_price']) . "</td>
                    <td>" . date('d-m-Y ', $expires). "</td>
                    <td> <span><form action=\"up.php\" method=\"GET\">"; 
                    
                    echo "<button type=\"submit\" class=\"btn-danger\" name=\"delete_mess\" >DELETE</button> </span></form> </td>
                    
                    </tr>";
                    $i++;
        }
        echo " </tbody>
         </table>";
   }}
    ?>
               <span>  <button type="submit" class="btn-primary" name="logout" >Logout</button>  </span>
               
            
               <span>  <button type="submit" class="btn-primary" name="home" >Home</button> </a> </span>
            </div>
        </div>
    </div>
    </form>
</body>

</html>