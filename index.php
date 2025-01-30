<?php
session_start();

// Sample product list
$products = [
    1 => ["name" => "Laptop", "price" => 500, "image" => "laptop.jpg"],
    2 => ["name" => "Smartphone", "price" => 300, "image" => "smartphone.jpg"],
    3 => ["name" => "Headphones", "price" => 50, "image" => "headphones.jpg"]
];

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add to cart
if (isset($_GET['add'])) {
    $id = $_GET['add'];
    if (isset($products[$id])) {
        $_SESSION['cart'][] = $products[$id];
    }
}

// Clear cart
if (isset($_GET['clear'])) {
    $_SESSION['cart'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple E-Commerce</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f4f4f4; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .product { display: flex; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #ddd; padding-bottom: 10px; }
        .product img { width: 80px; margin-right: 20px; }
        .cart { margin-top: 20px; }
        button { background: green; color: white; padding: 5px 10px; border: none; cursor: pointer; }
        button.remove { background: red; }
    </style>
</head>
<body>

<div class="container">
    <h2>Simple E-Commerce Store</h2>

    <h3>Products</h3>
    <?php foreach ($products as $id => $product) : ?>
        <div class="product">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
            <div>
                <strong><?= $product['name'] ?></strong> - $<?= $product['price'] ?>
                <a href="?add=<?= $id ?>"><button>Add to Cart</button></a>
            </div>
        </div>
    <?php endforeach; ?>

    <h3>Shopping Cart</h3>
    <div class="cart">
        <?php if (empty($_SESSION['cart'])) : ?>
            <p>Your cart is empty.</p>
        <?php else : ?>
            <ul>
                <?php foreach ($_SESSION['cart'] as $item) : ?>
                    <li><?= $item['name'] ?> - $<?= $item['price'] ?></li>
                <?php endforeach; ?>
            </ul>
            <strong>Total: $<?= array_sum(array_column($_SESSION['cart'], 'price')) ?></strong>
            <br><br>
            <a href="?clear=true"><button class="remove">Clear Cart</button></a>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
