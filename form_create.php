<?php
	//category
	$json = file_get_contents('http://rdapi.herokuapp.com/category/read.php');
	$data = json_decode($json,true);
	$category = $data['records'];
?>
<html>
<title>Create</title>
<header>
<link rel="stylesheet" type="text/css" href="css/style.css">
</header>
<body>
<div class="container">
	
<form method="POST" action="pro_create.php">
	<div class="box">
		<div class="insidebox">
			<img class="pic" src="images/create2.png" alt="Girl in a jacket" height="352" width="410">
				<div class="detail">
					<div class="txtholder">
					
					
<h3> Create  </h3>
<hr>
<input class="detail" type="text" name="name" placeholder="name"/>
<input  class="detail" type="text" name="description" placeholder="description"/>
<input  class="detail" type="text" name="price" placeholder="price"/>
<select class="wew" name="category">
<option value="">--Category--</option>
	<?php
      foreach($category as $cview){
    ?>
		<option class="others" value="<?php echo $cview['id']?>"><?php echo $cview['name']?></option>
    <?php
      }
    ?>
	</select>
<input class="send" type="submit" name="submit" value="submit"/>
</form>
</body>
</html>