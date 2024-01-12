<?php

ob_start();
// print_r($_SESSION);
// var_dump($_SESSION);
echo $_SESSION['user_id'];
echo $_SESSION['role'];
?>


<table class="table bg-white rounded shadow-sm  table-hover">
    <thead>
        <tr>
            <th scope="col" width="50">wikiid</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">User id</th>
            <th scope="col">Categorie id</th>
            <th scope="col">status</th>
            <th scope="col">Actions</th>
        </tr>


    </thead>
    <tbody>

    <button>
    <?php if ($_SESSION['role'] === 'Author') : ?>
        <a href="index.php?action=display-wiki" data-tip='add'><i class='fa fa-plus'></i></a>
    <?php endif; ?>
</button>
        <?php foreach ($wikis as $wiki) : ?>
            <tr>
                <td><?= $wiki->getWikiId(); ?></td>
                <td><?= $wiki->getTitle(); ?></td>
                <td><?= $wiki->getContent(); ?></td>
                <td><?= $wiki->getUserId(); ?></td>
                <td><?= $wiki->getCategoryId(); ?></td>
                <td>
                    <?php
                    $isArchived = $wiki->getIsArchived();
                    echo ($isArchived == 1) ? 'Archived' : 'Not Archived';
                    ?>
                </td>

                <td>
    <ul class='action-list'>
    <?php if ($_SESSION['role'] === 'Author') : ?>
    <li><a href="index.php?action=get_wiki&id=<?= $wiki->getWikiId() ?>" data-tip='edit'><i class='fa fa-edit'></i></a></li>
    <li><a href="index.php?action=delete_wiki&id=<?= $wiki->getWikiId() ?>" data-tip='delete'><i class='fa fa-trash'></i></a></li>
<?php endif; ?>

<?php if ($_SESSION['role'] === 'Admin') : ?>
    <li><a href="index.php?action=archivWiki&id=<?= $wiki->getWikiId() ?>" data-tip='edit'>archiver</a></li>
    
<?php endif; ?>

    
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