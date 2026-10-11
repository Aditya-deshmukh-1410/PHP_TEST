<?php
include 'db.php';
require 'vendor/autoload.php';

$result = $conn->query('select * from books');
$pdf = new TCPDF();
$pdf->addPage();
$pdf->setFont('Times','I','12');

$html = '<table>
<tr>
<td>id</td>
<td>name</td>
<td>sal</td>
</tr>';

while($row = $result->fetch_assoc()){

$html.='<tr>
    <td>'.$row['id'].'</td>
    <td>'.$row['name'].'</td>
    <td>'.$row['sal'].'</td>
<tr>';

$html.='</table>';

$pdf->writeHTML($html,true,false,true,false,'');
$pdf->Output('books.pdf','D');
}

?>