<?php include 'header.php';
include 'sidebar.php' ;
include 'functions.php' ;

?>
			<!-- main-content -->
			<div class="main-content-area">
				<div class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="box text-center">
									<div class="box-header with-border">
										<h4 class="box-title">Booking Report</h4>
									</div>
                                    
									<div class="box-body">
                                    <form action="" method="post">
                                    <div class="form-group">
                                                <label for="room">From:</label>
                                                <input type="text" placeholder="YYYY-MM-DD" name="from"
                                                    id="checkInDate" class="form-control" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="room">To:</label>
                                                <input type="text" placeholder="YYYY-MM-DD" name="to"
                                                    id="checkOutDate" class="form-control" autocomplete="off">
                                            </div>
                                            <div>
                                            <input type="submit" value="Search Booking" name="search" class="btn btn-primary">
                                            </div>
                                    </form>
                                 
											<?php
                    if(isset($_POST['search'])){
                      

                
                   $check_in = database_formatted_date($_POST['from']);
                    $check_out = database_formatted_date($_POST['to']);?>
                    
                    
                    
                    <div class="topmargin">
                    <div class="row">
                    <div class="col-lg-9">
                    <div class="topmargin text-danger">
                    <span>Showing Result </span>
                    <br>
                    <br>
                    <span>From=<?php echo $_POST['from'];?> </span>
                    <span>To=<?php echo $_POST['to'];?></span>
                    </div>
                   
										<table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>Booking Id</th>
													<th>Guest Id</th>
													<th>Check In Time</th>
													<th>Check Out Time</th>
													<th>Grand Total</th>
													<th>Due</th>
													<th>Issued At</th>
													<th>Action</th>
												</tr>
											</thead>
                    
                    
                  <?php  $sql = "SELECT booking.*,
                    payment.due
                    FROM booking 
                    LEFT JOIN payment ON payment.book_id=booking.book_id
                    WHERE date(issue_date) BETWEEN '$check_in' AND '$check_out' AND booking.status='1'";
                    $run=$conn->query($sql);
                    if($run->num_rows > 0){
                        $num=0;
                        $sum = 0;
                        $sum1 = 0;
                        while ($result_1=$run->fetch_assoc()) {?>

                        <tbody>
                        <tr>
                            <td><?php echo $result_1['book_id']?></td>
                            <td><?php echo $result_1['guest_id']?></td>
                            <td><?php echo $result_1['check_in_time']?></td>
                            <td><?php echo $result_1['check_out_time']?></td>
                            <td><?php echo $result_1['grand_total']?></td>
                            <td><?php echo $result_1['due']?></td>                   
                            <td><?php echo $result_1['issue_date']?></td>
                            <td><a href="book_listdetails.php?guest_id=<?php echo $result_1['guest_id']?>" class="btn btn-primary">Details</a>
                            </td>
                        </tr>
                        </tbody>




                        <?php
                        $sum = $sum+$result_1['grand_total'];
                        $sum1 = $sum1+$result_1['due'];
                        $num++;
                        
                    }
                          ?> 
              
										</table>
                                        </div>
                                        <div class="col-lg-3" >
                                        
                                        <div class="tammount">
                                        <h5>Total Reservation Number= <?php echo $num;?></h5>
                                        <h5>Total Payment= <?php echo $sum;?>Tk</h5>
                                         <h5>Total Due Amount= <?php echo $sum1;?>Tk</h5>
                                    
                                        </div>
                                        </div>
                                        </div>
									</div>
									<div class="box-footer">
                                   

                                    </div>
								</div>
                            </div>
                     <?php  
                
                    }
                }
                    
                    
                    
                    ?>
						
						</div>
					</div>
				</div>
			</div>
<?php include 'footer.php'?>