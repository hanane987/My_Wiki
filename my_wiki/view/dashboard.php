<?php

ob_start();

?>



<?php
$content = ob_get_clean();
include_once '../layout.php';
?>