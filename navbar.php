<style>
        body {
            background: #f4f4f9;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
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
    </style>

<!-- navbar.php -->
<div class="navbar">
    <img src="images/logo.png" alt="Logo">
    <div>
        <a href="menu.php">Menu</a>
        <a href="cart.php">Cart</a>
        <a href="#about">About Us</a>
        <a href="#contact">Contact</a>
    </div>
</div>
