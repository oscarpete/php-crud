<?php
declare(strict_types=1);
include_once "includes/header.php";
?>

<!--maybe also add a link to go back to the overview?-->
<a href="?page=<?php echo $_GET['page']; ?>"> BACK TO OVERVIEW </a>
<?php //var_dump($data);?>
<br>
<div><?php echo $data[0]['className']; ?></div>
<div><?php echo $data[0]['assignedTeacher']; ?></div>
<div><?php echo $data[0]['location']; ?></div>

<?php require 'includes/footer.php'; ?>
