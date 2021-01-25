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
										<h4 class="box-title">Available Rooms</h4>
									</div>
                                    
									<div class="box-body">
                                   
                    
                                 
											<?php
                   
                      $from=date("Y/m/d");
                   

                
                   $today = database_formatted_date($from);
                   $date=date_create();
                   date_add($date,date_interval_create_from_date_string("1 days"));
                   $date=date_format($date,"Y-m-d");?>
                    
                    
                    
                    <div class="topmargin">
                    <div class="row">
                    <div class="col-lg-12">
              
		
                    
                  <?php      $book_query = "SELECT booking_room.room_id FROM booking_room 
    LEFT JOIN booking ON booking_room.book_id=booking.book_id
   WHERE (booking.check_in_time <= '$today' AND  booking.check_out_time >= '$today')
   OR (booking.check_in_time <= '$date' AND  booking.check_out_time >= '$date') AND booking.status='1' GROUP BY booking_room.room_id";

   $run_book = $conn->query($book_query);
   $room_ids = [];
   if ($run_book->num_rows > 0) {?>
                        <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Room Id</th>
                                <th>Room Name</th>
                                <th>Price</th>
                                
                            </tr>
                        </thead>
                     
                      <?php    while($room = $run_book->fetch_assoc()) {
            $room_ids[] = $room['room_id'];
       }
   }
        $query = "SELECT tb_room.*,
        tb_categories.cat_name,
        tb_room_type.room_type_name 
        FROM tb_room 
        LEFT JOIN tb_categories ON tb_categories.cat_id=tb_room.cat_id 
        LEFT JOIN tb_room_type ON tb_room_type.room_type_id=tb_room.room_type_id
        WHERE tb_room.room_id NOT IN (".implode(', ', $room_ids).")";
    
                                 $run = $conn->query($query);
                                 if ($run->num_rows > 0) {
                                    
                                    while($room = $run->fetch_assoc()) {?>
                                          <tbody>
                        <tr>
                            <td><?php echo $room['room_id']?></td>
                            <td><?php echo $room['room_name']?></td>
                            <td><?php echo $room['price']?></td>
                            
                      
                        </tr>
                        </tbody>
                          <?php  }
                            }
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            ?>

  


                               
                                        </div>
									</div>
									<div class="box-footer">
                                   

                                    </div>
								</div>
                            </div>
                     <?php  
                
                    
                
                    
                    
                    
                    ?>
						
						</div>
					</div>
				</div>
			</div>
<?php include 'footer.php'?>