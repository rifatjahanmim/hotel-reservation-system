<?php 
    include 'database.php';
    include 'functions.php';
    $category_id = $_POST['category_id'];
    $type_id = $_POST['type_id'];
    $check_in = database_formatted_date($_POST['check_in']);
    $check_out = database_formatted_date($_POST['check_out']);

    //get booked room id
    $book_query = "SELECT booking_room.room_id FROM booking_room 
    LEFT JOIN booking ON booking_room.book_id=booking.book_id
   WHERE (booking.check_in_time <= '$check_in' AND  booking.check_out_time >= '$check_in')
   OR (booking.check_in_time <= '$check_out' AND  booking.check_out_time >= '$check_out') GROUP BY booking_room.room_id";

   $run_book = $conn->query($book_query);
   $room_ids = [];
   if ($run_book->num_rows > 0) {

       while($room = $run_book->fetch_assoc()) {
            $room_ids[] = $room['room_id'];
       }
   }

   if (count($room_ids) > 0) {
       $room_ids = "AND tb_room.room_id NOT IN (".implode(', ', $room_ids).")";
   } else {
       $room_ids = '';
   } 

    if ($category_id && $type_id) {
        $query = "SELECT tb_room.*,
        tb_categories.cat_name,
        tb_room_type.room_type_name 
        FROM tb_room 
        LEFT JOIN tb_categories ON tb_categories.cat_id=tb_room.cat_id 
        LEFT JOIN tb_room_type ON tb_room_type.room_type_id=tb_room.room_type_id
        WHERE tb_room.cat_id='$category_id'  AND tb_room.room_type_id='$type_id' $room_ids";
    } else if ($category_id) {
        $query = "SELECT tb_room.*,
        tb_categories.cat_name,
        tb_room_type.room_type_name 
        FROM tb_room 
        LEFT JOIN tb_categories ON tb_categories.cat_id=tb_room.cat_id 
        LEFT JOIN tb_room_type ON tb_room_type.room_type_id=tb_room.room_type_id
        WHERE tb_room.cat_id='$category_id' $room_ids";
    }else if ($type_id) {
        $query = "SELECT tb_room.*,
        tb_categories.cat_name,
        tb_room_type.room_type_name 
        FROM tb_room 
        LEFT JOIN tb_categories ON tb_categories.cat_id=tb_room.cat_id 
        LEFT JOIN tb_room_type ON tb_room_type.room_type_id=tb_room.room_type_id
        WHERE tb_room.room_type_id='$type_id' $room_ids";
    } else {
            //get booked room id
    $book_query = "SELECT booking_room.room_id FROM booking_room 
    LEFT JOIN booking ON booking_room.book_id=booking.book_id
   WHERE (booking.check_in_time <= '$check_in' AND  booking.check_out_time >= '$check_in')
   OR (booking.check_in_time <= '$check_out' AND  booking.check_out_time >= '$check_out') GROUP BY booking_room.room_id";

   $run_book = $conn->query($book_query);
   $room_ids = [];
   if ($run_book->num_rows > 0) {

       while($room = $run_book->fetch_assoc()) {
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
    }

    echo $query;
    $run = $conn->query($query);
    

    
    $output = '';
    
    if ($run->num_rows > 0) {
        $i = 1;
        while($room = $run->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td><input type='checkbox' name='rooms[]' value='".$room['room_id']."' id='room_".$room['room_id']."'></td>"; 
            $output .= "<td><label for='room_".$room['room_id']."'>".$room['room_id']."</label></td>";
            $output .= "<td><label for='room_".$room['room_id']."'>".$room['room_name']."</label></td>";
            $output .= "<td>".$room['cat_name'].", ".$room['room_type_name']."</td>";
            $output .= "<td class='room_rent_".$room['room_id']."'>".$room['price']."</td>";
            $output .= "</tr>";

            $i++;
        }
        echo $output;
    } else {
        echo '<tr><td colspan="4">No room found
        </td></tr>';
    }