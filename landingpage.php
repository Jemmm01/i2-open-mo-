<?php
require_once 'dbconnect.php';

$sql = "SELECT * FROM items";
$all_items = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Ecommerce Website</title>
    <style>
        /* Modal styles */
        body {
            background-color: #FFC0D9;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fefefe;
            padding: 100px; /* Increase the padding */
            border-radius: 5px;
            width: 100%; /* Set a fixed width */
            max-width: 600px; /* Add a max-width for responsiveness */
            background-color: #fefefe;
            padding: 20px;
            border-radius: 5px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
    include_once 'header.php';
    ?>

    <main>
        <?php
        while ($row = mysqli_fetch_assoc($all_items)) {
        ?>
            <div class="card">
                <div class="image">
                    <img src="<?php echo $row["item_image"]; ?>" alt="">
                </div>
                <div class="caption">
                    <p class="rate">
                        <i class="fas fa-heart"></i>
                        <i class="fas fa-heart"></i>
                        <i class="fas fa-heart"></i>
                        <i class="fas fa-heart"></i>
                        <i class="fas fa-heart"></i>
                    </p>
                    <p class="item_name"><?php echo $row["item_name"]; ?></p>
                    <p class="item_price"><b>₱<?php echo $row["item_price"]; ?></b></p>
                </div>
                <!-- Replace "Add to Cart" button with "Item Description" button -->
                <button class="item-description" data-desc="<?php echo $row["item_desc"]; ?>">Item Description</button>
            </div>
        <?php
        }
        ?>
    </main>

    <!-- Modal for Item Description -->
    <div id="itemDescriptionModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p id="itemDescriptionContent"></p>
        </div>
    </div>

    <script>
        var itemDescriptionButtons = document.getElementsByClassName("item-description");

        for (var i = 0; i < itemDescriptionButtons.length; i++) {
            itemDescriptionButtons[i].addEventListener("click", function (event) {
                var target = event.target;
                var description = target.getAttribute("data-desc");
                displayItemDescription(description);
            });
        }

        function displayItemDescription(description) {
            var modal = document.getElementById("itemDescriptionModal");
            var content = document.getElementById("itemDescriptionContent");

            content.innerHTML = description;
            modal.style.display = "flex";
        }

        function closeModal() {
            var modal = document.getElementById("itemDescriptionModal");
            modal.style.display = "none";
        }
    </script>
</body>
</html>