<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Login Form HTML CSS | CodingNepal</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Font Awesome CDN link for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    padding: 15px;
    overflow: hidden;
}

.wrapper {
    max-width: 500px;
    width: 100%;
    background: #fff;
    border-radius: 5px;
    box-shadow: 0px 4px 10px 1px rgba(0, 0, 0, 0.1);
}

.wrapper .title {
    height: 120px;
    background: #82ae46;
    border-radius: 5px 5px 0 0;
    color: #fff;
    font-size: 30px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
}

.wrapper form {
    padding: 25px 35px;
}

.wrapper form .row {
    height: 60px;
    margin-top: 15px;
    position: relative;
}

.wrapper form .row input {
    height: 100%;
    width: 100%;
    outline: none;
    padding-left: 70px;
    border-radius: 5px;
    border: 1px solid lightgrey;
    font-size: 18px;
    transition: all 0.3s ease;
}

form .row input:focus {
    border-color: #82ae46;
}

form .row input::placeholder {
    color: #999;
}

.wrapper form .row i {
    position: absolute;
    width: 55px;
    height: 100%;
    color: #fff;
    font-size: 22px;
    background: #82ae46;
    border: 1px solid #82ae46;
    border-radius: 5px 0 0 5px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.wrapper form .pass {
    margin-top: 12px;
}

.wrapper form .pass a {
    color: #82ae46;
    font-size: 17px;
    text-decoration: none;
}

.wrapper form .pass a:hover {
    text-decoration: underline;
}

.wrapper form .button input {
    margin-top: 20px;
    color: #fff;
    font-size: 20px;
    font-weight: 500;
    padding-left: 0px;
    background: #82ae46;
    border: 1px solid #82ae46;
    cursor: pointer;
}

form .button input:hover {
    background: #12876f;
}

.wrapper form .signup-link {
    text-align: center;
    margin-top: 45px;
    font-size: 17px;
}

.wrapper form .signup-link a {
    color: #82ae46;
    text-decoration: none;
}

form .signup-link a:hover {
    text-decoration: underline;
}
</style>

<body>
    <div class="wrapper">
        <div class="title"><span>Login</span></div>
        <form action="#">
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Email or Phone" required />
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" required />
            </div>
            <div class="pass"><a href="#">Forgot password?</a></div>
            <div class="row button">
                <input type="submit" value="Login" />
            </div>
            <div class="signup-link">Not a member? <a href="#">Signup now</a></div>
        </form>
    </div>
</body>

</html>