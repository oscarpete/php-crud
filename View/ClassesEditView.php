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
        <div><input type="number" name="location" id="location" required value="<?php echo $data['location']; ?>"
                    placeholder='location'>
            <br>
            <span><label for"teacher">Assigned Teacher</label></span>
            <div><select name="teacher" id="teacher" required>
                    <?php foreach ($teacherData as $teacher): ?>
                        <option value="<?php echo $teacher['id']; ?>" <?php echo ($teacher['id'] === $data['assignedTeacher']) ?'selected': '';?>> <?php echo $teacher['firstName']; ?></option>
                    <?php endforeach; ?>
                </select></div>
            <br>
            <div>
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <button type="submit" name="edit" id="edit">Update!</button>
            </div>
    </form>
    </body>
</section>

<?php require 'includes/footer.php'; ?>
