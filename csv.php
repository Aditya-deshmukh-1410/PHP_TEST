<?php
include 'db.php';

header("Content-Type: text/csv");
header("Content-Disposition : attachment; filename:book.csv");

$output = fopen('php://output','w');
fputcsv($output,array('id','book title','author','price'));

$result = $conn->query('select * from books');

while($row = $result->fetch_assoc()){
    fputcsv($output,$row);
}

?>