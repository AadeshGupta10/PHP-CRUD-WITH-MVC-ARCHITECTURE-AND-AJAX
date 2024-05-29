<?php require("/wamp64/www/crud_oops/View/including/header.php") ?>

<div class="text-center open_sans h1 mt-3">
    Registration Form
</div>
<div class="mx-auto w-fit my-3">
    <?php if ($val) { ?>
        <a href="index.php"><button class="btn btn-info px-5 mx-2">Form</button></a>
    <?php } else { ?>
        <a href="view.php"><button class="btn btn-warning px-5 mx-2">View</button></a>
    <?php } ?>
</div>