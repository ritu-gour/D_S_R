<?php

//$con = mysqli_connect('sql100.epizy.com','epiz_29674882','7470716187','epiz_29674882_daily_status_report') or die('cannot connect to database');
$con = mysqli_connect('localhost', 'root', '', 'daily_status_report') or die('cannot connect to database');
if ($con) {
?>
    <script>
        alert("success");
    </script>
<?php
} else {
    echo 'try again';
}
?>