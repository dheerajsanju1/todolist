<?php
include ('record.php');
   $obj = new Database();
 
if(isset($_POST['add']))
   {
    $obj->save($_POST);
   }
if(isset($_REQUEST['eidd']))
   {
    $id=$_REQUEST['eidd'];
    $row2=$obj->edit($id);
   }
if(isset($_REQUEST['update']))
   {
    $id=$_REQUEST['eidd'];
    $obj->update($_REQUEST);
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="form.css">
    </head>
<body>
    <div class ="heading">
        <h1> ADD TASK</h1>
    </div>
    <div class="enter">
        <p><b> <u> FORM</u></b></p>
    </div>
   <div class="header">
        <div class="form">
            <h1>Enter Following Fields</h1>
            <form action="record.php" method="post">
              <input type="hidden" name="id" value="<?php echo $row2['id']; ?>">
                <b><u> ENTER TASK</u></b><input class="inp" type="text" name="task" value="<?php if(!empty($row2['task'])) echo $row2['task']?>"/>
                <br>
                <br>
                <b> <u>ENTER DATE</u></b><input class="inp" type="date" name="date" value="<?php if(!empty($row2['date'])) echo $row2['date']?>"/>

                <br>
                <br>
                <b><u>ENTER TIME</u></b><input class="inp" type="time" name="time" value="<?php if(!empty($row2['time'])) echo $row2['time']?>"/>
                <br>
                <br>
                <input class="button" type="submit" name="add" value="ADD">
                <input class="button" type="submit" name="update" value="UPDATE">
            </form>
   </div>
</div>
   <button style="float:right; padding:10px; background-color:green; "><a style="color:white;"href="design.php">back</a></button>
</body>
</html>