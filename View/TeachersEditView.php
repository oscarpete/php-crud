<?php
declare(strict_types=1);
include_once "includes/header.php";
?>
<!--<body>-->
<section>
    <a href="?page=<?php echo $_GET['page']; ?>"> BACK TO OVERVIEW </a>
    <div><b>You have reached the edit view!</b></div>
    <div>Here you can edit a Teacher!</div>
    <br/>

    <form method="POST">
        <span><label for="firstName">Teacher First Name</label></span>
        <!--            --><?php //var_dump($data);?>
        <div><input type="text" name="firstName" required value='<?php echo $data['firstName']; ?>' id="firstName"
                    placeholder="First Name"></div>
        <br/>
        <label for="lastName">Teacher Last Name</label>
        <div><input type="text" name="lastName" id="lastName" required value='<?php echo $data['lastName']; ?>'
                    placeholder='Last Name'>
            <br/>
            <span><label for="email">Teacher Email</label></span>
            <div><input type="email" name="email" id="email" required value='<?php echo $data['email']; ?>'
                        placeholder='e-mail'>

                <div>
                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <button type="submit" name="edit" id="edit">Update!</button>
                </div>
    </form>
</section>
<!--    </body>-->


<?php require 'includes/footer.php'; ?>
