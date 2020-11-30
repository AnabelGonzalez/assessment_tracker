<form class="form-signin mb-5" id="register" action="model/register.php" method="POST">
    <h2 class="h5 mb-3 font-weight-normal text-center">Create your account</h2>
        <p>
            <label for="name">First Name</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Enter your name" required>
        </p>
        <p>
            <label for="last_name">Last name</label>
            <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Enter your last name" required>
        </p>
        <p>
            <label for="email">Email address</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="Enter email address" required autofocus>
        </p>
        <p>
            <label for="username">Username </label>
            <input type="text" id="username" class="form-control" placeholder="Enter an 8+ character username" name="username" minlength="8" required autofocus>
        </p>
        <p>
            <label for="password">Password</label> <a href="#" data-toggle="tooltip" data-placement="right" title="UpperCase, LowerCase and Number required" class="text-info">?</a>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter an 8+ character password" minlength="8" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{8,}" required>
        </p>
        
        <input type="submit" name="submit" class="btn btn-info btn-block" value="Register">
</form>