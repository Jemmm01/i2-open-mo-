<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/customization.css">
    <link rel="stylesheet" href="css/userCSS.css">
    <title>Product Customization</title>
    <header class="header">

<div class="flex">

   <a href="#" class="logo">Once</a>

   <nav class="navbar">
      <a href="user_page.php">Home</a>
      <a href="products.php">Products</a>
      <a href="#">Customize</a>
      <a href="cart.php">Cart</a>
      <a href="logout.php" class="logout">logout</a>
   </nav>


</div>

</header>
</head>
<body>

<?php
session_start(); // Start or resume session

// Include the database connection file
include_once 'dbconnect.php';


// Process form data on form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process data from each step
    $step1Data = $_POST["categories"] ?? '';
    $step2Data = $_POST["names"] ?? '';
    $product_quantity = 1; // Assuming a default quantity of 1

    $colorwayPriceQuery = $db->prepare("SELECT cat_price FROM categories WHERE cat_name = :cat_name");
    $colorwayPriceQuery->bindParam(':cat_name', $step2Data);
    $colorwayPriceQuery->execute();
    $colorwayPrice = $colorwayPriceQuery->fetchColumn();


    // Calculate total price
    $totalPrice = $colorwayPrice;

    $stmt = $db->prepare("INSERT INTO cart (categories, names, price) VALUES (:categories, :names, :totalPrice)");
    $stmt->bindParam(':categories', $step1Data);
    $stmt->bindParam(':names', $step2Data);
    $stmt->bindParam(':totalPrice', $totalPrice);
    $stmt->execute();

    // Store data in session variables
    $_SESSION['customization_summary'] = [
        'categories' => $step1Data,
        'names' => $step2Data,
        'totalPrice' => $totalPrice // Optionally store total price in session
    ];

    // Redirect to another page to display the summary
    header("Location: customizeDetails.php");
    exit(); // Stop further execution

    echo "<option value='" . $row['cat_name'] . "' data-price='" . $row['price'] . "'>" . $row['cat_name'] . " - $" . $row['price'] . "</option>";
}
?>


<form id="customizationForm" method="post" action="">
<div id="categories" class="step">
    <h2>Step 1: Choose Category</h2>
    <select name="categories">
        <?php
        // Assuming $db is your database connection
        $query = $db->query("SELECT DISTINCT cat_name FROM categories");
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['cat_name'] . "'>" . $row['cat_name'] . "</option>";
        }
        ?>
    </select>
</div>

<div id="items" class="step">
    <h2>Step 2: Choose Flavor</h2>
    <select name="items">
        <?php
        // Assuming $db is your database connection
        $query = $db->query("SELECT DISTINCT item_name FROM items");
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['item_name'] . "'>" . $row['item_name'] . "</option>";
        }
        ?>
    </select>
</div>

        ?>
       
    </select>
    <button type="submit">Submit</button>
</div>

<div id="totalPrice"></div>

</form>

<script>
    function nextStep(stepId) {
        var currentStep = document.getElementById(stepId);
        currentStep.style.display = "none";

        var nextStep = document.getElementById(stepId.substr(0, 5) + (parseInt(stepId.charAt(5)) + 1));
        if (nextStep) {
            nextStep.style.display = "block";
        } else {
            document.getElementById("customizationForm").submit();
        }
    }
</script>


<script src="js/customize.js"></script>

</body>
</html>