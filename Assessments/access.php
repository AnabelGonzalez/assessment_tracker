<?php

require('view/head.php');

?>

<div id="container">

    <h1 class="h2 text-center text-dark mb-3 mt-3">My Assessment Tracker</h1>

    <div class="form-container">
        <div class="tabs">
            <div class="left-tab tab active btn btn-secondary text-light text-center" id="login">
                <h2 class="h6 pt-1">Log In</h2>
            </div>
            <div class="right-tab tab btn btn-secondary text-light text-center" id="register">
                <h2 class="h6 pt-1">Register</h2>
            </div>
        </div> <!--End Tabs-->
        <div class="login-form bg-light">
            Choose to register or login
        </div><!-- Login Form cont Ends -->
    </div><!-- Form Container Ends -->
</div> <!--End Container-->

<?php
require('view/footer.php');

?>