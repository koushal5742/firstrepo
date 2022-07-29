<form method="get" action="<?= base_url()?>StudentRegister/departmentdata">
     <input type="text" name="search" value="<?php if($keyword !=''){
      echo $keyword;
     }else{  echo '';} ?>" class="input-search" placeholder="Search here...">
      <button type="submit"><i class='bx bx-search-alt'></i>Search</button>
</form>
<!DOCTYPE html>
<html>
  <head>
    <title>pagination</title>
  </head>
  <body>
  <body>
<div id="container">
   <div id="body">
       <table border="2px" >
       <thead>
                        <tr>
                
                <th>S.no</th>
                <th>Name</th>
                <th>Email</th>
                <th>City</th>
                <th>Country</th>
                <th>State</th>
                <th>PinCode</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>Department</th>
                <th>Branch</th>
               
                        </tr>
             </thead>
       <?php
        $i = 1;
       foreach($results as $row) {  ?>
       
          <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td><?php echo $row->city; ?></td>
                    <td><?php echo $row->country; ?></td>
                    <td><?php echo $row->state; ?></td>
                    <td><?php echo $row->pincode; ?></td>
                    <td><?php echo $row->phone; ?></td>
                    <td><?php echo $row->dob; ?></td>
                    <td><?php echo $row->department; ?></td>
                    <td><?php echo $row->branch; ?></td>
          </tr> 
    <?php  $i++;   } 
       ?>
   </div>
  </table>
  <p><?php echo $links;  ?></p>
</div>
</body>
  </body>
  

</html>