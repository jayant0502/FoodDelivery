<?php require_once '../controller/autoController.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../style/navbar.css">
  <title>Rasoda.in | <?php echo  ucwords($_SESSION['payment1']);?> Checkout</title>
  <style>
    body {
      font-family: Arial;
      font-size: 17px;
      padding: 8px;
      background: url('back.png') center center/cover;
    }

    * {
      box-sizing: border-box;

    }

    .row {
      display: -ms-flexbox;
      /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap;
      /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
    }

    .col-25 {
      -ms-flex: 25%;
      /* IE10 */
      flex: 25%;
    }

    .col-50 {
      -ms-flex: 50%;
      /* IE10 */
      flex: 50%;
    }

    .col-75 {
      -ms-flex: 75%;
      /* IE10 */
      flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }

    .container-chk {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
      margin-top: 120px;
    }

    input[type=text] ,
    select{
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #4CAF50;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    a {
      color: #2196F3;
    }

    hr {
      border: 1px solid lightgrey;
    }

    span.price {
      float: right;
      color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }

      .col-25 {
        margin-bottom: 20px;
      }
      
    }
    
  </style>
</head>

<body>
  <header>
    <a href="../index.php" class="logo">Rasoda.In</a>




    <form action="section_checkout.php" method="get">
      <button type="submit" name="user1" class="autho"> <?php if (!isset($_SESSION['id'])) {
                                                          echo 'Login/Register';
                                                        } else {
                                                          echo $_SESSION['username'];
                                                        } ?> </button> </form>


  </header>
  <div class="row">
    <div class="col-75">
      <div class="container-chk">
        <form action="section_checkout.php" method="POST">

          <div class="row">
            <div class="col-50">
              <h3>Billing Address</h3>
              <div ><label for="fname"><i class="fa fa-user"></i> First Name</label>
              <input type="text" id="fname" name="firstname" placeholder="<?php echo $_SESSION['fname'];?>" value="<?php echo $_SESSION['fname'];?>"  readonly>
              <label for="lname"><i class="fa fa-user"></i> Last Name</label>
              <input type="text" id="lname" name="lastname" placeholder="<?php echo $_SESSION['lname'];?>" value="<?php echo $_SESSION['lname'];?>" readonly>
            </div>
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" name="user_email" placeholder="<?php echo $_SESSION['email'];?>" value="<?php echo $_SESSION['email'];?>" readonly>
              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" id="adr" name="address" placeholder="Shipping address same as billing" required>
              <label for="city"><i class="fa fa-institution"></i> City</label>
              <select id="city" name="city" required>
                <option value="Indore">Indore</option>
              </select>
              <div class="row">
                <div class="col-50">
                  <label for="state">State</label>
                  <select id="state" name="state"  required>
                  <option value="Madhya Pradesh">Madhya Pradesh</option>
              </select>
                </div>
                <div class="col-50">
                  <label for="zip">Zip</label>
                  <input type="text" id="zip" name="zip"  required>
                
                </div>
              </div>
            </div>

            <div class="col-50">
              <h3>Payment</h3>
              <label for="fname">Accepted Cards</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname" placeholder="" required>
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="cardnumber"  required>
              <label for="expmonth">Exp Month</label>
              <select name="expmonth" id="expmonth">
              <?php for($i=1;$i<=12;$i++){
              echo "<option value=\"".$i."\">".$i."</option>";
            }
              ?></select>
              <!-- <input type="text" id="expmonth" name="expmonth"  required> -->
              <div class="row">
                <div class="col-50">
                  <label for="expyear">Exp Year</label>
                  <input type="text" id="expyear" name="expyear"  required>
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv"  required>
                </div>
              </div>
            </div>

          </div>
          <input type="hidden" name="mess_checkout_name" value="<?php echo $_SESSION['payment1']; ?>">
          <input type="hidden" name="mess_checkout_price" value="<?php echo $_SESSION['payment1total']; ?>">
          <input type="submit" value="Continue to checkout" name="checkout" class="btn">
        </form>
      </div>
    </div>
    <div class="col-25">
      <div class="container-chk">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>1</b></span></h4>
        <p><?php echo ucwords($_SESSION['payment1']) ; ?> <span class="price">₹<?php echo $_SESSION['payment1total']; ?></span></p>

        <hr>
        <p>Total <span class="price" style="color:black"><b>₹<?php echo $_SESSION['payment1total']; ?></b></span></p>
      </div>
    </div>
  </div>

</body>

</html>