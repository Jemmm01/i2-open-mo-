<?php
require_once 'dbconnect.php';

// Fetch categories from the database
$category_query = mysqli_query($conn, "SELECT * FROM categories");
$categories = [];
while ($category_row = mysqli_fetch_assoc($category_query)) {
    $categories[$category_row['cat_id']] = $category_row['cat_name'];
}

// Fetch all items from the database
$all_items = [];

// Handle form submission for category selection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["cat_id"])) {
        $selectedCategoryId = $_POST["cat_id"];
        
        // Fetch items based on the selected category
        if ($selectedCategoryId == 5 || $selectedCategoryId == 8) {
            // Show all items for cat_id 5 and 8
            $sql = "SELECT * FROM items";
        } else {
            // Show specific items based on cat_id
            if ($selectedCategoryId == 4 || $selectedCategoryId == 7) {
                // Show items similar to Category 2
                $startItemId = 7;
                $endItemId = 12;
            } elseif ($selectedCategoryId == 6 || $selectedCategoryId == 3) {
                // Show items similar to Category 1 and 3
                $startItemId = 1;
                $endItemId = 6;
            } else {
                // Default calculation
                $startItemId = ($selectedCategoryId - 1) * 6 + 1;
                $endItemId = $startItemId + 5;
            }
            $sql = "SELECT * FROM items WHERE item_id BETWEEN $startItemId AND $endItemId";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch items for the selected category
            while ($row = $result->fetch_assoc()) {
                $all_items[] = $row;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/css/all.min.css">
    <link rel="stylesheet" href="userpage.css">
    <style>
        /* Add CSS styles for the card layout */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Center the cards horizontally */
            align-items: center; /* Center the cards vertically */
            gap: 20px; /* Adjust the gap between cards as needed */
        }

        .card {
            width: calc(33.33% - 20px); /* Adjust the width as needed */
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        /* Add CSS styles to center the form */
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px; /* Optional: Add margin to the form for spacing */
        }

        /* Optional: Adjust the width of the form if needed */
        form {
            max-width: 400px;
            width: 100%;
            text-align: center;
            margin: 0 auto;
        }
    </style>
    <title>Ecommerce Website</title>
</head>
<body>
    <?php
    include_once 'userpage.php';
    ?>

    <main>
    <form method="post" action="">
            <label for="category_id">Select Category:</label>
            <select name="category_id" id="category_id">
                <?php foreach ($categories as $id => $category) : ?>
                    <option value="<?php echo $id; ?>"><?php echo $category; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Submit">
        </form>

        <div class="card-container">
            <?php
            // Display items for the selected category
            foreach ($all_items as $row) :
                ?>
                    <div class="card">
                        <div class="image">
                            <img src="<?php echo $row["item_image"]; ?>" alt="">
                        </div>
                        <div class="caption">
                            <p class="rate">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <p class="item_name"><?php echo $row["item_name"]; ?></p>
                            <p class="item_price"><b>₱<?php echo $row["item_price"]; ?></b></p>
            </div>
                <button class="add-to-cart" data-id="<?php echo $row["item_id"]; ?>">Add to cart</button>
            <?php endforeach; ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.add-to-cart').on('click', function () {
                    var productId = $(this).data('id');

                    $.ajax({
                        url: 'cart.php',
                        type: 'POST',
                        data: { item_id: itemId },
                        success: function (response) {
                            var data = JSON.parse(response);
                            $('#badge').html(data.num_cart);
                        }
                    });
                });
            });
        </script>
    </main>
</body>
</html>
