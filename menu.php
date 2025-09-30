<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Food Online</title>
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
            text-align: left;
            padding-left: 22px;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        .navbar {
            background-color: #001f3f;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .navbar img {
            height: 97px;
        }   

        .header {
            margin-top: 10px;
            margin-bottom: 10px;
        }


        h1 {
            color: #001f3f;
            font-size: 2rem;
            text-align: left;
            padding-left: 22px; 
            padding: 20px;
        }

        .container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 20px;
        }

        .menu-container {
            flex: 2; 
        }

        .menu-item {
            display: flex;
            align-items: center;
            background-color: #fff; 
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            height: 180px; 
            padding: 10px;
        }

        .menu-item img {
            width: 180px;
            height: 180px; 
            object-fit: cover;
            border-radius: 5px;
        }

        .menu-details {
            flex: 1;
            padding: 15px;
        }

        .menu-details h3 {
            margin: 0;
            font-size: 1.4rem;
            color: #001f3f; 
        }

        .menu-details p {
            margin: 5px 0 15px;
            font-size: 0.9rem;
            color: #666;
        }

        .menu-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .menu-footer span {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .menu-footer input {
            width: 50px;
            padding: 5px;
            border: 1px solid #ccc; 
            border-radius: 4px;
        }

        .cart-container {
            flex: 1.5; 
            background-color: #fff; 
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 350px; 
            max-width: 350px; 
        }

        .cart-container h2 {
            color: #001f3f;
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .cart-item img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
        }

        .cart-item-details {
            flex: 1;
            margin-left: 10px;
        }

        .remove-button {
            background: none;
            border: none;
            color: #ff4c4c; 
            font-size: 1.5rem;
            cursor: pointer;
            transition: color 0.3s ease;
            padding: 0;
            margin-left: 10px;
        }

        .remove-button:hover {
            color: #e60000; 
        }

        hr {
            border: none;
            border-top: 2px solid #ccc; 
            margin: 20px 0;
        }

        .subtotal-container {
            text-align: center;
            color: #001f3f; 
            margin-top: 20px;
            font-weight: bold;
        }

        .checkout-button-container {
            text-align: center;
            margin-top: 20px;
        }

        .checkout-button {
            background-color: #001f3f; 
            color: #fff; 
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 1.1rem;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
            width: 100%; 
        }

        .checkout-button:hover {
            background-color: #003366; 
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <h1 class="page-title">Order Food Online</h1>

    <div class="container">
        <div class="menu-container">
            <form id="orderForm" action="cart.php" method="post">
                <!-- Menu Item 1 -->
                <div class="menu-item">
                    <img src="images/birria tacos.jpg" alt="Birria Tacos">
                    <div class="menu-details">
                        <h3>Birria Tacos</h3>
                        <p>Delicious slow-cooked beef tacos served with a rich dipping broth.</p>
                        <span class="error-message" style="color: red; font-size: 0.8rem; display: none;"></span>
                        <div class="menu-footer">
                            <span>RM 21.00</span>
                            <input type="number" name="qty1" min="0" placeholder="Qty" data-price="21.00" data-name="Birria Tacos" data-image="images/birria tacos.jpg" class="qty-input">
                        </div>
                    </div>
                </div>

                <!-- Menu Item 2 -->
                <div class="menu-item">
                    <img src="images/chicken tenders.jpg" alt="Chicken Tenders">
                    <div class="menu-details">
                        <h3>Chicken Tenders</h3>
                        <p>Crispy golden fried chicken tenders served with a side of tangy honey mustard for dipping.</p>
                        <span class="error-message" style="color: red; font-size: 0.8rem; display: none;"></span>
                        <div class="menu-footer">
                            <span>RM 15.00</span>
                            <input type="number" name="qty2" min="0" placeholder="Qty" data-price="15.00" data-name="Chicken Tenders" data-image="images/chicken tenders.jpg" class="qty-input">
                        </div>
                    </div>
                </div>

                <!-- Menu Item 3 -->
                <div class="menu-item">
                    <img src="images/mozzarella sticks.jpg" alt="Mozzarella Cheese Sticks">
                    <div class="menu-details">
                        <h3>Mozzarella Cheese Sticks</h3>
                        <p>Golden-fried mozzarella cheese sticks with a side of marinara sauce for a cheesy treat.</p>
                        <span class="error-message" style="color: red; font-size: 0.8rem; display: none;"></span>
                        <div class="menu-footer">
                            <span>RM 15.00</span>
                            <input type="number" name="qty3" min="0" placeholder="Qty" data-price="15.00" data-name="Mozzarella Cheese Sticks" data-image="images/mozzarella sticks.jpg" class="qty-input">
                        </div>
                    </div>
                </div>

                <!-- Menu Item 4 -->
                <div class="menu-item">
                    <img src="images/mussels.jpg" alt="Mussels Cheese Baked">
                    <div class="menu-details">
                        <h3>Mussels Cheese Baked</h3>
                        <p>Succulent mussels baked with a cheesy topping, perfect for seafood lovers.</p>
                        <span class="error-message" style="color: red; font-size: 0.8rem; display: none;"></span>
                        <div class="menu-footer">
                            <span>RM 25.00</span>
                            <input type="number" name="qty4" min="0" placeholder="Qty" data-price="25.00" data-name="Mussels Cheese Baked" data-image="images/mussels.jpg" class="qty-input">
                        </div>
                    </div>
                </div>

                <!-- Menu Item 5 -->
                <div class="menu-item">
                    <img src="images/pizza.jpg" alt="Margherita Pizza">
                    <div class="menu-details">
                        <h3>Margherita Pizza</h3>
                        <p>A classic pizza topped with fresh tomatoes, mozzarella cheese, and basil leaves.</p>
                        <span class="error-message" style="color: red; font-size: 0.8rem; display: none;"></span>
                        <div class="menu-footer">
                            <span>RM 18.00</span>
                            <input type="number" name="qty5" min="0" placeholder="Qty" data-price="18.00" data-name="Margherita Pizza" data-image="images/pizza.jpg" class="qty-input">
                        </div>
                    </div>
                </div>

                <!-- Menu Item 6 -->
                <div class="menu-item">
                    <img src="images/vanilla milkshake.jpg" alt="Vanilla Milkshake">
                    <div class="menu-details">
                        <h3>Vanilla Milkshakes</h3>
                        <p>A creamy and delicious vanilla milkshake made with real vanilla beans.</p>
                        <span class="error-message" style="color: red; font-size: 0.8rem; display: none;"></span>
                        <div class="menu-footer">
                            <span>RM 11.00</span>
                            <input type="number" name="qty6" min="0" placeholder="Qty" data-price="11.00" data-name="Vanilla Milkshake" data-image="images/vanilla milkshake.jpg" class="qty-input">
                        </div>
                    </div>
                </div>

                <!-- Menu Item 7 -->
                <div class="menu-item">
                    <img src="images/matcha latte.jpg" alt="Iced Matcha Latte">
                    <div class="menu-details">
                        <h3>Iced Matcha Latte</h3>
                        <p>A refreshing iced matcha latte made with high-quality matcha and creamy milk.</p>
                        <span class="error-message" style="color: red; font-size: 0.8rem; display: none;"></span>
                        <div class="menu-footer">
                            <span>RM 16.00</span>
                            <input type="number" name="qty7" min="0" placeholder="Qty" data-price="16.00" data-name="Iced Matcha Latte" data-image="images/matcha latte.jpg" class="qty-input">
                        </div>
                    </div>
                </div>

                <!-- Menu Item 8 -->
                <div class="menu-item">
                    <img src="images/pepsi.jpg" alt="Pepsi">
                    <div class="menu-details">
                        <h3>Pepsi</h3>
                        <p>Refreshing and fizzy Pepsi, perfect for quenching your thirst.</p>
                        <span class="error-message" style="color: red; font-size: 0.8rem; display: none;"></span>
                        <div class="menu-footer">
                            <span>RM 2.00</span>
                            <input type="number" name="qty8" min="0" placeholder="Qty" data-price="2.00" data-name="Pepsi" data-image="images/pepsi.jpg" class="qty-input">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Cart Section -->
        <div>
            <div class="cart-container">
                <h2>Cart</h2>
                <div id="cart-items"></div>

                <hr id="subtotal-line" style="display: none;">

                <div class="subtotal-container" id="subtotal-container" style="display: none;">
                    <h3>Subtotal: RM 0.00</h3>
                </div>
            </div>

            <div class="checkout-button-container">
                <button type="button" class="checkout-button" onclick="submitOrderForm()">Checkout</button>
            </div>
        </div>
    </div>

    <script>

        document.querySelectorAll('.qty-input').forEach(input => {
            input.addEventListener('input', updateCart);
        });

        // Reliability Enhancement 
        // document.querySelectorAll('.qty-input').forEach(input => {
        //     input.addEventListener('input', (event) => {
        //         const value = event.target.value;

        //         if (!/^[1-9]\d*$/.test(value) && value !== "") {
        //             event.target.value = ""; 
        //             showError(event.target, "Please enter a valid positive integer.");
        //         } else {
        //             clearError(event.target); 
        //         }
        //     });
        // });

        // function showError(inputElement, message) {
        //     const menuFooter = inputElement.closest('.menu-footer');
        //     let errorSpan = menuFooter.querySelector('.error-message');
            
        //     if (!errorSpan) {
        //         errorSpan = document.createElement('span');
        //         errorSpan.classList.add('error-message');
        //         errorSpan.style.color = 'red';
        //         errorSpan.style.fontSize = '0.8rem';
        //         errorSpan.style.display = 'block'; 
        //         errorSpan.style.marginTop = '8px'; 
        //         menuFooter.insertBefore(errorSpan, inputElement); 
        //     }
        //     errorSpan.textContent = message;
        // }

        // function clearError(inputElement) {
        //     const menuFooter = inputElement.closest('.menu-footer');
        //     const errorSpan = menuFooter.querySelector('.error-message');
        //     if (errorSpan) {
        //         errorSpan.textContent = ''; 
        //     }
        // }

        function updateCart() {
            const cartItemsContainer = document.getElementById('cart-items');
            const subtotalLine = document.getElementById('subtotal-line');
            const subtotalContainer = document.getElementById('subtotal-container');

            cartItemsContainer.innerHTML = ''; 

            let grandTotal = 0;
            let cartData = [];

            document.querySelectorAll('.qty-input').forEach(input => {
                const qty = parseInt(input.value);
                if (qty > 0) {
                    const price = parseFloat(input.getAttribute('data-price'));
                    const name = input.getAttribute('data-name');
                    const image = input.getAttribute('data-image');

                    const subtotal = qty * price;
                    grandTotal += subtotal;

                    cartData.push({ name, price, qty, subtotal });

                    const cartItem = document.createElement('div');
                    cartItem.classList.add('cart-item');
                    cartItem.innerHTML = `
                        <img src="${image}" alt="${name}">
                        <div class="cart-item-details">
                            <p>${name}</p>
                            <p>${qty} x RM ${price.toFixed(2)}</p>
                        </div>
                        <span>RM ${subtotal.toFixed(2)}</span>
                        <button class="remove-button" onclick="removeItem('${name}')">&times;</button>
                    `;
                    cartItemsContainer.appendChild(cartItem);
                }
            });

            if (grandTotal > 0) {
                subtotalLine.style.display = 'block';
                subtotalContainer.style.display = 'block';
                subtotalContainer.querySelector('h3').innerText = `Subtotal: RM ${grandTotal.toFixed(2)}`;
            } else {
                subtotalLine.style.display = 'none';
                subtotalContainer.style.display = 'none';
            }

            document.getElementById('cartData').value = JSON.stringify(cartData);
        }

        function removeItem(name) {
            document.querySelectorAll('.qty-input').forEach(input => {
                if (input.getAttribute('data-name') === name) {
                    input.value = 0; 
                }
            });

            updateCart();
        }

        function submitOrderForm() {
            const orderForm = document.getElementById('orderForm');
            orderForm.submit();
        }
    </script>
</body>
<?php include 'footer.php'; ?>
</html>
