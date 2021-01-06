<?php include "header.php";
  include "sidebar.php";
  ?>


        <!-- main-content -->
        <div class="main-content-area">

<!-- page title -->
<div class="container-fluid">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border text-center">
                        <h3>Room Booking</h3>
                    </div>




                    <form action="add_booking.php" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-6 room">


                                    <div>
                                        <label for="">Check In Time :</label>
                                        <input type="text" placeholder="DD-MM-YYYY" name="check_in" id="checkInDate"
                                            class="form-control">
                                    </div>



                                    <div>
                                        <label for="">Check Out Time : </label>
                                        <input type="text" placeholder="DD-MM-YYYY" name="check_out" id="checkOutDate"
                                            class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <label for="cat_id">Choose a Category</label>
                                        <select name="cat_id" id="cat_id" class="form-control">

                                            <option value="">
                                                <?php echo "Select a Category"?>
                                            </option>
                                            <?php
                               $sql="SELECT *FROM tb_categories";
                                $run=$conn->query($sql);
                                if($run->num_rows>0){
                                    while($show=$run->fetch_assoc()){?>

                                            <option value="<?php echo $show["cat_id"]?>">
                                                <?php echo $show["cat_name"]?>
                                            </option>
                                            <?php
                                    }
                                }
                           
                            ?>
                                        </select>



                                    </div>



                                    <div class="form-group">
                                        <label for="room_type_id">Choose Room Type</label>
                                        <select name="room_type_id" id="room_type_id" class="form-control">
                                            <option value="">
                                                <?php echo "Select Room Type"?>
                                            </option>
                                            <?php
                               $sql="SELECT *FROM tb_room_type";
                                $run=$conn->query($sql);
                                if($run->num_rows>0){
                                    while($show=$run->fetch_assoc()){?>
                                            <option value="<?php echo $show["room_type_id"]?>">
                                                <?php echo $show["room_type_name"]?>
                                            </option>



                                            <?php
                                    }
                                }
                           
                            ?>
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="facility_name">Choose facilities</label>
                                        <br>
                                        <?php
                               $sql="SELECT *FROM facilities";
                                $run=$conn->query($sql);
                                if($run->num_rows>0){
                                    while($show=$run->fetch_assoc()){?>

                                        <input type="checkbox" id="facility_name" name="facilities[]"
                                            value="<?php echo $show[" facility_name"]?>">
                                        <label for="facility_name">
                                            <?php echo $show["facility_name"]?>
                                        </label>

                                        <?php
                                    }
                                }
                                ?>






                                    </div>





                                </div>




                                <div class="col-lg-6">


                                    <div class="box-header with-border">
                                        <h3>Room</h3>
                                    </div>


                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Room Name</th>
                                                <th>Room details</th>
                                                <th>Price</th>

                                            </tr>
                                        </thead>
                                        <tbody id="rooms">
                                            <tr>
                                                <td colspan='4'>No Room Found</td>


                                            </tr>
                                        </tbody>
                                    </table>




                                </div>



                                <div class="col-lg-12 broom">
                                    <div class="box-body">

                                        <div class="row">
                                            <div class="col-lg-6 room">
                                                <div class="box-header with-border text-center">
                                                    <h3>Guest Information</h3>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" name="guest_name" placeholder="Enter name" id=""
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Phone</label>
                                                    <input type="tel" name="guest_phone" placeholder="Enter email" id=""
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <input type="text" name="guest_address" placeholder="Enter name"
                                                        id="" class="form-control">
                                                </div>
                                                <div class="box-header ">
                                                    <h3>Members</h3>
                                                </div>
                                                <div class="form-group ">
                                                    <div>
                                                        <label for="">Adult :</label>
                                                        <input type="number" name="adult" id="adult">
                                                    </div>

                                                    <br>
                                                    <div>
                                                        <label for="">Child :</label>
                                                        <input type="number" name="child" id="child">
                                                    </div>

                                                    <div class="box-header ">
                                                        <h3>Members Information :</h3>

                                                    </div>
                                                </div>

                                                <div id="adultguest"></div>
                                                <div id="childguest"></div>





                                            </div>

                                            <div class="col-lg-6 room">
                                                <div class="box-header with-border text-center">
                                                    <h3>Payment</h3>
                                                </div>
                                                <div class="box-body">


                                                    <div class="form-group row">
                                                        <label for="" class="col-lg-4 col-form-label">Sub Total</label>
                                                        <div class="col-lg-8">
                                                            <input type="text" name="sub_total" id="sub_total"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="" class="col-lg-4 col-form-label">Vat</label>
                                                        <div class="col-lg-8">


                                                            <input type="text" name="vat" id="vat" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-lg-4 col-form-label">Discount</label>
                                                        <div class="col-lg-8">

                                                            <input type="text" name="discount" id="discount"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-lg-4 col-form-label">Grand
                                                            Total</label>
                                                        <div class="col-lg-8">

                                                            <input type="text" name="grand_total" id="grand_total"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-lg-4 col-form-label">Paid</label>
                                                        <div class="col-lg-8">

                                                            <input type="text" name="paid" id="paid"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-lg-4 col-f+orm-label">Due</label>
                                                        <div class="col-lg-8">

                                                            <input type="text" name="due" id="due" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-lg-4 col-form-label">Payment
                                                            Method</label>
                                                        <div class="col-lg-8">

                                                            <select name="payment_method" id="" class="form-control">
                                                        </div>

                                                        <option value="">
                                                            Payment With
                                                        </option>

                                                        <option value="Cash">Cash</option>
                                                        <option value="Bkash">Bkash</option>
                                                        <option value="Paypall">Paypall</option>
                                                    </div>
                                                    <div class="form-group row">
                                                        
                                                        <div class="col-lg-8">

                                                        <input type="submit" value="Add Booking" name="booking" class="btn btn-primary fot">
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                           
                            </div>
                        </div>



                    </form>


                </div>
            </div>
        </div>

    </div>
</div>
<?php include "footer.php"?>