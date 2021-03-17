<?php
declare(strict_types=1);
include_once "includes/header.php";
?>
<section>
    <b>Testing class overview</b>
    <!--here we should generate an overview of classes that are loaded from the database-->
    <table>
        <thead>

        </thead>
        <tbody>
        <?php foreach ($classes as $i => $myClass) : ?>
            <tr>
                <td>Line <?php echo $i; ?> </td>
                <td>table row: <?php echo $myClass['className']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</section>

<?php require 'includes/footer.php' ?>
