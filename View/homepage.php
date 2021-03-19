<?php require 'includes/header.php' ?>
    <!-- this is the view, try to put only simple if's and loops here.
    Anything complex should be calculated in the model -->

    <h1 align="center">Welcome Becodian</h1>
    <section>
        <div id="home" class="row">
            <!--    <h4>Hello --><?php //echo $user->getName()?><!--,</h4>-->
            <div class="col-sm-3">
                <img src="View/img/info-icon.png" alt="zipfile" width="250px" height="200px" class="icon"/>
                <div class="overlay">
                    <p><a class="link" href="index.php?page=info">I want information</a></p>
                </div>

            </div>

            <div class="col-sm-3">
                <img src="View/img/class-icon.png" alt="classroom icon" width="250px" height="200px" class="icon"/>
                <div class="overlay">
                    <p>
                        <a class="link" href="index.php?page=classes">I want to see all the classes</a></p>
                </div>

            </div>

            <div class="col-sm-3">
                <img src="View/img/teacher-icon.png" alt="classroom icon" width="250px" height="200px" class="icon"/>
                <div class="overlay">
                    <p>
                        <a class="link" href="index.php?page=teachers">I want to see all teachers</a></p>
                </div>

            </div>

            <div class="col-sm-3">
                <img src="View/img/student-icon.png" alt="classroom icon" width="250px" height="200px" class="icon"/>
                <div class="overlay">
                    <p>
                        <a class="link" href="index.php?page=students">I want to see all students</a></p>
                </div>

            </div>

        </div>

        <p>Put your content here.</p>
    </section>


<?php require 'includes/footer.php' ?>