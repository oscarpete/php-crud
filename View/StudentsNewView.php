<?php
declare(strict_types=1);

include_once "includes/header.php";
?>

<section>
    <a href="?page=<?php echo $_GET['page']; ?>"> BACK TO OVERVIEW </a>
    <div><b>You have reached the New Students View!</b></div>
    <div>Here you can create a new Student!</div>
    <br>
    <body>
    <form method="POST">
        <span><label for="firstName">Student's First Name</label></span>
        <!--    --><?php //var_dump($data);?>
        <div><input type="text" name="firstName" id="firstName" required value=""
                    placeholder="First Name"></div>
        <br>
        <span><label for="lastName">Student's Last Name</label></span>
        <div><input type="text" name="lastName" id="lastName" required value=""
                    placeholder='Last Name'>
            <br>
            <span><label for="email">Student's email</label></span>
            <div><input type="text" name="email" id="email" required value=""
                        placeholder='email'>
                <br>
                </select></div>
            <br>
            <span><label for="teacher">Assigned Teacher</label></span>
            <div><select name="teacher" id="teacher" >
                    <option value><i>none</i></option>
                    <?php foreach ($teacherData as $j => $teacher): ?>
                        <option value="<?php echo $teacher['id']; ?>" <?php echo $j = 0 ? 'selected' : ''; ?>> <?php echo $teacher['firstName']; ?></option>
                    <?php endforeach; ?>
                </select></div>

            <br>
            <div>
                <button type="submit" name="action" id="action" value="create">create new Student!</button>
            </div>
    </form>
    </body>
</section>

<?php require 'includes/footer.php'; ?>
