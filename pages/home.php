<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../style/home.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <title>Document</title>
</head>
<body>
    <?php
        $error="";
        include "../backend/task.php";
        include "../backend/addTask.php";
        if( isset($_POST['addtaskbtn']) ) {
            $taskname=$_POST['task_name'];
             $task=new AddTask( "",$taskname );
             if( $task->validationCheck()==null ) {
                $task->addTask();
                $task->successMessage();
             } else {
                $error.=$task->validationCheck();
             }      
        }
      
    ?>
    <div class="container">
        <h2>To-Do Task App</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="row">
                <div class="col-xl-4">
                    <input type="text" placeholder="Enter task name" name="task_name"/>
                </div>
                <div class="col-xl-4">
                    <input type="submit" name="addtaskbtn"/>
                </div>
            </div>
            <p id="error_display">
                <?php if( isset($error)) { echo $error; } ?>
            </p>
        </form>
        <form>
            <div class="form-group">
                <?php 
                    $taskObj=new AddTask( "","" );
                    //$taskObj->retrieveTask();
                    foreach( $taskObj->retrieveTask() as $key=>$value ) {
                ?>
                <div class="row">
                    <div class="col-sm-offest-2 col-xl-4">
                        <div class="checkbox">
                            <input type="checkbox" name="ids[]"><span id="taskname"><?php echo $value; ?></span>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <a href="edit_task.php"><i class="fas fa-edit" ></i></a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <input type="submit" value="DELETE SELECTED" name="delete_task_btn">
        </form>
    </div>
</body>
</html>