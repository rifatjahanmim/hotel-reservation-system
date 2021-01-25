<?php include 'database.php';

require ('vendor\autoload.php');
  
$html='<h3 style="text-align:center;">Customer receipt</h3>


<p style="text-align:center;">Online Reservation</p>';

if(isset($_GET['guest_id'])){
    $id=$_GET['guest_id'];
  
  
  
  $sql="SELECT * FROM guest WHERE $id=`guest_id`";
  
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  }

$html.='<b>Guest Id: <span style="font-weight:normal;">'.$row['guest_id'].'</span></b><br>
<b>Guest Name: <span style="font-weight:normal;">'.$row['guest_name'].'</span></b><br>
<b>Address: <span style="font-weight:normal;">'.$row['guest_address'].'</span></b><br>
<b>Phone: <span style="font-weight:normal;">'.$row['guest_phone'].'</span></b><br><br>
<table class="table table-bordered"  style=" border: 1px solid black; width:100%; text-align:center;">
<br><br>
  <thead>
  <tr>
      <th scope="col">Book Id</th>
      <th scope="col">Check In Date</th>
      <th scope="col">Check Out Date</th>
      <th scope="col">No of Room</th>
      <th scope="col">Sub Total</th>
      <th scope="col">Vat</th>
      <th scope="col">Discount</th>
      <th scope="col">Issued At</th>

    
      

    </tr>
  </thead>
  <tbody>';
  $total=0;

  if(isset($_GET['guest_id'])){
    $id=$_GET['guest_id'];
  
  
  
  $sql="SELECT * FROM booking WHERE guest_id=$id";
  
  $result=mysqli_query($conn,$sql);
  }
  $row = mysqli_fetch_assoc($result); 

  $html.='<tr>'; 
      
  $html.='<td scope="col">'.$row['book_id'].'</td>';
  $html.='<td scope="col">'.$row['check_in_time'].'</td>';
  $html.='<td scope="col">'.$row['check_out_time'].'</td>';
  $book_id= $row['book_id'];         
  $sql="SELECT * FROM booking_room  WHERE $book_id=`book_id`";
  $run=$conn->query($sql);
  if($run->num_rows > 0){
    $num=0;
      while ($result=$run->fetch_assoc()) {
      $num++;}
  $html.='<td scope="col">'.$num.'</td>';
}

  $html.='<td scope="col">'.$row['sub_total'].'</td>';
  $html.='<td scope="col">'.$row['vat'].'</td>';
  $html.='<td scope="col">'.$row['discount'].'</td>';
        
      $html.='<td scope="col">'.$row['issue_date'].'</td></tr>';

 

   

 $html.=' </tbody>
</table>';


$sql="SELECT * FROM payment  WHERE $book_id=`book_id`";
$run=$conn->query($sql);
if($run->num_rows > 0){
$pay=$run->fetch_assoc();
}
      $html.='<br><br><br>
<h5>Grand Total: '.$row['grand_total'].' Tk</h5>
<h5>Paid: '.$pay['paid'].' Tk</h5>
<h5>Due: '.$pay['due'].' Tk</h5>
<h5>Method: '.$pay['method'].' Payment</h5>
 

<br><br><br>

<br><br>

<br><br>
<div style="text-align:center;">
<b>Date: '.date("Y-m-d").'</b> 
</div>'

;

$mpdf= new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file=time().'.pdf';
$mpdf->output($file,"I");

?>