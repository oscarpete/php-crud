<?php
declare(strict_types=1);

include_once "includes/header.php";
?>

<section>
    <a href="?page=<?php echo $_GET['page']; ?>"> BACK TO OVERVIEW </a>
    <div><b>You have reached the New Teachers View!</b></div>
    <div>Here you can create a new Teacher!(well sort of lol)</div>
    <br>
    <body>
    <form method="POST">
        <span><label for="firstName">Teacher's First Name</label></span>
        <!--    --><?php //var_dump($data);?>
        <div><input type="text" name="firstName" id="firstName" required value=""
                    placeholder="First Name"></div>
        <br>
        <span><label for="lastName">Teacher's Last Name</label></span>
        <div><input type="text" name="lastName" id="lastName" required value=""
                    placeholder='Last Name'>
            <br>
            <span><label for="email">Teacher's email</label></span>
            <div><input type="text" name="email" id="email" required value=""
                        placeholder='email'>
                <br>
         <!--   <span><label for"teacher">Assigned Teacher</label></span>
            <div><select name="teacher" id="teacher" required>
                    <?php foreach ($teacherData as $i=>$teacher): ?>
                        <option value="<?php echo $teacher['id']; ?>" <?php echo $i=0 ?'selected': '';?>> <?php echo $teacher['firstName']; ?></option>
                    <?php endforeach; ?>
                </select></div>  -->
            <br>
            <div>
                <button type="submit" name="create" id="create">create new Teacher!</button>
            </div>
    </form>
    </body>
</section>

<?php require 'includes/footer.php'; ?>
