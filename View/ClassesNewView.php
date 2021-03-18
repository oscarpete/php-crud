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
            <div><input type="number" name="location" id="location" required value=""
                        placeholder='location'>
                <br>
                <span><label for"teacher">Assigned Teacher</label></span>
                <div><select name="teacher" id="teacher" required>
                        <option value><i>none</i></option>
                        <?php foreach ($teacherData as $i=>$teacher): ?>
                            <option value="<?php echo $teacher['id']; ?>" <?php echo $i=0 ?'selected': '';?>> <?php echo $teacher['firstName']; ?></option>
                        <?php endforeach; ?>
                    </select></div>
                <br>
                <div>
                    <button type="submit" name="create" id="create">create new class!</button>
                </div>
        </form>
        </body>
    </section>

<?php require 'includes/footer.php'; ?>