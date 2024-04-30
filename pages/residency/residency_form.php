<?php
// Certificate template image path
$template_path = 'residency.jpg';

// Load the certificate template
$certificate = imagecreatefromjpeg($template_path);

// New date and name to be displayed on the certificate
$new_date = date('F j, Y');
$new_name = 'New Name';

// Text color (RGB)
$text_color = imagecolorallocate($certificate, 0, 0, 0); // Black

// Font size and file path for Times New Roman font
$font_size = 25;
$font_file = 'times.ttf';

// Text positions for date and name
$date_x = 1100;
$date_y = 570;
$name_x = 1270;
$name_y = 875;

// Fixed cover width to hide the old values
$date_cover_width = 297;
$name_cover_width = 300;

// Fill rectangles over existing date and name areas
imagefilledrectangle($certificate, $date_x, $date_y - $font_size, $date_x + $date_cover_width, $date_y, imagecolorallocate($certificate, 255, 255, 255));
imagefilledrectangle($certificate, $name_x, $name_y - $font_size, $name_x + $name_cover_width, $name_y, imagecolorallocate($certificate, 255, 255, 255));

// Write new date and name on certificate (replace existing values)
imagettftext($certificate, $font_size, 0, $date_x, $date_y, $text_color, $font_file, $new_date);
imagettftext($certificate, $font_size, 0, $name_x, $name_y, $text_color, $font_file, $new_name);

// Output the modified certificate
header('Content-Type: image/jpeg');
imagejpeg($certificate, null, 100);

// Clean up
imagedestroy($certificate);
?>
