<!-- create.view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
<h1>Create a New Product</h1>
<form action="/products/create" method="POST"> <!-- Updated action URL -->

    <label for="title">Product Title:</label>
    <input type="text" id="title" name="title" required>
    <br>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>
    <br>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" required>
    <br>
    <input type="submit" value="Create Product"><br>
    <a href="create.view.php">Create New Product</a>

</form>
</body>
</html>
