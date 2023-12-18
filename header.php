<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: system ui;
        text-decoration: none;
        color: black;
    }

    html {
        font-size: 62.5%;
    }

    header {
        background-color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 50px;
        padding: 0 20px;
        box-shadow: 1px 1px 1px 1px lightgrey;
    }

    header a {
        position: relative;
        font-size: 2rem;
    }

    header a#logo-link {
        display: flex;
        align-items: center;
    }

    header #logo-link img {
        width: 80px;
        height: 80px;
        margin-right: 10px;
    }

    #logo-text {
        font-size: 1.5rem;
        font-weight: bold;
    }

    #main_tabs {
        display: block;
        align-items: center;
    }

    header #main_tabs a {
        margin-left: 1em;
    }

    header a span {
        position: absolute;
        width: 20px;
        height: 20px;
        top: -30%;
        right: -30%;
        background-color: black;
        color: white;
        border-radius: 50%;
        font-size: 1.5rem;
        padding: .2em;
        text-align: center;
    }
</style>

<body>
    <header>
        <a id="logo-link" href="home.php">
            <img src="logo.gif" alt="Your Logo" class="logo-img">
            <div id="logo-text">DONUTALK</div>
        </a>
        <div id="main_tabs"> <!-- Corrected syntax for id attribute -->
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="feedback.php">Feedback</a>
            <a href="trackoder.php">Track Order</a>
            <a href="login.php">Login</a>
            <a href="logout.php" style="color: black; text-decoration: none;">Logout</a>
            <a href="ordersure.php">Shop</a>
        </div>
    </header>
</body>

</html>
