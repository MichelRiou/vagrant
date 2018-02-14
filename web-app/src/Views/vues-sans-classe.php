<?php
ob_start();
?>
<h1>du code html</h1>
<?php
$viewContent = ob_get_clean();
include ROOT_PATH . "/src/views/layout.php";
?>
