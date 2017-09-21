<!-- NETXT GAME MECHANISM START-->
                                    <?php // Array with file names in file directory games

$photos_array                     = array();
$photos_array_with_older_datename = array();
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
            
            //Creates an array with name of photos which passes the if statment from above  
            
            array_push($photos_array_with_older_datename, $photos_array[$i]);
            
            
        }
    }
    
    
    
}

$number_of_photos_with_older_datename_in_array = count($photos_array_with_older_datename);
//Get the filename and print the photo
if ($number_of_photos_with_older_datename_in_array == 0) {
    echo "<img class='next-game-photo' src='/wp-content/uploads/2016/07/programma_banner.jpg' />";
} else {
    
    echo "<img class='next-game-photo' src='/games/" . $photos_array_with_older_datename[0] . ".jpg' />";
}
;

?>
