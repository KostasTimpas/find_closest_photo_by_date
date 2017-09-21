<?php 
// Array with file names in file directory games
$photos_array                     = array();

 //Creates an array with name of photos which we need  
$photos_array_with_same_or_next_datename = array();
foreach (glob('./games/*.*') as $filename) {
    $filename = str_replace("./games/", "", $filename);
    $filename = str_replace(".jpg", "", $filename);
    array_push($photos_array, $filename);
}
for ($i = 0; $i < count($photos_array); $i++) {
    //echo $photos_array[$i] . "<br />";
    $date_of_photo                 = $photos_array[$i];
    $date_of_photo_whithout_dashes = str_replace("-", "", $date_of_photo);
    //Finds the day of photos as string
    $day_of_photo                  = substr($date_of_photo_whithout_dashes, 0, 2);
    //Converts day from string to integer 
    $day_of_photo_int              = intval($day_of_photo);
    
    //Finds the month of photos as string
    $month_of_photo                       = substr($date_of_photo_whithout_dashes, 2, 2);
    //Converts day from string to integer 
    $month_of_photo_int                   = intval($month_of_photo);
    //Current Date
    $current_date                         = date("d/m/Y");
    $formated_current_date_without_dashes = str_replace("/", "", $current_date);
    
    //Finds the day as string from Current day
    $current_day      = substr($formated_current_date_without_dashes, 0, 2);
    //Converts current day from string to integer 
    $current_date_int = intval($current_day);
    
    //Finds the month as string from Current day
    $current_mothn     = substr($formated_current_date_without_dashes, 2, 2);
    //Converts current month from string to integer 
    $current_mothn_int = intval($current_mothn);
    
    
    
    //Checks if currnet month is greater than each photos month
    if ($current_mothn_int <= $month_of_photo_int) {
        if ($current_date_int <= $day_of_photo_int) {
            

            array_push($photos_array_with_same_or_next_datename, $photos_array[$i]);
            
            
        }
    }
    
    
    
}

// Number of photos in $photos_array_with_same_or_next_datename array
$number_of_photos_with_older_datename_in_array = count($photos_array_with_same_or_next_datename);

//Check if the array contains at least one photo
if ($number_of_photos_with_older_datename_in_array == 0) {
    
    // if there isn't any photo in array echo the default photo 
    echo "<img class='***your class***' src='***Your Default Photo ***' />";
} else {
     
     // echo the photo we want
    echo "<img class='***your class***' src='/games/" . $photos_array_with_same_or_next_datename[0] . ".jpg' />";
}
;

?>
