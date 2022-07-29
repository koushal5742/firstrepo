<?php  include('header.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Update Data</title>
</head>
 
<body>
 <?php
  $i=1;
  
  foreach($h as $row)
  {
  ?>
	<form method="post">
		<table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <td width="230">Name </td>
    <td width="329"><input type="text" name="name" value="<?php echo $row->name; ?>"/></td>
  </tr>
  <tr>
    <td>City</td>
    <td><input type="text" name="city" value="<?php echo $row->city; ?>"/></td>
  </tr>
  <tr>
    <td>Country </td>
    <td><input type="text" name="country" value="<?php echo $row->country; ?>"/></td>
  </tr>
  <tr>
    <td>State </td>
    <td><input type="text" name="state" value="<?php echo $row->state; ?>"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    <input type="hidden" name="id" value="<?php echo $row->id; ?>"/>
	<input type="submit" name="update" value="Update_Records"/>
    <?= $messge; ?>
    </td>
    
  </tr>
</table>
	</form>
	<?php } ?>
</body>
</html>