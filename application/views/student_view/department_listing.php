<?php 
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container">
    <table border="2px">
        <thead>
            <tr>
                <th>Id</th>
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
                <td><?php echo $row->department_name; ?></td>
                <!-- <td><a href='#'>Edit</a>
                    <a href='#'>Delete</a>
                </td>; -->
            </tr>

        <?php $i++; }
        ?>
    </table>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</html>