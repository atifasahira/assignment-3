<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            background: #f4f4f9;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .page-title {
            color: #001f3f;
            font-size: 2rem;
            text-align: center; 
            margin: 20px auto; 
            padding: 20px;
        }

        .container {
            max-width: 87%; 
            margin: 20px auto; 
            padding: 20px; 
        }

        .header-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            color: #001f3f;
        }

        .back-link {
            text-decoration: none;
            color: #001f3f;
            font-size: 1.5rem;
            margin-right: 10px;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #003366; 
        }

        h1 {
            font-size: 2rem;
            margin: 0;
            color: #001f3f; 
        }

        table {
            border-spacing: 0;
            border: 2px solid #001f3f; 
            background: #fff; 
            border-radius: 6px;
            width: 100%;
            margin: 20px 0;
            color: #001f3f; 
        }

        table th {
            height: 50px;
            background: #001f3f; 
            color: #fff; 
            font-size: 1.2rem;
        }

        table td {
            padding: 15px;
            color: #001f3f;
            text-align: center;
        }

        table tbody tr {
            border-bottom: 1px solid #001f3f; 
        }

        table tbody tr:last-child {
            border-bottom: none; 
        }

        table td img {
            width: 100px; 
            height: 100px; 
            object-fit: cover; 
        }

        hr {
            border: none;
            border-top: 2px solid #001f3f; 
            margin: 20px auto;
            width: 95%; 
        }

        .summary {
            margin-top: 20px;
            text-align: right;
            color: #001f3f;
            padding-right: 10px;
        }

        .summary h3 {
            margin: 10px 0;
            font-size: 1.2rem;
        }

        .discount {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
        }

        .discount label {
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <div class="header-container">
            <h1 class="page-title">Order Confirmation</h1>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Food Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $items = [
                        ["Birria Tacos", 21.00, "images/birria tacos.jpg"],
                        ["Chicken Tenders", 15.00, "images/chicken tenders.jpg"],
                        ["Mozzarella Sticks", 15.00, "images/mozzarella sticks.jpg"],
                        ["Cheese Baked Mussels", 25.00, "images/mussels.jpg"],
                        ["Margherita Pizza", 18.00, "images/pizza.jpg"],
                        ["Vanilla Milkshake", 11.00, "images/vanilla milkshake.jpg"],
                        ["Iced Matcha Latte", 16.00, "images/matcha latte.jpg"],
                        ["Pepsi", 2.00, "images/pepsi.jpg"]
                    ];

                    $grand_total = 0;

                    foreach ($items as $index => $item) {
                        $name = $item[0];
                        $price = $item[1];
                        $image = $item[2];
                        $qty_name = "qty" . ($index + 1);
                        $qty = isset($_POST[$qty_name]) ? intval($_POST[$qty_name]) : 0;

                        if ($qty > 0) {
                            $subtotal = $price * $qty;

                            $grand_total += $subtotal;

                            echo "
                                <tr>
                                    <td><img src='$image' alt='$name'></td>
                                    <td>$name</td>
                                    <td>RM " . number_format($price, 2) . "</td>
                                    <td>$qty</td>
                                    <td>RM " . number_format($subtotal, 2) . "</td>
                                </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>

            <hr>

            <div class="summary">
                <?php
                $sst = $grand_total * 0.06;
                $total_with_sst = $grand_total + $sst;

                echo "<h3>Subtotal (exclude SST): RM " . number_format($grand_total, 2) . "</h3>";
                echo "<h3>SST (6%): RM " . number_format($sst, 2) . "</h3>";
                echo "<h3 id='total'>Total Amount: RM " . number_format($total_with_sst, 2) . "</h3>";
                ?>
            </div>

            <div class="discount">
                <input type="checkbox" id="discountCheckbox" onclick="applyDiscount()">
                <label for="discountCheckbox">Apply 50% Discount</label>
            </div>
        </div>
    </div>

    <script>
        function applyDiscount() {
            const checkbox = document.getElementById('discountCheckbox');
            const totalElement = document.getElementById('total');
            const originalTotal = <?php echo $total_with_sst; ?>;
            
            if (checkbox.checked) {
                const discountedTotal = originalTotal * 0.5;
                totalElement.innerHTML = `Total Amount: RM ${discountedTotal.toFixed(2)}`;
            } else {
                totalElement.innerHTML = `Total Amount: RM ${originalTotal.toFixed(2)}`;
            }
        }
    </script>
</body>
<?php include 'footer.php'; ?>
</html>
