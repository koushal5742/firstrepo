<!DOCTYPE html>

<html lang="en">

<head>

    <title></title>

    <meta charset="utf-8">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<!-- 
    <style type="text/css">
        html,
        body {
            font-family: 'Raleway', sans-serif;
        }

        a {
            color: #007bff;
            font-weight: bold;
        }
    </style> -->

</head>

<body>
   
    <div class="card">
            <div class="card-header">
                
            </div>
            <div class="card-body">
                <!-- Posts List -->
                <table class="table table-borderd" id='postsList'>
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
               
                        </tr>
             </thead>
                <tbody></tbody>
                </table>
                <!-- Paginate -->
             <div id='pagination'></div>
            </div>
        </div>
    </div>
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type='text/javascript'>
        $(document).ready(function() {
     $('#pagination').on('click',  function(e) {
                e.preventDefault();
               var pageno = $('#pagination .page-link a  ').attr('data-ci-pagination-page');
            // var pagenoe = $(this).attr('data-ci-pagination-page');
            // alert(pageno);
                loadPagination(pageno);
            });
            loadPagination(0);
   function loadPagination(pagno) {
                $.ajax({
                  url: '<?= base_url()?>StudentRegister/loadRecord',
                    type: 'post',
                    data :{
                        pageno:pagno
                    },
                    dataType: 'json',
                    success: function(response) {
                       //console.log(response)

                        $('#pagination').html(response.pagination);
                        createTable(response.result, response.row);
                    }
             });
         }
            function createTable(result, sno) {
                sno = Number(sno);
                $('#postsList tbody').empty();
                for (index in result) {
                    
                    var id = result[index].id;
                    var name = result[index].name;
                    var email = result[index].email;
                    var country = result[index].country;
                    var city = result[index].city;
                    var phone = result[index].phone;
                    var state = result[index].state;
                    var pincode = result[index].pincode;
                    var dob = result[index].dob;
                    var department = result[index].department;
                    var branch = result[index].branch;
                    
                    sno += 1;
                    var tr = "<tr>";
                    tr += "<td>" + sno + "</td>";
                    tr += "<td>" + id + "</td>"; 
                    tr += "<td>" + name + "</td>";
                    tr += "<td>" + email + "</td>";
                    tr += "<td>" + city + "</td>";
                    tr += "<td>" + country + "</td>";
                    tr += "<td>" + state + "</td>";
                    tr += "<td>" + pincode + "</td>";
                    tr += "<td>" + phone + "</td>";
                    tr += "<td>" + dob + "</td>";
                    tr += "<td>" + department + "</td>";
                    tr += "<td>" + branch + "</td>";
                    tr += "</tr>";
                    $('#postsList tbody').append(tr);
                }
            }
        });
    </script>

</body>

</html>