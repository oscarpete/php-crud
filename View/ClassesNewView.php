<?php
declare(strict_types=1);

include_once "includes/header.php";
?>

    <section>
        <a href="?page=<?php echo $_GET['page']; ?>"> BACK TO OVERVIEW </a>
        <div><b>You have reached the New Class View!</b></div>
        <div>Here you can create a new class!</div>
        <br>
        <body>
        <form method="POST">
            <span><label for="name">Class Name</label></span>
            <!--    --><?php //var_dump($data);?>
            <div><input type="text" name="name" id="name" required value=""
                        placeholder="class name"></div>
            <br>
            <span><label for="location">Class Location</label></span>
            <div><select name="location" id="location" required>
                    <option value><i>none</i></option>
                    <?php foreach ($locationData as $i => $location): ?>
                        <option value="<?php echo $location['id']; ?>" <?php echo $i = 0 ? 'selected' : 0; ?>><?php echo $location['name']; ?></option>
                    <?php endforeach; ?>
                </select></div>
            <br>
            <span><label for="teacher">Assigned Teacher</label></span>
            <div><select name="teacher" id="teacher" required>
                    <option value><i>none</i></option>
                    <?php foreach ($teacherData as $j => $teacher): ?>
                        <option value="<?php echo $teacher['id']; ?>" <?php echo $j = 0 ? 'selected' : ''; ?>> <?php echo $teacher['firstName']; ?></option>
                    <?php endforeach; ?>
                </select></div>
            <br>
            <div>

                <button type="submit" name="action" id="action" value="create">create new class!</button>
            </div>
        </form>
        </body>
    </section>

<?php require 'includes/footer.php'; ?>