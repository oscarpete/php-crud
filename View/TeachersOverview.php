<?php
declare(strict_types=1);
include_once "includes/header.php";
?>
<section>
    <b>Teachers overview</b>
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
        <?php foreach ($data  as $i => $myTeacher) : ?>
            <tr>
                <td>Line <?php echo $i; ?> </td>
                <td><?php echo $myTeacher['firstName']; ?> </td>
                <td><?php echo $myTeacher['lastName']; ?> </td>
                <td><?php echo $myTeacher['email']; ?> </td>
                <td><a href="?id=<?php echo $myTeacher['id'] ?>"></a></td>

                <td><form method='GET'>
                        <input type="hidden" name="page" value="<?php echo htmlspecialchars($_GET['page'])?>">
                        <button type="submit" name="id" value="<?php echo $myTeacher['id'];?>">more info</button>
                    </form></td>

                <td><form method = 'GET'>
                        <input type="hidden" name="page" value="<?php echo htmlspecialchars($_GET['page'])?>">
                        <input type="hidden" name="edit">
                        <button type="submit" name="id" value="<?php echo $myTeacher['id'];?>">edit</button>
                    </form></td>
                <td><form method='POST'>
                        <input type="hidden" name="page" value="<?php echo htmlspecialchars($_GET['page'])?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit" name="id" value="<?php echo $myTeacher['id'];?>">delete</button>
                    </form></td>
            </tr>
        <?php endforeach; ?>
        <br>

        </tbody>
    </table>

    <a href="?page=<?php echo TEACHERS;?>&create=">create new?</a>
    <a href="?page=<?php echo TEACHERS;?>&export=CSV">Export as CSV</a>
</section>

<?php require 'includes/footer.php' ?>
