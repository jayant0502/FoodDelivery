<?php 
require_once '../controller/autoController.php'; 
// define('DB_HOST' , 'localhost');
// define('DB_USER' , 'root');
// define('DB_PASS' , '');
// define('DB_NAME' , 'menu_pages');


$errors_adm = array();
$mess_name = "";
$mess_desc = "";
$mess_price = "";
$lunch = "";
$breakfast = "";
$dinner = "";
$serv1 = "";
$serv2 = "";
$serv3 = "";
$serv4 = "";
$serv5 = "";
$serv6 = "";
$serv7 = "";
// $mess_img = "";
if(isset($_POST['reg_sub'])){
    
    $dinner =  $_POST['dinner'];
    $mess_name = $_POST['mess_name'];
    $mess_desc = $_POST['mess_desc'];
    $mess_price = $_POST['mess_price'];
    $lunch = $_POST['l_input'];
    $breakfast = $_POST['breakfast_menu'];
    $serv1 = $_POST['serv1'];
    $serv2 = $_POST['serv2'];
    $serv3 = $_POST['serv3'];
    $serv4 = $_POST['serv4'];
    $serv5 = $_POST['serv5'];
   if(!empty($_POST['serv6'])){ $serv6 = $_POST['serv6']; }
   if(!empty($_POST['serv7'])){ $serv6 = $_POST['serv7']; }
    if(empty($mess_name)){
        $errors_adm['mess_name'] = "Name is required";
    } 
    if(empty($mess_desc)){
        $errors_adm['mess_desc'] = "Description is required";
    }
    $mess_chk = "SELECT * FROM registered_tc WHERE mess_name=? LIMIT 1";
$stmt = $conn->prepare($mess_chk);
$stmt->bind_param('s', $mess_name);
$stmt->execute();
$result = $stmt->get_result();
$userCount = $result->num_rows;

if($userCount > 0)
{
     $errors_adm['mess_failed'] = "Mess Already Exist";
}
if(count($errors_adm) == 0){
    // $password = password_hash($password1 ,PASSWORD_DEFAULT);
    // $token = bin2hex(random_bytes(20));
    // $sql = "INSERT INTO registered_tc ( username , mess_name , mess_desc ) VALUES ('$_SESSION[username]' , $mess_name , $mess_desc ) ";
    // $sql_run = mysqli_query($conn,$sql);
    // $sql = " INSERT INTO menu (username , mess_price , breakfast , lunch , dinner , serv1 , serv2 , serv3 , serv4 , serv5 , serv6 , serv7 ) VALUES ('$_SESSION[username]' , $mess_price , $breakfast , $lunch , $dinner , $serv1 , $serv2 , $serv3 , $serv4 , $serv5 , $serv6 , $serv7  ) ";
    // $sql_run = mysqli_query($conn,$sql);

    $sql = " INSERT INTO registered_tc ( username , mess_name , mess_desc ) VALUES (? , ? , ? ) ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $_SESSION['username'] , $mess_name , $mess_desc);
    $stmt->execute();
    $sql = " INSERT INTO menu ( username , mess_price , breakfast , lunch , dinner , serv1 , serv2 , serv3 , serv4 , serv5 , serv6 , serv7 ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?) ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssssssss', $_SESSION['username'] , $mess_price , $breakfast , $lunch , $dinner , $serv1 , $serv2 , $serv3 , $serv4 , $serv5 , $serv6 , $serv7 );
    

    if($stmt->execute()){
    $_SESSION['mess_name'] = $mess_name;
    $_SESSION['mess_desc'] = $mess_desc;
    $_SESSION['mess_price'] = $mess_price;
    $_SESSION['lunch'] = $lunch;
    $_SESSION['breakfast'] = $breakfast;
    $_SESSION['dinner'] = $dinner;
    $_SESSION['serv1'] = $serv1;
    $_SESSION['serv2'] = $serv2;
    $_SESSION['serv3'] = $serv3;
    $_SESSION['serv4'] = $serv4;
    $_SESSION['serv5'] = $serv5;
    $_SESSION['serv6'] = $serv6;
    $_SESSION['serv7'] = $serv7;
    header('location:panel.php');
    exit();
 }else{
    $errors_adm['db_error']="DATABASE ERROR : FAILED TO REGISTER";
}
}
}


if(isset($_POST['reg_updt'])){
    $sql = "UPDATE registered_tc SET   mess_name = '$_POST[mess_name]' , mess_desc = '$_POST[mess_desc]'  WHERE username ='$_SESSION[username]' ";
    $sql_run = mysqli_query($conn,$sql);
    $sql = "UPDATE menu SET   mess_price = '$_POST[mess_price]' ,  breakfast = '$_POST[breakfast_menu]' , lunch = '$_POST[l_input]'   , dinner = '$_POST[d_input]' , serv1 = '$_POST[serv1]' , serv2 = '$_POST[serv2]' , serv3 = '$_POST[serv3]' , serv4 = '$_POST[serv4]' , serv5 = '$_POST[serv5]', serv6 = '$_POST[serv6]' , serv7 = '$_POST[serv7]' WHERE username ='$_SESSION[username]' ";
    $sql_run = mysqli_query($conn,$sql);
    if($sql_run){
        $dinner =  $_POST['d_input'];
    $mess_name = $_POST['mess_name'];
    $mess_desc = $_POST['mess_desc'];
    $mess_price = $_POST['mess_price'];
    $lunch = $_POST['l_input'];
    $breakfast = $_POST['breakfast_menu'];
    $serv1 = $_POST['serv1'];
    $serv2 = $_POST['serv2'];
    $serv3 = $_POST['serv3'];
    $serv4 = $_POST['serv4'];
    $serv5 = $_POST['serv5'];
    $serv6 = $_POST['serv6'];
    $serv7 = $_POST['serv7'];
    $_SESSION['mess_name'] = $mess_name;
    $_SESSION['mess_desc'] = $mess_desc;
    $_SESSION['mess_price'] = $mess_price;
    $_SESSION['lunch'] = $lunch;
    $_SESSION['breakfast'] = $breakfast;
    $_SESSION['dinner'] = $dinner;
    $_SESSION['serv1'] = $serv1;
    $_SESSION['serv2'] = $serv2;
    $_SESSION['serv3'] = $serv3;
    $_SESSION['serv4'] = $serv4;
    $_SESSION['serv5'] = $serv5;
    $_SESSION['serv6'] = $serv6;
    $_SESSION['serv7'] = $serv7;
        echo '<script type="text/javascript">alert("DATABASE UPDATED");</script>';
        header('location:panel.php');
    exit();
    }else{
        echo '<script type="text/javascript">alert("UPDATION FAILED");</script>';
    }
}

?>
