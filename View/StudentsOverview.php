<?php
declare(strict_types=1);
include_once "includes/header.php";
?>
<section>
    <b>Students overview</b>
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
        <?php foreach ($data  as $i => $myStudent) : ?>
            <tr>
                <td>Line <?php echo $i; ?> </td>
                <td><?php echo $myStudent['firstName']; ?> </td>
                <td><?php echo $myStudent['lastName']; ?> </td>
                <td><?php echo $myStudent['email']; ?> </td>
                <td><a href="?id=<?php echo $myStudent['id'] ?>"></a></td>

                <td><form method='GET'>
                        <input type="hidden" name="page" value="<?php echo htmlspecialchars($_GET['page'])?>">
                        <button type="submit" name="id" value="<?php echo $myStudent['id'];?>">more info</button>
                    </form></td>

                <td><form method = 'GET'>
                        <input type="hidden" name="page" value="<?php echo htmlspecialchars($_GET['page'])?>">
                        <input type="hidden" name="edit">
                        <button type="submit" name="id" value="<?php echo $myStudent['id'];?>">edit</button>
                    </form></td>
                <td><form method='POST'>
                        <input type="hidden" name="page" value="<?php echo htmlspecialchars($_GET['page'])?>">
                        <input type="hidden" name="delete">
                        <button type="submit" name="id" value="<?php echo $myStudent['id'];?>">delete</button>
                    </form></td>
            </tr>
        <?php endforeach; ?>
        <br>
        <a href="?page=students&create=">create new?</a>
        </tbody>
    </table>

</section>

<?php require 'includes/footer.php' ?>
