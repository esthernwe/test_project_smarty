<?php 
require_once ("libs/smarty_setup.php");
print_r(PDO::getAvailableDrivers());
$smarty->display('templates/index.tpl');
?>
