<?php
	$id = $_GET['id'];
	$json = file_get_contents('http://rdapi.herokuapp.com/product/read_one.php?id='.$id);
	$data = json_decode($json,true);
	$details = array('records' => $data);
	$result = $details['records'];
	//category
	$json2 = file_get_contents('http://rdapi.herokuapp.com/category/read.php');
	$data2 = json_decode($json2,true);
	$category = $data2['records'];
?>
<html> 
	<head>  
      <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
<form action="pro_update.php?id=<?php echo $id ?>" method="POST">
<div class="box">
		<div class="insidebox">
			<img class="pic" src="images/create2.png" alt="Girl in a jacket" height="352" width="410">
				<div class="detail">
					<div class="txtholder">
					
					
<h3 style="margin-right: 40%;"> Edit </h3>
<hr>
	<input class="detail" type="text" name="name" value="<?php echo $result['name'];?>"/>
	<input class="detail" type="text" name="description" value="<?php echo $result['description']; ?>"/>
	<input class="detail" type="text" name="price" value="<?php echo $result['price']; ?>"/>
	<select class="wew" name="category">
	<option value="<?php echo $result['category_id'];?>"><?php echo $result['category_name'];?></option>
		<?php
		foreach($category as $cview){
		?>
			<option  class="others" value="<?php echo $cview['id']?>"><?php echo $cview['name']?></option>
		<?php
		}
		?>
		</select>
	<input type="submit"  class="send" name="submit" value="submit"/>

</form>
</html>
