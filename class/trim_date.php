<?php 
function trim_tarikh($tarikh){
	$tarikh_temp = explode("/",$tarikh);
	
	//trim hari
	if(strlen($tarikh_temp[0])==1){
		$hari = "0".$tarikh_temp[0];
	}
	else{
		$hari = $tarikh_temp[0];
	}
	
	//trim bulan
	if(strlen($tarikh_temp[1])==1){
		$bulan = "0".$tarikh_temp[1];
	}
	else{
		$bulan = $tarikh_temp[1];
	}
	$tarikh_fix = $tarikh_temp[2]."-".$bulan."-".$hari;
	
	return $tarikh_fix;

}

function trim_tarikh2($tarikh){
	$tarikh_temp = explode("-",substr($tarikh,0,10));
	
	$tarikh_fix = $tarikh_temp[2]."/".$tarikh_temp[1]."/".$tarikh_temp[0];
	return $tarikh_fix;

}
function trim_tarikh3($tarikh){
	$tarikh_temp = explode("-",substr($tarikh,0,10));
		
	if($tarikh_temp[1] == '01') $tarikh_eja = "Januari";
	if($tarikh_temp[1] == '02') $tarikh_eja = "Febuari";
	if($tarikh_temp[1] == '03') $tarikh_eja = "Mac";
	if($tarikh_temp[1] == '04') $tarikh_eja = "April";
	if($tarikh_temp[1] == '05') $tarikh_eja = "Mei";
	if($tarikh_temp[1] == '06') $tarikh_eja = "Jun";
	if($tarikh_temp[1] == '07') $tarikh_eja = "Julai";
	if($tarikh_temp[1] == '08') $tarikh_eja = "Ogos";
	if($tarikh_temp[1] == '09') $tarikh_eja = "September";
	if($tarikh_temp[1] == '10') $tarikh_eja = "Oktober";
	if($tarikh_temp[1] == '11') $tarikh_eja = "November";
	if($tarikh_temp[1] == '12') $tarikh_eja = "Disember";
	

	
	$tarikh_fix = $tarikh_temp[2]." ".$tarikh_eja." ".$tarikh_temp[0];
	return $tarikh_fix;

}function trim_tarikh4($tarikh){
		$tarikh_temp = explode("-",substr($tarikh,0,10));
		
	if($tarikh_temp[1] == '01') $tarikh_eja = "January";
	if($tarikh_temp[1] == '02') $tarikh_eja = "February";
	if($tarikh_temp[1] == '03') $tarikh_eja = "March";
	if($tarikh_temp[1] == '04') $tarikh_eja = "April";
	if($tarikh_temp[1] == '05') $tarikh_eja = "May";
	if($tarikh_temp[1] == '06') $tarikh_eja = "June";
	if($tarikh_temp[1] == '07') $tarikh_eja = "July";
	if($tarikh_temp[1] == '08') $tarikh_eja = "August";
	if($tarikh_temp[1] == '09') $tarikh_eja = "September";
	if($tarikh_temp[1] == '10') $tarikh_eja = "October";
	if($tarikh_temp[1] == '11') $tarikh_eja = "November";
	if($tarikh_temp[1] == '12') $tarikh_eja = "December";
	
	
	$tarikh_fix = $tarikh_temp[2]." ".$tarikh_eja." ".$tarikh_temp[0];
	return $tarikh_fix;

}
function month($bulan)
{
	if($bulan == '01') $tarikh_eja = "JAN";
	if($bulan == '02') $tarikh_eja = "FEB";
	if($bulan == '03') $tarikh_eja = "MAR";
	if($bulan == '04') $tarikh_eja = "APR";
	if($bulan == '05') $tarikh_eja = "MAY";
	if($bulan == '06') $tarikh_eja = "JUN";
	if($bulan == '07') $tarikh_eja = "JUL";
	if($bulan == '08') $tarikh_eja = "AUG";
	if($bulan == '09') $tarikh_eja = "SEP";
	if($bulan == '10') $tarikh_eja = "OCT";
	if($bulan == '11') $tarikh_eja = "NOV";
	if($bulan == '12') $tarikh_eja = "DEC";
	return $tarikh_eja;
	}
function monthre($bulan)
{
	if($bulan == "JAN") return '01';
	if($bulan == "FEB") return '02';
	if($bulan == "MAC") return '03';
	if($bulan == "APR") return '04';
	if($bulan == "MEI") return '05';
	if($bulan == "JUN") return '06';
	if($bulan == "JLY") return '07';
	if($bulan == "OGS") return '08';
	if($bulan == "SEP") return '09';
	if($bulan == "OKT") return '10';
	if($bulan == "NOV") return '11';
	if($bulan == "DIS") return '12';
	return $tarikh_eja;
	}
	 
 
	function getWeeks($date) //format (yyyy-mm-dd);
    {
		$rollover = 'monday'; //Starting day of the week
        $cut = substr($date, 0, 8);
        $daylen = 86400;

        $timestamp = strtotime($date);
        $first = strtotime($cut . "00");
        $elapsed = ($timestamp - $first) / $daylen;

        $i = 1;
        $weeks = 1;

        for($i; $i<=$elapsed; $i++)
        {
            $dayfind = $cut . (strlen($i) < 2 ? '0' . $i : $i);
            $daytimestamp = strtotime($dayfind);

            $day = strtolower(date("l", $daytimestamp));

            if($day == strtolower($rollover))  $weeks ++;
        }

        return $weeks;
    }
	
	function labelbulan($kodbulan)
	{
		if($kodbulan == 1 || $kodbulan == 13){ return "JANUARI";}
		if($kodbulan == 2 || $kodbulan == 14){ return "FEBRUARI";}
		if($kodbulan == 3 || $kodbulan == 15){ return "MAC";}
		if($kodbulan == 4 || $kodbulan == 16){ return "APRIL";};
		if($kodbulan == 5 || $kodbulan == 17){ return "MEI";}
		if($kodbulan == 6 || $kodbulan == 18){ return "JUN";}
		if($kodbulan == 7 || $kodbulan == 19){ return "JULAI";}
		if($kodbulan == 8 || $kodbulan == 20){ return "OGOS";};
		if($kodbulan == 9){ return "SEPTEMBER";}
		if($kodbulan == 10){ return "OKTOBER";}
		if($kodbulan == 11){ return "NOVEMBER";}
		if($kodbulan == 12){ return "DISEMBER";};
		
	}
	
function getDay($date){
	$timestamp = strtotime($date);
	$day = date('D', $timestamp);
	return $day;	
}

function ordinalSuffix($num) {
    $suffixes = array("st", "nd", "rd");
    $lastDigit = $num % 10;

    if(($num < 20 && $num > 9) || $lastDigit == 0 || $lastDigit > 3) return "th";

    return $suffixes[$lastDigit - 1];
}	
	
?>
