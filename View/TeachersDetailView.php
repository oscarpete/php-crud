<?php
declare(strict_types=1);
include_once "includes/header.php";
?>

    <!--maybe also add a link to go back to the overview?-->
    <a href="?page=<?php echo $_GET['page']; ?>"> BACK TO OVERVIEW </a>
<br>
<?php if (isset($data)): ?>
    <ul>
        <li>
            <span><b>Teacher's First Name: </b><?php echo $data['firstName']; ?></span>
        </li>
        <li>
            <span><b>Teacher's Last Name: </b><?php echo $data['lastName']; ?></span>
        </li>
        <li>
            <span><b>Teacher's email: </b><?php echo $data['email']; ?></span>
        </li>
    </ul>

<table>
    <thead>
    <tr>
        <th>students</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($studentData as $i=>$student): ?>
    <tr>
        <td>
            <a href="?page=students&id=<?php echo $student['id'];?>"><?php echo $student['name'];?></a>
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
