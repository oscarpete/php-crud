<?php
declare(strict_types=1);
include_once "includes/header.php";
?>
<section>
    <b>Testing class overview</b>
    <!--here we should generate an overview of classes that are loaded from the database-->
    <table>
        <thead>
        <tr>
            <th>Class Name</th>
            <th>Assigned Teacher</th>
            <th>location</th>
            <th>Student count</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $i => $myClass) : ?>
            <tr>
                <td><?php echo $myClass['className']; ?> </td>
                <td><?php echo $myClass['assignedTeacher']; ?> </td>
                <td><?php echo $myClass['location']; ?> </td>
                <td><?php echo $myClass['studentCount'] ?: 'none'; ?></td>
                <td><a href="?id=<?php echo $myClass['id'] ?>"></a></td>

                <td><form method='GET'>
                        <input type="hidden" name="page" value="<?php echo htmlspecialchars($GET['page'])?>">
                        <button type="submit" name="id" value="<?php echo $myClass['id'];?>">more info</button>
                    </form></td>
                <td><form method='GET'>
                        <input type="hidden" name="page" value="<?php echo htmlspecialchars($GET['page'])?>">
                        <input type="hidden" name="edit">
                        <button type="submit" name="id" value="<?php echo $myClass['id'];?>">edit</button>
                    </form></td>
                <td><form method='POST'>
                        <input type="hidden" name="page" value="<?php echo htmlspecialchars($GET['page'])?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit" name="id" value="<?php echo $myClass['id'];?>">delete</button>
                    </form></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="?page=classes&create=">create new?</a>
    <a href="?page=classes&export=CSV">Export as CSV</a>

</section>

<?php require 'includes/footer.php'; ?>
