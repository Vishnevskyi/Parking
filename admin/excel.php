<?php
require_once "../db/db.php";
$output = '';
if (isset($_POST['export_excel_on_this_month']))
{
    $sql = "SELECT * FROM parking WHERE YEAR(data_in) = YEAR(CURRENT_DATE()) AND MONTH(data_in) = MONTH(CURRENT_DATE()) AND YEAR(data_out) = YEAR(CURRENT_DATE()) AND MONTH(data_out) = MONTH(CURRENT_DATE()) ORDER BY id ASC";
    $res = mysqli_query($app,$sql);
    if (mysqli_num_rows($res) > 0)
    {
        $output .= ' 
        <table><tr><th>id</th><th>car</th><th>place</th><th>data_in</th><th>data_out</th></tr>
        '; 
        while ($row = mysqli_fetch_assoc($res)) {
            $output .= '
            <tr><td>'.$row['id'] .'</td><td>'.$row['car'] .'</td><td>'.$row['place'] .'</td><td>'.$row['data_in'] .'</td><td>'.$row['data_out'] .'</td></tr>
            ';
        }
        $output .= '</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename:download.xls");
        echo $output;
    }
}
if (isset($_POST['export_excel_on_this_year']))
{
    $sql = "SELECT * FROM parking WHERE YEAR(data_in) = YEAR(CURRENT_DATE())  AND YEAR(data_out) = YEAR(CURRENT_DATE())  ORDER BY id ASC";
    $res = mysqli_query($app,$sql);
    if (mysqli_num_rows($res) > 0)
    {
        $output .= ' 
        <table><tr><th>id</th><th>car</th><th>place</th><th>data_in</th><th>data_out</th></tr>
        '; 
        while ($row = mysqli_fetch_assoc($res)) {
            $output .= '
            <tr><td>'.$row['id'] .'</td><td>'.$row['car'] .'</td><td>'.$row['place'] .'</td><td>'.$row['data_in'] .'</td><td>'.$row['data_out'] .'</td></tr>
            ';
        }
        $output .= '</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename:download.xls");
        echo $output;
    }
}
?>
