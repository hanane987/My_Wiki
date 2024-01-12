<?php

ob_start();

?>
<div class="panel-body table-responsive">
   
        <table class="table">
            <thead>
                <tr>
                    <th>tag id</th>
                    <th>tag name</th>
                    <th>created at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php foreach ($tags as $tag) : ?>
                <tr>
                    <td><?= $tag->getTagId(); ?></td>
                    <td><?= $tag->getTagName(); ?></td>
                    <td><?= $tag->getCreatedAt(); ?></td>
                    <td>
                        <ul class='action-list'>
                            <!-- Add your actions here (add, edit, delete) -->
                            <li><a href="index.php?action=displayAddForm" data-tip='add'><i class='fa fa-plus'></i></a></li>
                            <li><a href="index.php?action=gettagsbyid&id=<?= $tag->getTagId() ?>" data-tip='edit'><i class='fa fa-edit'></i></a></li>
                            <li><a href="index.php?action=deletetag&id=<?= $tag->getTagId() ?>"  data-tip='delete'><i class='fa fa-trash'></i></a></li>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
   
       
    
</div>

<?php
  $content = ob_get_clean();
  include_once 'layout.php';
  ?>
