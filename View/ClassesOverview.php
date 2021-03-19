<?php
declare(strict_types=1);
include_once "includes/header.php";
?>
    <section>
        <h3>Class overview</h3>
        <!--here we should generate an overview of classes that are loaded from the database-->
        <div class="container">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Class Name</th>
                <th scope="col">Assigned Teacher</th>
                <th scope="col">location</th>
                <th scope="col">Student count</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $i => $myClass) : ?>
                <tr>
                    <td><?php echo $myClass['className']; ?> </td>
                    <td><?php echo $myClass['assignedTeacher']; ?> </td>
                    <td><?php echo $myClass['town']; ?> </td>
                    <td><?php echo $myClass['studentCount'] ?: 'none'; ?></td>
                    <td><a href="?id=<?php echo $myClass['id'] ?>"></a></td>

                    <td><form method='GET'>
                            <input type="hidden" name="page" value="<?php echo htmlspecialchars($GET['page'])?>">
                            <button type="submit" name="id" class="btn btn-light" value="<?php echo $myClass['id'];?>">more info</button>
                        </form></td>
                    <td><form method='GET'>
                            <input type="hidden" name="page" value="<?php echo htmlspecialchars($GET['page'])?>">
                            <input type="hidden" name="edit">
                            <button type="submit" name="id" class="btn btn-secondary" value="<?php echo $myClass['id'];?>">edit</button>
                        </form></td>
                    <td><form method='POST'>
                            <input type="hidden" name="page" value="<?php echo htmlspecialchars($GET['page'])?>">
                            <input type="hidden" name="action" value="delete">
                            <button type="submit" name="id" class="btn btn-danger" value="<?php echo $myClass['id'];?>">delete</button>
                        </form></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <div class="extra-button">
            <button class="btn btn-primary"><a href="?page=<?php echo CLASSES; ?>&create=">create new?</a></button>
            <button class="btn btn-primary"><a href="?page=<?php echo CLASSES; ?>&export=CSV">Export as CSV</a>
            </button>
        </div>
        </div>
    </section>

<?php require 'includes/footer.php'; ?>