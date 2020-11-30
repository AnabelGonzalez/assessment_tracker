<div class="container">

    <h1 class="h1 text-dark mt-5 center">Profile</h1>

    <div class="container-fluid mt-5 profile">
        <form action="model/edit_profile.php" id="editProfile" method="POST">
            <?php require('model/select_profile.php'); 
            if(!empty($user)) { 
                foreach($user as $row) {
                
                    $user_ID = $row['user_ID'];
                    $username = $row['username'];
                    $name = $row['name'];
                    $last_name = $row['last_name'];
                    $email = $row['email']; ?>
           
            <input type="hidden" class="form-control" id="user_ID" name="user_ID" value="<?php echo $user_ID; ?>">

             <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" readonly>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name; ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            
            <div class="form-row pt-2">
                <div class="col-6 text-right">
                    <input type="submit" class="btn btn-info" value="Save" name="submit" id="saveEdits" disabled>
                </div>
                <div class="col-6 text-left">
                    <input type="button" class="btn btn-danger delete-account" name="delete" value="Delete Account" id="<?php echo $user_ID;?>">
                </div>
            </div>
        <?php  
            } 
        } ?>
        </form>
        <br>
        <br>
    </div>
</div>