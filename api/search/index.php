<?php 
include 'include/header.php';

?>


  
    
      <form class="search" action="search.php" method="POST"> 
      <input type="text" name="sea" placeholder="What are you looking for?">
       <button type="submit" name="sub">
         <i class="fa fa-search"></i>
      </button>
      </form>
   <h1>Front pages</h1>
   <h2>All Proudcts</h2>
   <div class="proudcts">
     
     <?php 
     $sql = "Select * From search";
     $res = mysqli_query($conn , $sql);
     $qr = mysqli_num_rows($res);
     
     if($qr > 0){
      while ($row = mysqli_fetch_assoc($res)){
       
        
          echo '<img src="data:image/jpeg;base64,'. base64_encode( $row['img']) .'" />';
        
        echo "<div>
        <h3> ".$row["name"]."</h3>
        
        <p> ".$row["dess"]."</p>
        <p> ".$row["rate"]."</p>
        <p> ".$row["price"]."</p>
        <hr>
        <br>
        
        
        </div>";

      }


     }
     
     
     ?>
   </div>
 
  
</body>
</html>