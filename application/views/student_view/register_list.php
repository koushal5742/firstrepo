
<?php 
include('header.php');
?>
<form method="get" action="<?= base_url()?>StudentRegister/registerList">
     <input type="text" name="sh" value="<?php if($keyword !=''){
      echo $keyword;
     }else{  echo '';} ?>" class="input-search" placeholder="Search here...">
      <button type="submit"><i class='bx bx-search-alt'></i>Search</button>
</form>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Listing</title>
</head>

<body>
    
    <table border="2px" class="table">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Id</th>
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
                <th>Action</th>
        </thead>
        </tr>
        <?php

        $i = 1;
        if (!empty($h)) {
            foreach ($h as $row) {
        ?>
                <tr class="removeTr<?= $row->id ?>">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td><?php echo $row->city; ?></td>
                    <td><?php echo $row->country; ?></td>
                    <td><?php echo $row->state; ?></td>
                    <td><?php echo $row->pincode; ?></td>
                    <td><?php echo $row->phone; ?></td>
                    <td><?php echo $row->dob; ?></td>
                    <td><?php echo $row->department_name; ?></td>
                    <td><?php echo $row->branch_name; ?></td>
                    <td> <a href="<?= base_url('StudentRegister/updatedata/' . $row->id) ?>">Edit</a>

                        <button class="deleteUser" alt="<?= $row->id; ?>">Delete</button>
                    </td>

                </tr>

        <?php $i++;
            }
        } ?>

    </table>
    <p><?php echo $links;  ?></p>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.deleteUser').on('click', function() {
            var id = $(this).attr('alt');
            if (id != '') {
                // alert($id);
                if (!confirm('Are you sure to delete this?')) return false;
                $.ajax({
                    url: '<?= base_url('StudentRegister/dltdata'); ?>',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(result) {
                        //alert(result);
                        var res = result.split("|");
                        if ($.trim(res[0]) == 'success') {
                            alert(res[1]);
                            $(".removeTr" + id).remove();

                        } else {
                            alert(res[1]);
                        }
                    }
                })
            } else {

                alert();
            }
        });
    });
</script>