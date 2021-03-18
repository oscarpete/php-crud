<?php
declare(strict_types=1);
include_once "includes/header.php";
?>
<section>
    <b>Testing Teachers overview</b>
    <!--here we should generate an overview of classes that are loaded from the database-->
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($teachers as $i => $myTeacher) : ?>
            <tr>
                <td>Line <?php echo $i; ?> </td>
                <td><?php echo $myTeacher['firstName']; ?> </td>
                <td><?php echo $myTeacher['lastName']; ?> </td>
                <td><?php echo $myTeacher['email']; ?> </td>
                <td><a href="?id=<?php echo $myTeacher['id'] ?>"></a></td>
                <td><form method = 'POST'>
                        <input type="hidden" name="page" value="<?php echo htmlspecialchars($_GET['page'])?>">
                        <button type="submit" name="id" value="<?php echo $myTeacher['id'];?>">edit</button>
                    </form></td>
                <td><form method = 'get'>
                        <input type="hidden" name="page" value="<?php echo htmlspecialchars($_GET['page'])?>">
                        <button type="submit" name="id" value="<?php echo $myTeacher['id'];?>">delete</button>
                    </form></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</section>

<?php require 'includes/footer.php' ?>
