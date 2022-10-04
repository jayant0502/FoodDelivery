<?php require_once 'controller/autoController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="style.css" rel="stylesheet">
    <title>LogIn | Rasoda.in</title>
</head>

<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    <form method="post" action="login.php">
    <?php if(count($errors) > 0): ?>
        <div>
        <?php foreach($errors as $error): ?>
        <li><?php echo $error; ?></li>
        <?php endforeach; ?>
        </div>
        <?php endif; ?>    
    <div class="input-groups">
            <label >Username</label>
            <input type="text" name="username">
        </div>
        
        <div class="input-groups">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        
        <p>Not a member yet? <a href="register.php">Register</a></p>
        <div class="input-groups">
        <button type="submit" name="login-btn" >Register</button>        
    </div>

    </form>
</body>

</html>