<?php

require "connection.php";
$search = $_POST['search'];
$type = $_POST['type'];

if($type == 'citizen_number') {
    $row = 'citizen_no';
}
elseif ($type == 'mob_number') {
    $row = 'mobile_no';
}elseif ($type == 'dob') {
    $row = 'dob';
}else{
    $row = 'voter_id';
}

$sql = "select * from voter.citizen where $row like '%$search%'";

$result = mysqli_query($conn, $sql);

$citizen = array();

while ($row = mysqli_fetch_assoc($result)) {
    $citizen[] = $row;
}

if (isset($citizen)) {
    for ($i = 0; $i < count($citizen); $i++) {
        echo ""
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
}else{
    echo  "Dont get any data";
}

?>