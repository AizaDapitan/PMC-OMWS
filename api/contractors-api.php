<?php
header('Content-Type: text/html; charset=utf-8');
//mysql_set_charset("UTF8");
//sqlsrv_set_charset("UTF8");
//include("config.php");
// $s_host="localhost";
// $s_user="root";
// $s_pword="root";
// $s_db="contractors_monitoring_db";

$serverName = "172.16.20.43";
$connectionInfo = array( "Database"=>"omws_db", "UID"=>"apps_omws", "PWD"=>"ta6AiDa3" );
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$s_host2="172.16.40.48";
$s_user2="root";
$s_pword2="root";

// $conn=mysqli_connect($s_host,$s_user,$s_pword);
// mysqli_select_db($s_db,$conn);
$conn2=mysqli_connect($s_host2,$s_user2,$s_pword2,'cis_db');

function utf8ize( $mixed ) {
if (is_array($mixed)) {
foreach ($mixed as $key => $value) {
$mixed[$key] = utf8ize($value);
}
} elseif (is_string($mixed)) {
return mb_convert_encoding($mixed, "UTF-8", "UTF-8");
}
return $mixed;
}


if(!isset($_GET['contractor']) && !isset($_GET['contractoronly']) && !isset($_GET['locationonly'])){
$data=array();
$jo = '';
//sqlsrv_set_charset("UTF8");
$qry=sqlsrv_query($conn,"select lo.name as location,co.code as contractorCode,CONCAT(co.lname, ',',co.fname) as contractor from contractor_location c
left join locations lo on lo.id=c.location_id
left join contractors co on co.id=c.contractor_id
where c.isActive=1
ORDER BY CONCAT(co.lname, ',', co.fname),lo.name ");
while($r=sqlsrv_fetch_array($qry,SQLSRV_FETCH_ASSOC)){
// var_dump($r['contractor']);
$data[]=$r;
$rrr = $r['contractor'];
if($r['contractor']=='EÑEREZ,RICARDO'){
$rrr = 'ENEREZ,RICARDO';
}
if($jo<>$rrr){
mysqli_select_db($conn2,"cis_db");
// mysqli_set_charset($conn2,"UTF8");
$cis_q = mysqli_query($conn2,"select joborder as location,'' as contractorCode, teamleader as contractor from joborders where teamleader='".$rrr."'");
// echo "select joborder as location,'' as contractorCode, teamleader as contractor from joborders where teamleader='".$rrr."'";
while($cis = mysqli_fetch_array($cis_q,MYSQLI_ASSOC)){
// var_dump($cis);
if($cis['location']){
$data[]=$cis;
}
}
}
$jo = $r['contractor'];
}

// echo json_encode($data);
echo json_encode(utf8ize($data));

}

if(isset($_GET['contractor'])){
$data=array();
$jo = '';
//sqlsrv_set_charset("UTF8");
$qry=sqlsrv_query($conn,"select lo.name as location,co.code as contractorCode,CONCAT(co.lname, ',',co.fname) as contractor from contractor_location c
left join locations lo on lo.id=c.location_id
left join contractors co on co.id=c.contractor_id
where c.isActive=1 and co.code='".$_GET['contractor']."'
ORDER BY CONCAT(co.lname, ',', co.fname),lo.name");
while($r=sqlsrv_fetch_array($qry)){
$data[]=$r;
if($jo<>$r['contractor']){
mysqli_set_charset($conn2,"UTF8");
mysqli_select_db($conn2,"cis_db");
$cis_q = mysqli_query($conn2,"select joborder as location,'' as contractorCode, teamleader as contractor from joborders where teamleader='".$r['contractor']."'");
while($cis = mysqli_fetch_array($cis_q)){
if($cis['location']){
$data[]=$cis;
}
}
}
$jo = $r['contractor'];
}
// echo json_encode($data);
echo json_encode(utf8ize($data));
}

if(isset($_GET['contractoronly'])){
$data=array();
$jo = '';
//sqlsrv_set_charset("UTF8");
$qry=sqlsrv_query($conn,"select distinct co.code as contractorCode,CONCAT(co.lname, ',', co.fname) as contractor from contractor_location c
left join locations lo on lo.id=c.location_id
left join contractors co on co.id=c.contractor_id
where c.isActive=1 ORDER BY CONCAT(co.lname, ',', co.fname)");
while($r=sqlsrv_fetch_array($qry)){
$data[]=$r;
if($jo<>$r['contractor']){
// mysqli_set_charset($conn2,"UTF8");
mysqli_select_db($conn2,"cis_db");
$cis_q = mysqli_query($conn2,"select '' as contractorCode, teamleader as contractor from joborders where teamleader='".$r['contractor']."'");
while($cis = mysqli_fetch_array($cis_q)){
if($cis['contractor']){
$data[]=$cis;
}
}
}
$jo = $r['contractor'];
}
// echo json_encode($data);
echo json_encode(utf8ize($data));
}

if(isset($_GET['locationonly'])){
$data=array();
//sqlsrv_set_charset("UTF8");
$qry=sqlsrv_query($conn,"select distinct lo.name as location from contractor_location c left join locations lo on lo.id=c.location_id left join contractors co on co.id=c.contractor_id where c.isActive=1 ORDER BY lo.name");
while($r=sqlsrv_fetch_array($qry)){
$data[]=$r;
}
mysqli_set_charset($conn2,"UTF8");
mysqli_select_db($conn2,"cis_db");
$cis_query = mysqli_query($conn2,"select '' as contractorCode, teamleader as contractor from joborders where teamleader='".$r['contractor']."'");
while($cis = mysqli_fetch_array($cis_query)){
$data[]=$cis;
}
// echo json_encode($data);
echo json_encode(utf8ize($data));
}