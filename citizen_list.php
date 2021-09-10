<?php
require "connection.php";
$sql = "select * from citizen";
$result = mysqli_query($conn, $sql);

$citizen = array();

while ($row = mysqli_fetch_assoc($result)) {
    $citizen[] = $row;
}
?>
<html>
<head>
    <title>Home Page</title>
    <style>
        .error {
            color: red;
        }
    </style>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div id="homepage" class="card" style="margin-top: 80px">
        <div class="card-header">
            <h3>Citizen List Collection</h3>
            <a class="btn btn-sm btn-secondary" href="index.php">Register Citizen Form</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <select name="type" id="type" class="form-control">
                        <option value="">Choose one</option>
                        <option value="mob_number">Mobile Number</option>
                        <option value="citizen_number">Citizen Number</option>
                        <option value="dob">Date of Birth</option>
                    </select>
                </div>

                <div class="col-4 offset-4">
                    <input type="text" name="search" placeholder="Search" class="form-control search">
                </div>
            </div>
            <br>
            <table class="table table-responsive table-striped">
                <tr>
                   <th>Full Name</th>
                   <th>Father Name</th>
                   <th>Mother Name</th>
                   <th>DOB</th>
                   <th>Citizenship Number</th>
                   <th>Issue District</th>
                   <th>Issue Date</th>
                   <th>Mobile Number</th>
                   <th>Voter Id</th>
                   <th>Is Verified</th>

                </tr>
                <tbody class="table-body">
                <?php
                if (count($citizen) > 0) {
                    for ($i = 0; $i < count($citizen); $i++) {
                        ?>
                        <tr>
                            <td><?php echo $citizen[$i]['fullname'] ?></td>
                            <td><?php echo $citizen[$i]['fathername'] ?></td>
                            <td><?php echo $citizen[$i]['mothername'] ?></td>
                            <td><?php echo $citizen[$i]['dob'] ?></td>
                            <td><?php echo $citizen[$i]['citizen_no'] ?></td>
                            <td><?php echo $citizen[$i]['issue_district'] ?></td>
                            <td><?php echo $citizen[$i]['issue_date'] ?></td>
                            <td><?php echo $citizen[$i]['mobile_no'] ?></td>
                            <td><?php echo $citizen[$i]['voter_id'] ?></td>
                            <td><?php echo $citizen[$i]['is_verified'] ?></td>

                        </tr>
                        <?php
                    }
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

<script type="text/JavaScript" src="src/js/bootstrap.min.js"></script>
<script type="text/JavaScript" src="src/js/jquery.min.js"></script>
<script src="src/js/jquery.validate.min.js"></script>

<script>

    const homepage = {
        init: function () {
            this.cacheDom();
            this.initPlugins();
            this.bind();
        },

        cacheDom: function () {
            this.$homepage = $('#homepage');
        },

        initPlugins: function () {
            $('#billForm').validate({
                rules: {
                    customer_id: {required: true,},
                    demand_type: {required: true},
                    bill_amount: {required: true},
                    date_of_meter_reading: {required: true},
                },
                messages: {
                    customer_id: "Customer ID Is required",
                    date_of_meter_reading: "Select Date for meter reading",
                    demand_type: "Enter Demand type",
                    bill_amount: "Enter Bill Amount in NRS"
                }
            })
        },

        bind:function () {
            this.$homepage.on('keyup', '.search', this.searchData);
        },

        searchData: function () {
            $.ajax({
                url: "search.php",
                type: "post",
                data: {
                    type: $('#type').val(),
                    search : this.value
                },
                success: function (response) {
                    $('.table-body').html("").append(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

    }
    homepage.init();

</script>
</html>