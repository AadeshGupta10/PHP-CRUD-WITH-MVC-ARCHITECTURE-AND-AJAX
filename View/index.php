<?php
$val = false;
require("/wamp64/www/crud_oops/View/including/main.php");

require("/wamp64/www/crud_oops/Controller/database_controller.php");

$controller = new controller();

if (isset($_POST["create"])) {
    $controller->create($_POST["name"], $_POST["email"], $_POST["password"], $_POST["contact"], $_POST["gender"]);
}
?>

<!-- Form Start -->
<form id="form" class="md:w-6/12 lg:w-4/12 mx-auto d-flex flex-col gap-2" autocomplete="off">
    <div>
        <label for="name" class="form-label fw-semibold">First Name</label>
        <input type="text" name="name" id="name" class="form-control" minlength="2" maxlength="30">
    </div>
    <div>
        <label for="email" class="form-label fw-semibold">Email</label>
        <input type="email" name="email" id="email" class="form-control" readonly onfocus="removeAttribute('readonly')" maxlength="30">
    </div>
    <div>
        <label for="password" class="form-label fw-semibold">Password</label>
        <input type="password" name="password" id="password" class="form-control" minlength="4" maxlength="12">
    </div>
    <div>
        <label for="contact" class="form-label fw-semibold">Contact No.</label>
        <input type="tel" name="contact" id="contact" class="form-control" minlength="10" maxlength="10">
    </div>
    <div>
        <label for="gender" class="form-label fw-semibold">Gender</label>
        <br>
        <select name="gender" id="gender" class="form-select">
            <option value="Male" selected>Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <div>
        <button type="submit" id="create" class="btn btn-outline-danger mt-2 w-full">Submit</button>
    </div>
</form>
<!-- Form End -->

<script>
    $(document).ready(() => {
        $("form").submit((e) => {
            e.preventDefault();
            $.ajax({
                // url: "index.php", //Sending Data on the Same File
                url:"/crud_oops/Controller/database_controller.php", //Sending Data on the Controller
                type: "POST",
                data: {
                    create: "",
                    name: $("#name").val(),
                    email: $("#email").val(),
                    password: $("#password").val(),
                    contact: $("#contact").val(),
                    gender: $("#gender").val()
                },
                success:()=>{
                    window.location.replace("/crud_oops/View/view.php");
                },
                error:()=>{
                    console.log("error");
                }
            })
        })
    })
</script>

<?php require("/wamp64/www/crud_oops/View/including/footer.php"); ?>