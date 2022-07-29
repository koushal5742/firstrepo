<?php  include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Listing</title>
</head>

<body>
    <table border="2px">
        <thead>
            <tr>
                <th>Sno.</th>
                <th>Name</th>

                <!-- <th>Action</th> -->
        </thead>
        </tr>
        <?php
        $i = 1;
        foreach ($h as $row) {
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row->branch_name; ?></td>
                <!-- <td><a href='#'>Edit</a>
                    <a href='#'>Delete</a>
                </td>; -->
            </tr>

        <?php   $i++; }
        ?>
    </table>
</body>

</html>