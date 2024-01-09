


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Document</title>
    <link rel="stylesheet" href="assets\css\style1.css">
</head>
<!-- component -->
<!-- component -->
<style>
  body {
    font-family: 'Noto Sans', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  header {
    background-color: #000;
    color: #fff;
    height: 80px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .logo {
    display: flex;
    align-items: center;
  }

  .logo img {
    width: 90px; /* Adjust the size as needed */
    height: auto;
    margin-right: 10px;
  }

  .logo a {
    color: #fff;
    font-size: 20px;
    text-decoration: none;
    font-weight: bold;
  }

  .nav-links {
    display: flex;
    align-items: center;
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .nav-links li {
    margin-right: 20px;
  }

  .nav-links a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    transition: color 0.3s ease;
  }

  .nav-links a:hover {
    color: #fcae04;
  }

  .search-button {
    background-color: #fcae04;
    color: #000;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .search-button:hover {
    background-color: #ffda63;
  }

  .contact-button {
    background-color: #fff;
    color: #000;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .contact-button:hover {
    background-color: #000;
    color: #fff;
  }
</style>


<div class="panel-body table-responsive">
    <?php if (!empty($categories)) : ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Time of Creation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php foreach ($categories as $category) : ?>
                <tr>
                    <td><?= $category->getCategoryId(); ?></td>
                    <td><?= $category->getCategoryName(); ?></td>
                    <td><?= $category->getCreatedAt(); ?></td>
                    <td>
                        <ul class='action-list'>
                            <!-- Add your actions here (add, edit, delete) -->
                            <li><a href="index.php?action=showAddCategory" data-tip='add'><i class='fa fa-plus'></i></a></li>
                            <li><a href="index.php?action=showUpdateCategory&id=<?= $category->getCategoryId() ?>" data-tip='edit'><i class='fa fa-edit'></i></a></li>
                            <li><a href="index.php?action=deleteCategory&id=<?= $category->getCategoryId() ?>" data-tip='delete'><i class='fa fa-trash'></i></a></li>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>No categories found.</p>
    <?php endif; ?>
</div>



    <?php 
    include_once "footer.php"

    ?>
</body>

</html>