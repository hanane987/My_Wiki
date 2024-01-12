<?php

ob_start();

?>


<?php
// Assuming you have a WikiDAO class with methods to get statistics


// Assuming you have a WikiDAO class with methods to get statistics
$wikiDAO = new WikiDAO();
$wikiCount = $wikiDAO->getWikiCount();
$categoryCount = $wikiDAO->getCategoryCount();
$tagCount = $wikiDAO->getTagCount();
?>

<div class="row g-3 my-2">
    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?php echo $wikiCount; ?></h3>
                <p class="fs-5">Wikis</p>
            </div>
            <span class="fs-1" style="border: 2px solid #3498db; border-radius: 50%; padding: 0.5em;">📄</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?php echo $categoryCount; ?></h3>
                <p class="fs-5">Categories</p>
            </div>
            <span class="fs-1" style="border: 2px solid #e74c3c; border-radius: 50%; padding: 0.5em;">🎁</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?php echo $tagCount; ?></h3>
                <p class="fs-5">Tags</p>
            </div>
            <span class="fs-1" style="border: 2px solid #27ae60; border-radius: 50%; padding: 0.5em;">🏷️</span>
        </div>
    </div>
</div>




                <?php
  $content = ob_get_clean();
  include_once 'layout.php';
  ?>