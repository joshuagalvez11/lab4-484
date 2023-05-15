<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/lab4.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Login</title>
</head>
<body>

    <form id="register"
    action="./php/register.php"
    method="post">    
        <label><br>Email Plss</br></label>
        <input id="r_email" name="r_email" type="text" placeholder="Email@email.com">
        <h2 class="err-false" id="r_email-err">Not a valid email</h2>
        <br>
        <label><br>Password</br></label>
        <input id="r_p1" name="r_p1" type="password" placeholder="Enter Password">
        <br>
        <label><br>Re enter Password</br></label>
        <input id="r_p2" name="r_p2" type="password" placeholder="Enter Password" >
        <h2 class="err-false" id="r_pm-err">Password do not match</h2>
        <h2 class="err-false" id="r_pl-err">Password not between 8-12 chars</h2>
        <h2 class="err-false" id="r_pc-err">Password does not have uppercase, lowercase and digit</h2>
        <br>
        <button type="submit" id="registerBtn">Register</button>
    </form>

    <br>
    <br>
    <br>

    <form id="login"
    action="php/login.php"
    method="post">
        <label><br>Email</br></label>
        <input id="l_email" name="l_email" type="text" placeholder="Email@email.com">
        <h2 class="err-false" id="l_email-err">Not a valid email</h2>
        <br>
        <label><br>Password</br></label>
        <input id="l_pass" name="l_pass"  type="password" placeholder="Enter Password">
        <h2 class="err-false" id="l_p-err">Password must enter</h2>
        <br>
        <button type="submit" id="loginBtn">Login</button>
    </form>


</body>
<!-- <script src="./script.js"></script> -->

<!-- <script src="./assets/js/index.js"></script> -->
</html>

