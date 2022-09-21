<?php
include ('record.php');
    $obj = new Database();

if(isset($_REQUEST['didd']))
   {
     $id=$obj->delete($_REQUEST['didd']);
   }

//    if(isset($_REQUEST['search']))
//    {
//     $obj->sea($_REQUEST['task']);
//    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" href="ser.css">
    </head>
<body>
        <div class="main">
            <h1><i>Search Task</i></h1>
        </div>
       <div class="main2">
            <h3>Search Here</h3>

            <div class="for">
        <form action="" method="GET">
            <I><B> ENTER-TASK</B></I> <input type="text"  name="s" >
                <br>
                <br/>
                <input class="color" type="submit" value="search" >
        </form>

      </div>
       <div  class="tab">
       <table width="90%">
        <tr class="under">
            <th>ID</th>
            <th>TASK</th>
            <th>DATE</th>
            <th>TIME</th> 
            <th>DELETE</th>
            <th>UPDATE</th>
        </tr>
     <?php
            
        
            if(isset($_GET['s']))
            {
                $searchname=$_GET['s'];
                // print_r($searchname);
               echo $query="select * from list2 where task like '%$searchname%'";
              
            }
            else
            {
                $row=(mysqli_fetch_array($query));
                
            }
           
                $row=$obj->sea($_GET);
                  
           
            // var_dump($query);
            
            $row=$obj->displayData($_GET); 
            
          
            foreach ($row as $row1) 
              
     
     { ?>
     <tr class="under1">
        <td><?php echo $row1['id'] ?></td>
        <td><?php echo $row1['task'] ?></td>
        <td><?php echo $row1['date'] ?></td>
        <td><?php echo $row1['time'] ?></td>
        <td><a href="search.php?didd=<?php echo $row1['id']?>"><i class="fa-solid fa-trash"></i></td>
        <td><a href="form.php?eidd=<?php echo $row1['id']?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
     </tr>
   
     <?php } ?>
   </table>

    </div>
</div>
    <button class="butn"><a href="design.php">Back</a></button>
</body>
</html>