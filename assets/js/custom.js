(function ($) {
    "use-strict"

    jQuery(document).ready(function () {

        if($('#checkInDate').length > 0) {
            $('#checkInDate').datepicker({
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                autoclose: true,
            });
        }
        if($('#checkOutDate').length > 0) {
            $('#checkOutDate').datepicker({
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        }
        
        $(document).on('click', '.nav-bar', function() {
            $('.page-content-area').toggleClass('no-sidebar');
            $('.header-logo').toggleClass('no-header-logo');
        });

        $(document).on('change', '#cat_id, #room_type_id, #checkInDate, #checkOutDate', function () {
            var cat_id = $('#cat_id').val();
            var type_id = $('#room_type_id').val(); 
            var check_in = $('#checkInDate').val();
            var check_out = $('#checkOutDate').val();

            if (check_in && check_out) {
                $.ajax({
                    url: 'get-room.php',
                    method: "POST",
                    data: {
                        category_id:cat_id,
                        type_id: type_id,
                        check_in: check_in,
                        check_out: check_out,
                        
                    },
                    beforeSend: function() {
                        $('#rooms').html('<tr><td colspan="4">Loading.......</td></tr>');
                        $('#sub_total').val(0);
                    },
                    success: function (res) {
                        setTimeout(function() {
                            $('#rooms').html(res);
                        }, 500)
                    }
                });
            }
            
        });


        $(document).on('change', '#checkInDate, #checkOutDate, input[name="rooms[]"]', function() {
            var check_in = $('#checkInDate').val();
            var check_out = $('#checkOutDate').val();

            var room_rent = 0;
            var total_rent = 0;
            var vat = 0;
            var grand_total = 0;
            $('#paid').val(0);
            $('#discount').val(0);
            $('#due').val(0);

          

            if (check_in && check_out) {
                 var check_in_date = new Date(check_in);
                 var check_out_date = new Date(check_out);
                 var diff = (check_out_date-check_in_date)/(1000*60*60*24);

                 $.each($('input[name="rooms[]"'), function(i, v) {
                    if($(this).is(':checked')) {
                        var room_id = $(this).val();
                        room_rent += parseInt($('.room_rent_'+room_id).text());
                    }
                });

                total_rent = diff*room_rent;
                                                                                                                                                                           
                vat  = (total_rent*5)/100;
                grand_total = total_rent+vat;
               
              

                 
            }
            
            $('#sub_total').val(total_rent);
            $('#vat').val(vat);
            $('#grand_total').val(grand_total);   
            $('#due').val(grand_total);


       

            
        });

        $(document).on('keyup', '#discount', function () {
            var discount = $('#discount').val();
            var grand_total = $('#grand_total').val();
            grand_total= grand_total-discount;
            $('#grand_total').val(grand_total);
            $('#due').val(grand_total);


    });
        $(document).on('keyup', '#paid', function () {
            var paid = $('#paid').val();
            var grand_total = $('#grand_total').val();
            grand_total= grand_total-paid;
            $('#due').val(grand_total);

    });
        $(document).on('keyup change', '#adult', function () {
            var adult = $('#adult').val();
            $("#adultguest").html('');
            for( i=1; i<=adult; i++){
                $("#adultguest").append('<div class="row"><div class="col-lg-6"><input type="text" name="adult_name[]" id="name" placeholder="Enter guest Name" class="form-control form-group"></div><div class="col-lg-6"><input type="text" name="adult_age[]" id="age" placeholder="Enter Age" class="form-control form-group"></div></div>'); 
            }
    });
        $(document).on('keyup change', '#child', function () {
            var child = $('#child').val();
            $("#childguest").html('');
            for( i=1; i<=child; i++){
                $("#childguest").append('<div class="row"><div class="col-lg-6"><input type="text" name="child_name[]" id="name" placeholder="Enter child Name" class="form-control form-group"></div><div class="col-lg-6"><input type="text" name="child_age[]" id="age" placeholder="Enter Age" class="form-control form-group"></div></div>'); 
            }
    });
    $(document).on('change', '#dpaid', function () {
        var grand_total = parseInt($('#grand_total').val());
        var paid = parseInt($('#paid').val());
        var dpaid = parseInt($('#dpaid').val());
        var due = parseInt($('#due').val());
        paid=paid + dpaid;
        due=due-dpaid ;
        $('#grand_total').val(grand_total);
        $('#paid').val(paid);
        $('#due').val(due);
        $('#dpaid').val(dpaid);
    });    
    
    });

}(jQuery));