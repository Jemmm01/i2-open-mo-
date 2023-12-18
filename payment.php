<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "donutalk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Your existing PHP code for handling the payment completion
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Handle form submission here
    // You can access form data using $_POST['name'], $_POST['email'], etc.
    // Implement your logic for handling payment completion
    // Proceed to the next page or handle payment completion logic

    // For demonstration purposes, let's just redirect to a confirmation page
    header("Location: orderedsuccessfully.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donualk Payment Page</title>
    <style>
        /* Your existing CSS styles */
        body {
            font-family: system-ui;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        /* Add any additional styling if needed for PHP dynamic content */
    </style>
</head>
<body>
    <header>
        <h1>Donualk Payment Page</h1>
    </header>

    <section>
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{11}" title="Please enter a valid 11-digit phone number" required>

            <label for="address">Delivery Address:</label>
            <textarea id="address" name="address" rows="3" required></textarea>

            <label for="paymentMethod">Payment Method:</label>
            <select id="paymentMethod" name="paymentMethod">
                <option value="cashOnDelivery">Cash on Delivery</option>
            </select>

            <div id="totalAmount">Total Amount: ₱0.00</div>

            <button type="submit">Complete Payment</button>
        </form>
    </section>

    <script>
        // Your existing JavaScript code for donut selection and total amount calculation
        // This script can be modified if you need to interact with PHP variables

        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const totalAmount = urlParams.get('totalAmount') || '0.00';
            document.getElementById('totalAmount').textContent = `Total Amount: ₱${totalAmount}`;
        });
    </script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
