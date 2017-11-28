<?php
$conn=mysqli_connect("localhost","root","","db_newsportal");

    $re=$_GET['r'];
      if(isset($re) && !empty($re))
      {
        if($re=="vot1")
        {
          $sql="update tbl_vooting_pool set vot1=vot1+1 where id='1'";
        }
        elseif($re=="vot2")
        {
          $sql="update tbl_vooting_pool set vot2=vot2+1 where id='1'";
        }
        elseif($re=="vot3")
        {
          $sql="update tbl_vooting_pool set vot3=vot3+1 where id='1'";
        }
        mysqli_query($conn,$sql);
        $my=mysqli_query($conn,"select * from tbl_vooting_pool");
        $ft=mysqli_fetch_array($my);
        $vot1=100*round(($ft['vot1']/($ft['vot1']+$ft['vot2'])),2);
        $vot2=100*round(($ft['vot2']/($ft['vot1']+$ft['vot2'])),2);
        $vot3=100*round(($ft['vot3']/($ft['vot1']+$ft['vot2'])),2);

        echo "<br>";
        echo "<span style='color:red;font-size:18px;'>হ্যাঁ = ".$vot1."%&emsp;</span><br>";
        echo "<span style='color:red;font-size:18px;'>না = ".$vot2."%&emsp;</span><br>";
        echo "<span style='color:red;font-size:18px;'>বোলবনা = ".$vot3."%</span>";

      } 

      $query = mysqli_query($conn,"select * from tbl_vooting_pool");
      $result=mysqli_fetch_array($query);
      $total = $result['vot1']+$result['vot2']+$result['vot3'];
      echo "<br></br>";
      echo "<span style='font-size:18px;'>ভোট দিয়েছেন $total জন ।</span>";


       /* echo "<pre>";
       print_r($id);
       exit();*/
?>