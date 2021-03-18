<?php
declare(strict_types=1);
include_once "includes/header.php";
?>

<!--maybe also add a link to go back to the overview?-->
<a href="?page=<?php echo $_GET['page']; ?>"> BACK TO OVERVIEW </a>
<?php //var_dump($data);?>
<br>
<?php if (isset($data)): ?>
    <ul>
        <li>
            <span><b>Student's First Name: </b><?php echo $data['firstName']; ?></span>
        </li>
        <li>
            <span><b>Student's Last Name: </b><?php echo $data['lastName']; ?></span>
        </li>
        <li>
            <span><b>Student's email: </b><?php echo $data['email']; ?></span>
        </li>
    </ul>

<table>
    <thead>
    <tr>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $i => $myStudent) : ?>
    <tr>
        <td>
        </td>
    </tr>
    </tbody>

    <th></th>
    <?php endforeach; ?>
    <?php else : ?>
        <!--some error message, maybe we can make a php file to standardize-->
        <h2>SOMETHING WENT WRONG?</h2>
    <?php endif; ?>
</table>
<?php require 'includes/footer.php'; ?>
