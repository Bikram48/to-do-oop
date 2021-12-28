<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/editTask.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <?php
        include "../backend/task.php";
        include "../backend/editTask.php";
        if( isset($_POST['update_btn']) ) {
            $taskName = $_POST['taskname'];
             $error = "";
            if( isset($_GET['id']) ) {
                $id = $_GET['id'];
                $taskObj = new EditTask( $id,$taskName );
                if( $taskObj->validationCheck() == null ) {
                    $taskObj->editTask();
                    $taskObj->successMessage();
                    header( "Location:home.php?success=updateSuccess" );
                } else {
                    $error .= $taskObj->validationCheck();
                }      
            }
        }
    ?>
   <div class="container">
       <h2>Update Task Page</h2>
        <?php 
            if( isset($_GET['id']) ) {
                $id = $_GET['id'];
                $taskObj = new EditTask($id,"");
        ?>
       <form action="editTask.php?id=<?php echo $id; ?>" method="POST">
           <div class="row">
               <div class="col-xl-4">
                    <input type="text" name="taskname" value="<?php echo $taskObj->retrieveSingleTask(); ?>">
               </div>
               <div class="col-sm-4 col-xl-4">
                   <input type="submit" value="UPDATE" name="update_btn">
               </div>
           </div>
           <p id="error_display"> <?php if( isset($error)) { echo $error; } ?></p>
       </form>
        <?php } ?>
   </div>
</body>
</html>
