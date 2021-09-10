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
            <h3>Register Voter </h3>
            <a class="btn btn-sm btn-secondary" href="citizen_list.php">Citizen List</a>
        </div>
        <div class="card-body">
            <form action="citizen_list.php" id="billForm" method="post">

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Customer Full Name</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="fname" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Father Name</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="fathername" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="">Mother Name</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="mothername" required>
                    </div>
                </div>

                <div class="row mt-3">
                        <input class="form-control btn btn-sm btn-primary" type="submit" name="submie" value="Submit">
                </div>
            </form>
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

    }
    homepage.init();

</script>
</html>