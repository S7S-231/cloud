<?php 
include "include/header.php";

?>

<h1>Search Page</h1>
<div>
<?php 
if (isset($_POST['sub'])){
    $sea = mysqli_real_escape_string($conn , $_POST['sea']);
    $sql = "Select * From search WHERE name LIKE '%$sea%' OR dess LIKE '%$sea%'";

    $res = mysqli_query($conn , $sql);
    $queryr = mysqli_num_rows($res);

    echo "There are ".$queryr." Products";
    if($queryr > 0){
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
}
    else {
        echo "Not Matching";
    }

?>
</div>
