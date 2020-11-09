<?php
//CONNECT TO DATABASE//

$conn = mysqli_connect('localhost','fortuner','Fortuneseeker#001','ninja_pizza');

//CONNECT TO DATABASE//

//Check connection//
if(!$conn){
  echo 'connection error:'. mysqli_connect_error();
}


//write query from all pizzas//
$sql = 'SELECT title,ingredients,id FROM pizzas ORDER BY created_at';

//make query and get result//
$result = mysqli_query($conn,$sql);

//fetch the resulting rows//
$pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);

//free result from mermory//
mysqli_free_result($result);

//close connection//
mysqli_close($conn);

//explode function//
explode(',', $pizzas[0]['ingredients']);

?>
<!DOCTYPE html>
<html>



<?php include("./templates/header.php");?>

<div class="space">
	

</div>
<div class="container">
	<div class="row">
		<?php foreach($pizzas as $pizza): ?>
           <div class="col s6 md3">
           	   <div class="card z-depth-0">
           	   	<img src="images/byfood.png" class="burger">
           	   	 <div class="card-content">
           	   	 	<h6 class="text"><?php  echo htmlspecialchars($pizza['title']);  ?>  </h6>
           	   	      <ul>
           	   	      	<?php foreach(explode(',',$pizza['ingredients']) as $ing): ?>
                          <li class="text"><?php echo htmlspecialchars($ing);?></li>
           	   	      <?php endforeach;?>
           	   	      </ul>
           	   	 </div>
           	   	 <div class="card-action right-align">
           	   	 	<a href="details.php?id=<?php echo $pizza['id']?>" class="brand-text">MORE INFO</a>
           	   	 </div>
           	   </div>
           </div>
		<?php endforeach; ?>	
	</div>
</div>
<?php include("./templates/footer.php");?>





</html>
