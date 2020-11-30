<div class="screen">

    <div class="container mb-2">

        <?php require('controller/session.php'); ?>

        
        <hr class="mb-1">
        <h1 class="h1 text-dark mt-5 center">My Assessments</h1>

        <div class="container-fluid mt-3">
            <table class="table table-striped table-responsive-sm">
                <thead class="bg-dark text-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Unit Name</th>
                    <th scope="col">Assessment Name</th>
                    <th scope="col">Due Date</th>
                    <th scope="col" colspan="2" class="text-center"></th>
                    </tr>
                </thead>
                <?php require('model/select_assessments.php'); ?>
                
                <tbody>

                    <?php

                    if(!empty($assessment )) { 
                        foreach($assessment as $row) {
                        
                            $id = $row['id'];
                            $unit = $row['unit_name'];
                            $assessment_name = $row['assessment_name'];
                            $date = $row['due_date'];
                            ?>
                    <tr>
                    <th scope="row"><?php echo $id; ?></th>
                    <td><?php echo $unit; ?></td>
                    <td><?php echo $assessment_name; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($date)); ?></td>
                    <td class="text-right">
                        <a class="btn btn-info btn-sm text-white" href="edit_assessment.php?id=<?php echo $id; ?>" >Edit</a>
                    </td>
                    <td class="text-left">
                        <input type="button" class="btn btn-sm btn-danger delete delete-assessment" value="Delete" id="<?php echo $id; ?>">
                    </td>
                    </tr>

                    <?php    
                        } 
                    } ?>
                    
                </tbody>
                </table>
        </div>

        <div class="container">

            <div class="container mt-5">
                <div class="row">
                    <div class="col-1 text-center">
                    </div>
                    <div class="col-5 text-right">
                        <button class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop"><i class="material-icons" >
                        calendar_today
                        </i> &nbsp; Add Assessment</button>
                    </div>
                    <div class="col-5 text-left">
                        <a href="profile.php" class="btn btn-info"><i class="material-icons">
                        person
                        </i> &nbsp; Edit Profile</a>
                    </div>
                    <div class="col-1 text-center">
                    
                    </div>
                </div> <!--End Row-->
            </div> <!--End Container-->
            
        </div> <!--End Container-->

        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content p-4">
                    <div class="modal-header mb-3">
                        <h2 class="text-dark">Add Assessment</h2>
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">x</button>
                    </div>
                    <form action="model/insert_assessment.php" method="POST" id="assessment">
                            <input type="hidden" id="user_ID" name="user_ID" value="<?php echo $username;?>" >
                        <div class="form-group">
                            <label for="unit_name">Unit Name</label>
                            <input type="text" class="form-control" id="unit_name" placeholder="Add Unit Name" name="unit_name" required>
                        </div>
                        <div class="form-group">
                            <label for="assessment_name">Assessment Name</label>
                            <input type="text" class="form-control" id="assessment_name" placeholder="Add Assessment Name" name="assessment_name" required>
                        </div>
                        <div class="form-group pb-3">
                            <label for="due_date">Due Date</label>
                            <input type="date" class="form-control" id="due_date" name="due_date" required>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="submit" class="btn btn-info" value="Add">
                        </div>
                    </form>
                    
                </div>
            </div>
        </div> <!--End Modal-->
        <br>
        <br>
    </div><!--End Container-->

</div> <!--End Screen-->