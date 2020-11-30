
<div class="container">
    <div class="container bg-white p-3">
        <div class="container-fluid mb-5">
            <a href="index.php" class="btn btn-danger float-right">x</a>
            <h2 class="text-dark text-center">Edit Assessment</h2>
        </div>
        <?php require('model/select_assessment.php');

        $id = $_GET['id'];
    
        if(!empty($assessment )) { 
            foreach($assessment as $row) {
            
                $unit = $row['unit_name'];
                $assessment_name = $row['assessment_name'];
                $date = $row['due_date']; 
        ?>
        <form action="model/edit_assessments.php" method="POST" id="edit_assessment">
                <input type="hidden" id="user_ID" name="user_ID" value="1">
                <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
            <div class="form-group">
                <label for="unit_name">Unit Name</label>
                <input type="text" class="form-control" id="unit_name" value="<?php echo $unit ?>" name="unit_name">
            </div>
            <div class="form-group">
                <label for="assessment_name">Assessment Name</label>
                <input type="text" class="form-control" id="assessment_name" value="<?php echo $assessment_name; ?>" name="assessment_name">
            </div>
            <div class="form-group pb-3">
                <label for="due_date">Due Date</label>
                <input type="date" class="form-control" id="due_date" value="<?php echo $date;?>" name="due_date">
            </div>
            <div class="container">
                <input type="submit" name="submit" class="btn btn-info" value="Save">
            </div>
        </form>
        <?php 
            }
        } ?>
    </div>
</div> 