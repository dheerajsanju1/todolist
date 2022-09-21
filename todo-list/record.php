
<?php
// session_start();
class Database {
  
    public $pdo;

    public function __construct() {
        $host   = 'localhost';
        $dbname = 'task';
        $user   = 'root';
        $pass   = '';
        try
        {
            $this->pdo = new mysqli($host, $user, $pass, $dbname );
            if(mysqli_connect_error()){
              echo "not connected";
            }else{
              // echo "connected";
              return $this->pdo;
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage("yes");

        }
    }
    public function save($post)
    {
         $task = $this->pdo->real_escape_string($_POST['task']);
         $date = $this->pdo->real_escape_string($_POST['date']);
        //  $save=$date;
    //  var_dump($save);      
      
         $time= $this->pdo->real_escape_string($_POST['time']);
         $query=("insert into list2 (task,date,time) values('$task','$date','$time')");
         $sql = $this->pdo->query($query);
         if($sql==true)
         {
          echo "inserted record";
          // header("location:form.php");
          echo "<script>
              alert('task entered');
              window.location.href='form.php';
              </script>";
         }
         else{
          echo "not record";
         }
    }
        public function displayData() 
        {
          $query = "select * from list2";
          $result=$this->pdo->query($query);
          if($result->num_rows > 0)
          {
            $data=array();
            while ($row=$result->fetch_assoc())
            { 
              $data[]=$row;
            }
            return $data;
        //  print_r($data);
          }
          else
          {
            echo "no record found";
          }

    }
        public function delete($id)
        {
          $query="delete from list2 where id='$id'";
          $sql = $this->pdo->query($query);
          if($sql==true)
          {
            // header("location:seetask.php");
            echo "<script>
                alert('task deleted');
                window.location.href='seetask.php';
                </script>"; 
          }
          else
          {   
            echo "Record not deleted";
          }
    }

        public function edit($id)
        {
          $query="select * from list2 where id='$id'";
          $result=$this->pdo->query($query);
          if($result->num_rows > 0)
          {
            $row2=$result->fetch_assoc();
            return $row2;
          }
          else
          {
            echo "no record found";
          }

    }
        public function update($post)
        {

          $task=$this->pdo->real_escape_string($_POST['task']);
          $date=$this->pdo->real_escape_string($_POST['date']);
          $time=$this->pdo->real_escape_string($_POST['time']);
          $id=$this->pdo->real_escape_string($_POST['id']);
          if(!empty($id) && !empty($post))
          {
            $query="update list2 set task='$task',date='$date', time='$time' where id=$id";
            $sql = $this->pdo->query($query);
            if($sql==true)
            {
              // header("location:seetask.php");
              echo "<script>
                  alert('task updated');
                  window.location.href='seetask.php';
                  </script>";
            }
            else
            {   
              echo "Record not update";
            }
          }
        }

          public function sea($searchname)
          {
          //  var_dump($task);
       
            // $query = "select * from list2 where task like '%$task%'";
            // // var_dump($query);
            // $result=$this->pdo->query($query);
            // $num_result=$result->num_rows;
            // var_dump($num_result);
            // if($num_result > 0)
            // {
            //   while($rows=$result->fetch_assoc())
            //   {
            //     $this->data[]=$rows;
            //   }
            //    return $this->data;
            // }
            // else
            // {
            //   echo " no record found";
            // }
              $query=mysqli_fetch("$this->pdo,select * from list2 where task like'%searchname%'");
              // print_r($query);
              // $sql=$this->pdo->query($query);
              // $result=->query($query);
              // print_r($result);
             
             
              

          }

       public function find()
        {
          // echo $this->save($_POST)->date;
          echo "<br>";
          date_default_timezone_get();
        $now= date("Y-m-d");
        echo $now;
      $query="select * from list2 where date='$date' ";
      // var_dump($date);
      $sql = $this->pdo->query($query);
     var_dump($sql);
      if($sql == $now)
      {
        echo "now";
      }
      if($sql > $now)
      {
        echo "next";
      }
      if($sql < $now)
      {
        echo "completed"; 
      }
   
      
  }

}
      

// $obj= new database();
// $obj->sea();
//
  


?>