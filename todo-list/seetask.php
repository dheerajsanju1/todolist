<?php
include ('record.php');
   $obj = new Database();

if(isset($_REQUEST['didd']))
   {
     $id=$obj->delete($_REQUEST['didd']);
   }
   $obj->find();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="see.css">
</head>
<body>
  
      <div class="main">
         <h1><i>All Tasks</i></h1>
      </div> 
         <div  class="main2">
            <h3><b><u> Here You Can See</u></b></h3>
            <h4><u> All the Tasks List</u></h4>
            <div class="tab">
            <table  width="90%" cell-padding="3">
         <tr class="under">
            <th>ID</th>
            <th>TASK</th>
            <th>DATE</th>
            <th>TIME</th> 
            <th>DELETE</th>
            <th>UPDATE</th>

         </tr>
     <?php 
         $row=$obj->displayData($_POST); 
         foreach($row as $row1) 
         { ?>
         <tr class="under1">
         <td><?php echo $row1['id'] ?></td>
         <td><?php echo $row1['task'] ?></td>
         <td><?php echo $row1['date'] ?></td>
         <td><?php echo $row1['time'] ?></td>
         <td><a href="seetask.php?didd=<?php echo $row1['id']?>"><i class="fa-solid fa-trash"></i></td>
         <td><a href="form.php?eidd=<?php echo $row1['id']?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
         </tr>
     <?php } ?>
   </table>
     </div>

       <select class="sel" name="options" id="">
            <option value="completed">completed</option>
            <option value="progress">progress</option>
            <option value="upcoming">upcoming</option>
      </select>
     
   </div>
      <button class="btn"><a href="design.php">Back</a></button>
   <?php
   //      $obj1=new database();
   //      $obj1->find();
   // ?>
  
</body>
</html>