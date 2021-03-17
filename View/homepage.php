<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>
    <h4>Hello <?php echo $user->getName()?>,</h4>
    <br/>
    <br/>
    <br/>
    <h2>How can we help you today?</h2>
    <br>
    <a class="btn btn-outline-info btn-lg" href="#">Students</a>
    <a class="btn btn-outline-info btn-lg" href="http://becode.local/php-crud/view/teacher/overview.php">Teachers</a>
    <a class="btn btn-outline-info btn-lg" href="#">Class</a>

    <p><a href="index.php?page=info">To info page</a></p>
    <p><a href="index.php?page=classes">To classes overview page</a></p>

    <p>Put your content here.</p>
</section>
<?php require 'includes/footer.php'?>