<?php

require_once 'bootstrap.php';

$scopes = [];
foreach (preg_split('/,/', $_GET['scope']) as $scope_id) {
    $scopes[] = $scopeRepository->getScopeEntityByIdentifier($scope_id);
}
?>
<!DOCTYPE html>
<html>
<title>Approve</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>
<div class="w3-container">
    <p>"The Client" is asking for permission to:</p>
    <ul>
    <?php
    foreach ($scopes as $scope) {
        ?>
        <li><b><?php echo $scope; ?></b></li>
    <?php
    }
    ?>
    </ul>
    <p>Do you approve?</p>
    <form method="post" action="do_approve.php">
        <input class="w3-button w3-indigo" type="submit" value="Yes">
    </form>
</div>
</body>
</html>