<?php
session_start();

$val = true;

require("/wamp64/www/crud_oops/View/including/main.php");

require("/wamp64/www/crud_oops/Controller/database_controller.php");

$controller = new controller();

if (isset($_POST['delete'])) {
    $controller->delete($_POST['id']);
}
?>

<div class="container-sm p-0 h-[75vh] mt-4 overflow-auto table-data">
    <table class="table table-info table-striped">
        <tr class="fw-bold sticky top-0">
            <td>S.no</td>
            <td>Name</td>
            <td>Email</td>
            <td>Password</td>
            <td>Contact</td>
            <td>Gender</td>
            <td colspan="2"></td>
        </tr>
        <?php
        // Reading Data
        $data = $controller->read();

        foreach ($data as $value) { ?>
            <tr>
                <td><?php echo $value[0] ?></td>
                <td><?php echo $value[1] ?></td>
                <td><?php echo $value[2] ?></td>
                <td><?php echo $value[3] ?></td>
                <td><?php echo $value[4] ?></td>
                <td><?php echo $value[5] ?></td>
                <td><button class="btn btn-warning px-3 button_edit" value="<?php echo $value[0] ?>">Update</button></a></td>
                <td><button class="btn btn-danger px-3 button_delete" value="<?php echo $value[0] ?>">Delete</button></td>
            </tr>
        <?php } ?>
    </table>
</div>

<script>
    $(document).ready(() => {
        // Updating Data
        $(".button_edit").click(function() {
            $.ajax({
                url: "update.php",
                type: "POST",
                success: () => {
                    window.location.replace(`/crud_oops/View/update.php/?id=` + $(this).val());
                },
                error: () => {
                    window.location.replace("/crud_oops/View/view.php");
                }
            })
        })

        // Deleting Data

        $(".button_delete").click(function() {
            $.ajax({
                // url: "view.php", //Sending Data on the Same File
                url: "/crud_oops/Controller/database_controller.php", //Sending Data on the Controller
                type: "POST",
                data: {
                    delete:"",
                    id: $(this).val()
                },
                success: (data) => {
                    location.reload();
                },
                error: () => {
                    console.log("Error occured")
                }
            })
        })
    })
</script>

<?php require("/wamp64/www/crud_oops/View/including/footer.php") ?>