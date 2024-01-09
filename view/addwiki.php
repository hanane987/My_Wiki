<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Wiki Form</title>
</head>
<body>
    <h2>Add Wiki Form</h2>

    <form action="index.php?action=addwiki" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea><br>

        <label for="userId">User ID:</label>
        <input type="number" id="userId" name="userId" required><br>

        <label for="categoryId">Category ID:</label>
        <input type="number" id="categoryId" name="categoryId" required><br>

        <input type="submit" value="Add Wiki">
    </form>
</body>
</html>
