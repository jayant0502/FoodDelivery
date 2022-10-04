<?php require_once 'controller/autoController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Register | Rasoda.in</title>
</head>

<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    <form method="post" action="register.php">
        <?php if(count($errors) > 0): ?>
        <div>
        <?php foreach($errors as $error): ?>
        <li><?php echo $error; ?></li>
        <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <div class="input-groups">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-groups">
            <label>E-mail</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-groups">
            <label>Password</label>
            <input type="text" name="password1">
        </div>
        <div class="input-groups">
            <label>Confirm Password</label>
            <input type="text" name="password2">
        </div>
        <p>Already a member? <a href="login.php">LogIn</a></p>
        <div class="input-groups">
            <button type="submit" name="register-btn">Register</button>
        </div>

    </form>
</body>

</html>