<?php
declare(strict_types=1);
include_once "includes/header.php";
?>
<section>
    <h3>Teachers overview</h3>
    <!--here we should generate an overview of classes that are loaded from the database-->
    <div class="container">
        <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
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
                        <button type="submit" name="id" class="btn btn-light" value="<?php echo $myTeacher['id'];?>">more info</button>
                    </form></td>

                <td><form method = 'GET'>
                        <input type="hidden" name="page" value="<?php echo htmlspecialchars($_GET['page'])?>">
                        <input type="hidden" name="edit">
                        <button type="submit" name="id" class="btn btn-secondary" value="<?php echo $myTeacher['id'];?>">edit</button>
                    </form></td>
                <td><form method='POST'>
                        <input type="hidden" name="page" value="<?php echo htmlspecialchars($_GET['page'])?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit" name="id" class="btn btn-danger" value="<?php echo $myTeacher['id'];?>">delete</button>
                    </form></td>
            </tr>
        <?php endforeach; ?>
        <br>

        </tbody>
    </table>
        <br>
        <div class="extra-button">
            <button class="btn btn-primary"><a href="?page=<?php echo TEACHERS; ?>&create=">create new?</a></button>
            <button class="btn btn-primary"><a href="?page=<?php echo TEACHERS; ?>&export=CSV">Export as CSV</a>
            </button>
        </div>
    </div>
</section>

<?php require 'includes/footer.php' ?>
