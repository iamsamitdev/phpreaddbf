<?php

// dbase_open(string $path, int $mode): resource|false
// 0 means read-only
// 1 means write-only
// 2 means read and write

// Path to dbase file (dbf)
$db_path = "tmp/sample.dbf";
$mode = 0;

$dbh = dbase_open($db_path, $mode) or die("Error! Could not open dbase database file '$db_path'.");

// Get Column infomation
$column_info = dbase_get_header_info($dbh);

// Display infomation
echo "<pre>";
print_r($column_info);
echo "</pre>";

// if ($dbh)
// {
//     // read some data ..
//     $record_numbers = dbase_numrecords($dbh);
//     for ($i = 1; $i <= $record_numbers; $i++)
//     {
//         // echo dbase_get_record($dbh, $i)[0] ." ".dbase_get_record($dbh, $i)[1].'<br>';
//         echo dbase_get_record_with_names($dbh, $i)['CUST_NO'] ." ".dbase_get_record_with_names($dbh, $i)['NAME'].'<br>';
//     }

//     dbase_close($dbh);
// }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Data</title>
</head>
<body>
    <div class="container">
        <h1>Customer tables</h1>
        <table>
            <thead>
                <tr>
                    <th>CUST_NO</th>
                    <th>NAME</th>
                    <th>STREET</th>
                    <th>CITY</th>
                    <th>STATE_PROV</th>
                    <th>ZIP_PST_CD</th>
                    <th>COUNTRY</th>
                    <th>PHONE</th>
                    <th>FRST_CNTCT</th>
                    <th>ASD</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($dbh)
                    {
                        // read some data ..
                        $record_numbers = dbase_numrecords($dbh);
                        if($record_numbers){
                            for ($i = 1; $i <= $record_numbers; $i++)
                            {
                                echo "<tr>";
                                echo "<td>".dbase_get_record_with_names($dbh, $i)['CUST_NO']."</td>";
                                echo "<td>".dbase_get_record_with_names($dbh, $i)['NAME']."</td>";
                                echo "<td>".dbase_get_record_with_names($dbh, $i)['STREET']."</td>";
                                echo "<td>".dbase_get_record_with_names($dbh, $i)['CITY']."</td>";
                                echo "<td>".dbase_get_record_with_names($dbh, $i)['STATE_PROV']."</td>";
                                echo "<td>".dbase_get_record_with_names($dbh, $i)['ZIP_PST_CD']."</td>";
                                echo "<td>".dbase_get_record_with_names($dbh, $i)['COUNTRY']."</td>";
                                echo "<td>".dbase_get_record_with_names($dbh, $i)['PHONE']."</td>";
                                echo "<td>".dbase_get_record_with_names($dbh, $i)['FRST_CNTCT']."</td>";
                                echo "<td>".@dbase_get_record_with_names($dbh, $i)['ASD']."</td>";
                                echo "</tr>";
                            }
                        }else{
                            echo "ไม่พบข้อมูล";
                        }
                    
                        dbase_close($dbh);
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>