<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  
  <title>IMS</title>

</head>
<body>

  <div class="w3-bar w3-light-grey w3-border w3-medium">
    <a href="./home.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home"></i></a>
    <a href="./home.php" class="w3-bar-item w3-button w3-text-teal">INVENTORY MANAGEMENT SYSTEM</a>
    <a href="./index.html" class="w3-bar-item w3-button w3-text-teal w3-right"><i class="fa fa-sign-out-alt"></i></a>
  </div>
  <div class="w3-panel w3-teal w3-center">
    <h3>Products available</h3>
  </div>

  <?php
  	require_once('connect.php');
  	$products =	"SELECT * FROM `product`";
  	$result=mysqli_query($connection,$products);
  	if ($result) {
    		if ($result->num_rows > 0) {
    			while($row= mysqli_fetch_array($result)) {
    				$components = mysqli_query($connection, "SELECT * FROM `component`, `product` WHERE `component`.product=product.id AND `product`.id='".$row['id']."' AND `component`.`borrow_id` IS NULL");
    				echo '<div class="w3-cell w3-mobile w3-hover-shadow w3-light-grey w3-margin w3-center w3-border">';
            echo '<header class="w3-container w3-teal"><h4>'.$row['name'].'</h4></header>';
            echo '<div class="w3-bar-block w3-text-teal">';
            echo '<div class="w3-bar-item">Quantity : '.mysqli_num_rows($components).'</div>';
    				echo '<div class="w3-bar-item">Category : '.$row['category'].'</div>';
    				echo '<div class="w3-bar-item">Description : '.$row['description'].'</div>';
            echo '</div>';
            echo '</div>';
    			}
    		}
    	}

      echo '<div class="w3-panel w3-teal w3-center">
        <h3>Maintainers</h3>
      </div>';
    	
      $maintainers = mysqli_query($connection, "SELECT `member`.`id`, name, contact, role FROM `member`, `maintainer` WHERE `maintainer`.`id`=`member`.`id`;");
    	if ($maintainers) {
    		if ($maintainers->num_rows > 0) {
    			while($row= mysqli_fetch_array($maintainers)) {
            echo '<div class="w3-container w3-cell w3-mobile w3-hover-shadow w3-light-grey w3-margin w3-center w3-border">';
    				echo '<h5>'.$row['role']."</h5><h6>".$row['name'].'</h6>';
            echo '<h5>'.'Contact'."</h5><h6>".$row['contact'].'</h6>'; 
            echo '</div>';
    			}
    		}
    	} 				
  ?>

</body>
</html>
