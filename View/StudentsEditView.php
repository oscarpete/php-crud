<?php
declare(strict_types=1);
include_once "includes/header.php";
?>
<!--<body>-->
<section>
    <a href="?page=<?php echo $_GET['page']; ?>"> BACK TO OVERVIEW </a>
    <div><b>You have reached Students edit view!</b></div>
    <div>Here you can edit a Student!</div>
    <br>

    <form method="POST">
        <span><label for="firstName">Student First Name</label></span>
        <!--            --><?php //var_dump($data);?>
        <div><input type="text" name="firstName" required value='<?php echo $data['firstName']; ?>' id="firstName"
                    placeholder="First Name"></div>
        <br>
        <label for="lastName">Student Last Name</label>
        <div><input type="text" name="lastName" id="lastName" required value='<?php echo $data['lastName']; ?>'
                    placeholder='Last Name'>
        </div>
        <br>
        <span><label for="email">Student Email</label></span>
        <div><input type="email" name="email" id="email" required value='<?php echo $data['email']; ?>'
                    placeholder='e-mail'>
        </div>
        <br>
        <span><label for="classId">Class</label></span>
        <div><select name="classId" id="classId">
                <option value><i>none</i></option>
                <?php foreach ($classData as $class): ?>
                    <option value="<?php echo $class['id']; ?>" <?php echo ($class['id'] === $data['classid']) ? 'selected' : ''; ?>><?php echo $class['className']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>



        <div>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <button type="submit" name="action" id="action" value="edit">Update!</button>
        </div>
    </form>
</section>
<!--    </body>-->


<?php require 'includes/footer.php'; ?>
