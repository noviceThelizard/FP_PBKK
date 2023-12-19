<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body, html {
            margin: 0;
            height: 100%;
        }
        @font-face {
            font-family: 'Princess';
            src: url('KelmscottRomanNF.ttf');
        }
        .hero {
            display: flex;
            justify-content: center;
            height: 96px;
            width: 50vw;
            background-color: #cdcdcd;
            font-family: Princess;
            font-size: 2em;
            position: absolute;
            left: 25vw;
        }
        .hero p, h1, h2, h3, h4, span, a{
            margin: 24px 8px;
        }
        .hero a{
            cursor: pointer;
            color: rgb(0,0,196);

        }

        .playfield {
            height: 256px;
            width: 512px;
            position: absolute;
            top: 20vh;
            left: 34vw;
            background-color: #808080;
        }
        .playfield span, form{
            position: relative;
            top: 45%;
            left: 40%;
        }
        .logon {
            position: absolute;
            z-index: 2;
            height: 100%;
            width: 100%;
            background-color: #454545;
        }
        .logon h1, span{
            position: relative;
            top: 10vh;
            left: 30vw;
            height: 512px;
            width: 512px;
            background-color: #808080;
            border: solid 5px #161616;
        }
        .logon input {
            font-family: Princess;
            background-color: #8FADBF;
            border: solid #161616;
            color: #161616;
            padding: 10px 16px;
            text-align: center;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- <div class="hero">
        <span>logo</span>
        <a>Home</a>
        <a>faqs</a>
        <a>about</a>
    </div> -->
    <div class="logon">
        <h1>
            <form method="POST" action="login.php">
                <input type="text" placeholder="username" name="user">
                <br><input type="text" placeholder="password" name="pass">
                <br><input type="submit" value="Login" name="login">
                <br><input type="submit" value="Register" name="register">
            </form>
        </h1>
    </div>
    <div class="playfield">
        <span id="x">x</span>
        <span id="operator">+</span>
        <span id="y">y</span>
        <span> = </span>
        <form method="POST" action="answer.php">
            <input type="text" name="answer">
            <br><input type="submit" value="Submit">
        </form>
    </div>
    <div class="score"></div>
</body>
</html>


<!--php script-->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fp_database";
// create connection
$conn = mysqli_connect($servername, $username, $password);
// check for connection
if (!$conn) {
    die("Connection Failed" . mysqli_connect_error());
}
// echo "machine spirit connected";

$sqlDB = "CREATE DATABASE IF NOT EXISTS fp_db";
if (mysqli_query($conn, $sqlDB)) {
    // echo "Database created successfully";
    mysqli_query($conn,"USE fp_db");
} else {
    // echo "Error creating database: " . mysqli_error($conn);
}


$sqlTR = "CREATE TABLE IF NOT EXISTS account (
    id INT PRIMARY KEY,
    uname VARCHAR(64),
    upass VARCHAR(16),
    score INT
    )";

if (mysqli_query($conn, $sqlTR)) {
    // echo "Table created";
    } else {
    // echo "Error creating table: " . mysqli_error($conn);
}



mysqli_close($conn);
?>

