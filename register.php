<?php
if (isset($_POST["submit"])) {
    $user_fullname = $_POST['firstName'];
    $username = $_POST['username']; 
    $password = $_POST['password'];
    $user_email_address = $_POST['email'];
    $user_contact_number = $_POST['number'];
    $user_address = $_POST['address'];

    include_once "dbconnect.php"; 

    if ($conn) {
        $stmt = $conn->prepare("INSERT INTO users (user_fullname, username, password, user_email_address, user_contact_number, user_address) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssis", $user_fullname, $username, $password, $user_email_address, $user_contact_number, $user_address);
        $execval = $stmt->execute();
        
        if ($execval) {
            echo "Registration successfully...";
        } else {
            echo "Error during registration: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Database connection error.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
</head>
<body>
<div class="container">
    <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <h1>Registration Form</h1>
            </div>
            <div class="panel-body">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <label for="firstName">Full Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName"/>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"/>
                    </div>
                    <div class="form-group">
                        <label for="number">Phone Number</label>
                        <input type="number" class="form-control" id="number" name="number"/>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address"/>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" />
                </form>
            </div>
            <div class="panel-footer text-right">
                <small>&copy; Technical Babaji</small>
            </div>
        </div>
    </div>
</div>
</body>
</html>
