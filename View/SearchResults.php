<?php
declare(strict_types=1);

include_once "includes/header.php"; ?>

    <section>
        <br>
        <h3>You looked for <i><?php echo $GET['find']?></i> and this is what we found:</h3>
        <br>
        <?php if (isset($data)):
//            var_dump($data);
            foreach ($data as $result):?>
                <div>
                    <a href="?page=<?php echo $result['inTable']?>&id=<?php echo $result['id']?>"><?php echo $result['name']?></a>
                </div>
                <br>
            <?php
            endforeach;
        else:
            echo('Something went wrong.');
        endif; ?>
    </section>

<?php require 'includes/footer.php'; ?>