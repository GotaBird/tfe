<?php
function date_translate($date)
{
	$date_explode = explode(" ",$newdate, 2);
	$day_name = $date_explode[0];
	$day = substr($date_explode[1], 0, 2);
	$month = substr($date_explode[1], 3, 2);
	$year = substr($date_explode[1], 6, 4);
	
	switch($day_name) {
	case "Monday":    $day_name = "Lundi";  break;
	case "Tuesday":   $day_name = "Mardi"; break;
	case "Wednesday": $day_name = "Mercredi";  break;
	case "Thursday":  $day_name = "Jeudi"; break;
	case "Friday":    $day_name = "Vendredi";  break;
	case "Saturday":  $day_name = "Samedi";  break;
	case "Sunday":    $day_name = "Dimanche";  break;
	}
	
	switch($month){
		case "01" :	$month = "Janvier"; break;
		case "02" :	$month = "Février"; break;
		case "03" :	$month = "Mars"; break;
		case "04" :	$month = "Avril"; break;
		case "05" :	$month = "Mai"; break;
		case "06" :	$month = "Juin"; break;
		case "07" :	$month = "Juillet"; break;
		case "08" :	$month = "Août"; break;
		case "09" :	$month = "Septembre"; break;
		case "10" :	$month = "Octobre"; break;
		case "11" :	$month = "Nowembre"; break;
		case "12" :	$month = "Décembre"; break;
	}

	$date = $day_name. " " .$day. " " .$month. " ".$year;
	return $date;
}
?>