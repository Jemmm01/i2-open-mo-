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
    if (isset($_POST["category_id"])) {
        $selectedCategoryId = $_POST["category_id"];
        
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
    <link rel="stylesheet" href="style.css">
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

        /* Add CSS styles for the shopping cart in the header */
        .header-cart {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #fff;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: none;
        }

        .header-cart:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <title>Order Page</title>
</head>
<body>
    <?php
    include_once 'userpage.php';
    ?>

    <main>
        <!-- HTML Form to select a category -->
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
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Shopping Cart in the Header -->
        <div class="header-cart" id="headerCart">
            <h3>Your Cart</h3>
            <ul id="cartList"></ul>
            <p>Total: <span id="cartTotal">₱0.00</span></p>
        </div>

        <script>
            let cartList = document.getElementById('cartList');
            let cartTotal = document.getElementById('cartTotal');
            let headerCart = document.getElementById('headerCart');
            let listCards = [];

            function addToCart(key) {
                if (listCards[key] == null) {
                    // copy product from list to list card
                    listCards[key] = JSON.parse(JSON.stringify(products[key]));
                    listCards[key].quantity = 1;
                }
                updateHeaderCart();
            }

            function updateHeaderCart() {
                cartList.innerHTML = '';
                let count = 0;
                let totalPrice = 0;
                listCards.forEach((value, key) => {
                    totalPrice = totalPrice + value.price;
                    count = count + value.quantity;
                    if (value != null) {
                        let newLi = document.createElement('li');
                        newLi.innerHTML = `
                            ${value.name} x ${value.quantity} - ₱${(value.price * value.quantity).toLocaleString()}`;
                        cartList.appendChild(newLi);
                    }
                });
                cartTotal.innerText = ₱${totalPrice.toLocaleString()};
            }

            var item_id = document.getElementsByClassName("add-to-cart");

            for (var i = 0; i < item_id.length; i++) {
                item_id[i].addEventListener("click", function (event) {
                    var target = event.target;
                    var id = target.getAttribute("data-id");
                    var xml = new XMLHttpRequest();
                    xml.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            var data = JSON.parse(this.responseText);
                            target.innerHTML = data.in_cart;
                            document.getElementById("badge").innerHTML = data.num_cart + 1;

                            // Add the following lines to trigger the shopping cart
                            addToCart(id); // Assuming id corresponds to the product key
                            headerCart.style.display = 'block';
                            updateHeaderCart();
                        }
                    }

                    xml.open("GET", "dbconnect.php?action=add&item_id=" + item_id, true);
                    xml.send();
                })
            }
        </script>
    </main>
</body>
</html>