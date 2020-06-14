<?php
include_once 'dbh.inc.php';

$sql = "SELECT * FROM dht11 ORDER BY ID DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        echo $row['humidity'];
    }
} else {
    echo "there are no data";
}
