<?php
@include 'dbconnect.php';

// Fetch categories from the database
$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Handle the error, for now, let's assume an empty array
    $categories = array();
}

// Fetch items and their prices from the database
$itemQuery = "SELECT DISTINCT item_name, item_price FROM items";
$itemResult = mysqli_query($conn, $itemQuery);

// Check if the query was successful
if ($itemResult) {
    $items = mysqli_fetch_all($itemResult, MYSQLI_ASSOC);
} else {
    // Handle the error, for now, let's assume an empty array
    $items = array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donualk Order Page</title>
    <style>
        /* Your existing styles here */
    </style>
</head>
<body>
    <header>
        <h1>Donutalk Order Page</h1>
    </header>

    <section>
        <div id="cat_name" class="step">
            <h2>Choose Category</h2>
            <select name="cat_name">
                <?php foreach ($categories as $category): ?>
                    <option value='<?php echo $category['cat_name']; ?>'>
                        <?php echo $category['cat_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div id="item_name" class="step">
            <h2>Choose Donut</h2>
            <select name="item_name" id="itemSelect" onchange="updateTotalAmount()">
                <?php foreach ($items as $item): ?>
                    <option value='<?php echo $item['item_price']; ?>'>
                        <?php echo $item['item_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </section>

    <section>
        <div id="totalAmount">Total Amount: ₱0.00</div>
        <button onclick="proceedToCheckout()"><a href= "payment.php">Proceed to Checkout</a></button>
        <a href= "payment.php"></a>
    </section>

    <script>
        function updateTotalAmount() {
            var selectedItemPrice = document.getElementById("itemSelect").value;
            document.getElementById("totalAmount").innerText = "Total Amount: ₱" + selectedItemPrice;
        }

        function proceedToCheckout() {
            // Implement your checkout logic here
        }
    </script>
</body>
</html>
