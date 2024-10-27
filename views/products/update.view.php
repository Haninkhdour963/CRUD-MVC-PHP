<!-- In views/products/update.view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
<h1>Update Product</h1>
<form action="/products/update/<?php if (!empty($product)) {
    echo $product['id'];
} ?>" method="POST">
    <label for="title">Title:</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars($product['title']); ?>" required>

    <label for="description">Description:</label>
    <textarea name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea>

    <label for="price">Price:</label>
    <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>

    <button type="submit">Update Product</button>
</form>
</body>
</html>
