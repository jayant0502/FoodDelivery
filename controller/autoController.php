<?php 

session_start();
// require '../config/db.php';
define('DB_HOST' , 'localhost');
define('DB_USER' , 'root');
define('DB_PASS' , '');
define('DB_NAME' , 'community');
$conn = new mysqli(DB_HOST , DB_USER , DB_PASS , DB_NAME);

if($conn->connect_error) {
    die('Database error:' . $conn->connect_error);
}

$errors = array();
$fname= "";
$lname= "";
$mnum= "";
$type= "";
$gender= "";
$username = "";
$email = "";
if(isset($_POST['reg_nxt'])){
    $type = $_POST['au'];
    $_SESSION['local'] = $type ;
    header('location: register.php');

    
}

if(isset($_POST['register-btn'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $mnum =$_POST['mnum'];
    $gender =$_POST['gender'];
    $typ_temp = $_SESSION['local'] ;
    if(empty($fname)){
        $errors['fname'] = "First name is required";
    }
    if(empty($lname)){
        $errors['lname'] = "Last name is required";
    }
    if(empty($username)){
        $errors['username'] = "Username is required";
    }
    if(empty($mnum)){
        $errors['mnum'] = "Mobile No. is required";
    }
    // if(empty($gender)){
    //     $errors['username'] = "Username is required";
    // }
    if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Invalid Email";
    }
    if(empty($email)){
         $errors['email'] = "Email is required";
    }
    if(empty($password1)){
        $errors['password'] = "Password is required"; 
    }
    
    if($password1 != $password2){
        $errors['password'] = "Password Doesn't Match"; 
    }
$emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
$stmt = $conn->prepare($emailQuery);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$userCount = $result->num_rows;

if($userCount > 0)
{
     $errors['email'] = "Email Already Exist";
}
if(count($errors) == 0){
    $password = password_hash($password1 ,PASSWORD_DEFAULT);
    $sql = "INSERT INTO users ( fname , lname ,  username , mnum   , gender , type , email , password ) VALUES (? , ?  , ? , ? , ? , ? , ? , ?) ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssss',$fname , $lname , $username , $mnum , $gender , $typ_temp , $email , $password);
    if($stmt->execute()){
        $user_id = $conn->insert_id;
        $_SESSION['id'] = $user_id;
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['username'] = $username;
        $_SESSION['mnum'] = $mnum;
        $_SESSION['gender'] = $gender;
        $_SESSION['type'] = $typ_temp;
        $_SESSION['email'] = $email;
        $_SESSION['message'] = "You are logged in!";
       
        
        if($_SESSION['type'] == "Supplier"){
            header('location:../admin/panel.php');
            exit();
        }else{
            header('location:../food_menu/menu.php');
            exit();
        }
            
        
    } else{
        $errors['db_error']="DATABASE ERROR : FAILED TO REGISTER";
    }

}

}

//LOgin

if(isset($_POST['login-btn'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username)){
        $errors['username'] = "Username is required";
    }
    
    
    if(empty($password)){
        $errors['password'] = "Password is required"; 
    }
    if(count($errors) === 0){

        $sql = "SELECT * FROM users WHERE  username= ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s' , $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        
        
        if( password_verify($password , $user['password'])){
            $_SESSION['id'] = $user['id'];
            $_SESSION['type'] = $user['type'];
            $_SESSION['fname'] = $user['fname'];
            $_SESSION['lname'] = $user['lname'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            if( $_SESSION['type'] == "Supplier"){
                
                $sql1 = " SELECT * FROM  registered_tc  WHERE  username like '%".$_SESSION['username']."%' LIMIT 1";
                $stmt1 = $conn->query($sql1);
                $tc_fetch = $stmt1->fetch_assoc();
                $sql2 = " SELECT * FROM  menu  WHERE  username like '%".$_SESSION['username']."%' LIMIT 1";
                $stmt2 = $conn->query($sql2);
               
                if( $tc_menu_fetch = $stmt2->fetch_assoc()){
                $_SESSION['mess_name'] = $tc_fetch['mess_name'];
                $_SESSION['mess_desc'] = $tc_fetch['mess_desc'];
                $_SESSION['mess_price'] = $tc_menu_fetch['mess_price'];
                $_SESSION['breakfast'] = $tc_menu_fetch['breakfast'];
                $_SESSION['lunch'] = $tc_menu_fetch['lunch'];
                $_SESSION['dinner'] = $tc_menu_fetch['dinner'];
                $_SESSION['serv1'] = $tc_menu_fetch['serv1'];
                $_SESSION['serv2'] = $tc_menu_fetch['serv2'];
                $_SESSION['serv3'] = $tc_menu_fetch['serv3'];
                $_SESSION['serv4'] = $tc_menu_fetch['serv4'];
                $_SESSION['serv5'] = $tc_menu_fetch['serv5'];
                $_SESSION['serv6'] = $tc_menu_fetch['serv6'];
                $_SESSION['serv7'] = $tc_menu_fetch['serv7'];
                }
            }
            $_SESSION['message'] = "You are logged in!";
            $_SESSION['alert-class'] = "alert-success";
            if($_SESSION['type'] == "Supplier"){
                header('location:../admin/panel.php');
                exit();
            }else{
                header('location:../food_menu/menu.php');
                exit();
            }
        }else{
            $errors['login_error']="Wrong Credentials";
            // $errors['login']= $password;
            // $errors['login1']= $user['password'];
        }
    }
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    unset($_SESSION['mess_name']);
    unset($_SESSION['purchase']);
    header('location:../index.php');
    exit();
}

if(isset($_GET['home'])){
    
    header('location:../index.php');
    exit();
}


if(isset($_GET['user'])){
    if(!isset($_SESSION['id'])){
        header('location: login/login.php');
        exit();
    }else{
        header('location: login/up.php');
        exit();
    }
}


if(isset($_GET['user1'])){
    if(!isset($_SESSION['id'])){
        header('location: ../login/login.php');
        exit();
    }else{
        header('location: ../login/up.php');
        exit();
    }
}


if(isset($_POST['checkout'])){
    $error_checkout = array();
    $check_fname = $_POST['firstname'];
    $check_lname = $_POST['lastname'];
    $check_email   = $_POST['user_email'];
    $check_address = $_POST['address'];
    $check_city = $_POST['city'];
    $check_state = $_POST['state'];
    $check_zip = $_POST['zip'];
    $card_name = $_POST['cardname'];
    $card_no = $_POST['cardnumber'];
    $card_exp_month = $_POST['expmonth'];
    $card_exp_year = $_POST['expyear'];
    $card_cvv = $_POST['cvv'];
    $mess_name = $_POST['mess_checkout_name'];
    $mess_price = $_POST['mess_checkout_price'];
    if(empty($check_fname)){
        $error_checkout['check_fname'] = "Username is required";
    }
    if(empty($check_lname)){
        $error_checkout['check_lname'] = "Username is required";
    }
    if(empty($check_email)){
        $error_checkout['check_email'] = "Username is required";
    }
    if(empty($check_address)){
        $error_checkout['check_address'] = "Username is required";
    }
    if(empty($check_city)){
        $error_checkout['check_city'] = "Username is required";
    }
    if(empty($check_state)){
        $error_checkout['check_state'] = "Username is required";
    }
    if(empty($check_zip)){
        $error_checkout['check_zip'] = "Username is required";
    }
    if(empty($card_name)){
        $error_checkout['card_name'] = "Username is required";
    }
    if(empty($card_no)){
        $error_checkout['card_no'] = "Username is required";
    }
    if(empty($card_exp_month)){
        $error_checkout['card_exp_month'] = "Username is required";
    }
    if(empty($card_exp_year)){
        $error_checkout['card_exp_year'] = "Username is required";
    }
    if(empty($card_cvv)){
        $error_checkout['card_cvv'] = "Username is required";
    }

    if(count($error_checkout) == 0){
    $sql = "INSERT INTO purchase (email , name_crd , crd_num , exp_month , exp_year , cvv , mess_price ) VALUES (?,?,?,?,?,?,?) ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssss',$check_email , $card_name , $card_no , $card_exp_month , $card_exp_year ,$card_cvv ,$mess_price);
    $stmt->execute();
    $sql = " INSERT INTO adm_pay_reciept (email , name_crd , crd_num , exp_month , exp_year , cvv , mess_price , mess_name ) VALUES (?,?,?,?,?,?,?,?) ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssss',$check_email , $card_name , $card_no , $card_exp_month , $card_exp_year ,$card_cvv ,$mess_price, $mess_name);
    $stmt->execute();
    $sql = "INSERT INTO customer ( email , address   , city , state , pin_code , mess_name ) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss',$check_email , $check_address , $check_city , $check_state , $check_zip ,$mess_name);
    if($stmt->execute()){
        header('location:../index.php');
        exit();
    }
    
    }
}

if(isset($_GET['delete_mess'])){
    $sql = " DELETE FROM purchase WHERE email like '%".$_SESSION['email']."%' ";
    $sql_run = mysqli_query($conn,$sql);
    $sql = " DELETE FROM customer WHERE email like '%".$_SESSION['email']."%' ";
    $sql_run = mysqli_query($conn,$sql);
    if($sql_run){
        unset($_SESSION['purchase']);
        header('location:../food_menu/menu.php');
        exit();
    }
}