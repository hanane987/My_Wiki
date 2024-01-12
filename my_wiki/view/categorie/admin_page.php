


<?php
ob_start();
?>

<?php
    echo  $_SESSION['role'];
?>
<table class="table bg-white rounded shadow-sm  table-hover">
    <thead>
        <tr>
            <th scope="col" width="50">Category ID</th>
            <th scope="col">Category Name</th>
            <th scope="col">Time of Creation</th>
            <th scope="col">Actions</th>
        </tr>

    </thead>
    <tbody>
    <button><a href="index.php?action=display-category" data-tip='add'><i class='fa fa-plus'></i></a></button>

        <?php foreach ($categories as $category) : ?>
            <tr>
                <td scope="row"><?= $category->getCategoryId(); ?></td>
                <td><?= $category->getName(); ?></td>
                <td><?= $category->getCreatedAt(); ?></td>
                <td>
                    <ul class='action-list'>
                        <li><a href="index.php?action=UpdateCategory&id=<?= $category->getCategoryId() ?>" data-tip='edit'><i class='fa fa-edit'></i></a></li>
                        <li><a href="index.php?action=deleteCategory&id=<?= $category->getCategoryId() ?>" data-tip='delete'><i class='fa fa-trash'></i></a></li>
                    </ul>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
       
    

<?php
  $content = ob_get_clean();
  include_once 'layout.php';
  ?>
