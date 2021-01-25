<?php include 'header.php';
include 'sidebar.php' ?>
			<!-- main-content -->
			<div class="main-content-area">
				<div class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="box text-center">
									<div class="box-header with-border">
										<h4 class="box-title">Booking Details</h4>
									</div>
									<div class="box-body">
									
											<?php
                    $sql="SELECT * FROM guest  ORDER BY `guest_id` DESC LIMIT 1";
                    $run=$conn->query($sql);
                    if($run->num_rows > 0){
                        while ($result=$run->fetch_assoc()) {?>
                        <div><p>Guest Id =<?php echo $result['guest_id']?></p></div>
                        <div><p>Guest Name =<?php echo $result['guest_name']?></p></div>
                        <div><p>Guest Contact =<?php echo $result['guest_phone']?></p></div>
                        <div><p>Guest Address =<?php echo $result['guest_address']?></p></div>
                        <div class="col-lg-6 offset-3">
                        <h4>Member Information</h4>
                        <table class="table table-hover">
											<thead>
												<tr>
													<th>Member Name</th>
													<th>Member Age</th>
													<th>Type</th>
												</tr>
											</thead>

                
											<?php
                        $guest_id= $result['guest_id'];                    
                    $sql="SELECT * FROM members WHERE $guest_id=`guest_id`";
                    $run=$conn->query($sql);
                    if($run->num_rows > 0){
                        while ($result=$run->fetch_assoc()) {?>
                    
                      
                        <tbody>
                        <tr>
                            <td><?php echo $result['member_name']?></td>
                            <td><?php echo $result['member_age']?></td>
                            <td><?php echo $result['type']?></td>
                        </tr>
                        </tbody>


                        <?php
                           
                        }
                    }
                    
                    
                    
                    ?>
                    </table>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                        <h4>Reservation Information</h4>
                        
                
											<?php
                                            
                    $sql="SELECT * FROM booking  WHERE $guest_id=`guest_id`";
                    $run=$conn->query($sql);
                    if($run->num_rows > 0){
                        while ($result=$run->fetch_assoc()) {?>
                    
                      
                       
                            <p>Booking ID:<?php echo $result['book_id']?></p>
                            <p>Check In Time:<?php echo $result['check_in_time']?></p>
                            <p>Check Out Time:<?php echo $result['check_out_time']?></p>
                            <p>Issue Date<?php echo $result['issue_date']?></p>
                            <p>Room Id:
                            <?php
                                            $book_id= $result['book_id'];         
                                            $sql="SELECT * FROM booking_room  WHERE $book_id=book_id ";
                                            $run=$conn->query($sql);
                                            if($run->num_rows > 0){
                                                while ($result=$run->fetch_assoc()) {
                                                    $roomid[]=  json_decode($result['room_id']);
                                                    echo implode(', ', $roomid);
                                                                 
                        }
                    }?></p>
                            
                        

                    


                        <?php
                           
                        }
                    }
                    
                    
                    
                    ?>
                    </div>
                    <div class="col-lg-6">
                        <h4>Payment Information</h4>
                       
											<?php
                                            
                    $sql="SELECT * FROM booking  WHERE $guest_id=`guest_id`";
                    $run=$conn->query($sql);
                    if($run->num_rows > 0){
                        while ($result=$run->fetch_assoc()) {?>
                    
                      
                        <tbody>
                        <tr>
                            <p>Booking ID:<?php echo $result['book_id']?></p>
                            <p>Sub Total:<?php echo $result['sub_total']?></p>
                            <p>Vat:<?php echo $result['vat']?></p>
                            <p>Discount:<?php echo $result['discount']?></p>
                            <p>Grand Total:<?php echo $result['grand_total']?></p>
                            <?php
                                  $book_id= $result['book_id'];         
                                            $sql="SELECT * FROM payment  WHERE $book_id=`book_id`";
                                            $run=$conn->query($sql);
                                            if($run->num_rows > 0){
                                                while ($result=$run->fetch_assoc()) {?>

                            <p>Paid:<?php echo $result['paid']?></p>
                            <p>Due:<?php echo $result['due']?></p>
                            <p>Method:<?php echo $result['method']?></p>
                            
                            <?php
                           
                        }
                    }?>
                            
                        

                       


                        <?php
                           
                        }
                    }
                    
            
                    
                    ?>
                    </div>
                    </div>
                  

<?php
                           
                        }
                    }
                    ?>
										
									</div>
									<div class="box-footer"></div>
								</div>
							</div>
						
						</div>
					</div>
				</div>
			</div>
<?php include 'footer.php'?>