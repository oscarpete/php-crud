<?php require '../includes/header.php'?>

<?php require 'Connection.php' ?>

<h1>Create a new Teacher</h1>

<div class="container">
    <form action="php/create.php"
          method="post">

        <h4 class="display-4 text-center">Create</h4><hr><br>
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name"
                   class="form-control"
                   id="name"
                   name="name"
                   value="<?php if(isset($_GET['name']))
                       echo($_GET['name']); ?>"
                   placeholder="Enter name">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email"
                   class="form-control"
                   id="email"
                   name="email"
                   value="<?php if(isset($_GET['email']))
                       echo($_GET['email']); ?>"
                   placeholder="Enter email">
        </div>

        <button type="submit"
                class="btn btn-primary"
                name="create">Create</button>
        <a href="read.php" class="link-primary">View</a>
    </form>
</div>

<?php require '../includes/footer.php'?>
