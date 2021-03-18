<?php
declare(strict_types=1);
include_once "includes/header.php";
?>

<section>
    <a href="?page=<?php echo $_GET['page']; ?>"> BACK TO OVERVIEW </a>
    <div><b>You have reached the edit view!</b></div>
    <div>Here you can edit a class!</div>
    <br>
    <body>
    <form method="POST">
        <span><label for="name">Class Name</label></span>
        <!--    --><?php //var_dump($data);?>
        <div><input type="text" name="name" id="name" required value="<?php echo $data['className']; ?>"
                    placeholder="class name"></div>
        <br>
        <span><label for="location">Class Location</label></span>
        <div><select name="location" id="location">
                <option value><i>none</i></option>
                <?php foreach ($locationData as $location): ?>
                    <option value="<?php echo $location['id']; ?>" <?php echo ($location['id'] === $data['classLocation'])? 'selected' : ''; ?>><?php echo $location['name']; ?></option>
                <?php endforeach; ?>
            </select></div>
        <br>
        <span><label for"teacher">Assigned Teacher</label></span>
        <div><select name="teacher" id="teacher" required>
                <?php foreach ($teacherData as $teacher): ?>
                    <option value="<?php echo $teacher['id']; ?>" <?php echo ($teacher['id'] === $data['teachId']) ? 'selected' : ''; ?>> <?php echo $teacher['firstName']; ?></option>
                <?php endforeach; ?>
            </select></div>
        <br>
        <div>
            <input type="hidden" name="id" value="<?php echo $data['classId']; ?>">
            <button type="submit" name="action" id="action" value="edit">Update!</button>
        </div>
    </form>
    </body>
</section>

<?php require 'includes/footer.php'; ?>
