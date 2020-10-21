<?php
// variables
$xfwd     = mm_strip($_SERVER["HTTP_X_FORWARDED_FOR"]);
$address  = mm_strip($_SERVER["REMOTE_ADDR"]);
$port     = mm_strip($_SERVER["REMOTE_PORT"]);
$method   = mm_strip($_SERVER["REQUEST_METHOD"]);
$protocol = mm_strip($_SERVER["SERVER_PROTOCOL"]);
$agent    = mm_strip($_SERVER["HTTP_USER_AGENT"]);
                                
if ($xfwd !== '') {             
        $IP = $xfwd;            
        $proxy = $address;      
        $host = @gethostbyaddr($xfwd);
} else {
        $IP = $address;
        $host = @gethostbyaddr($address);
}
// sanitizes
function mm_strip($string) {
        $string = trim($string);
        $string = strip_tags($string);
        $string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
        $string = str_replace("\n", "", $string);
        $string = trim($string);
        return $string;
}
?>

<!DOCTYPE html>
<html><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>ronalt.nl</title>


<strong>Hallo Openshift</strong><br>
<p>&nbsp;</p>
<br>

IP adres remote (proxy):
<?php echo $_SERVER['REMOTE_ADDR']; ?>
<br>
<br>
IP adres on running host (pod):
<?php echo $_SERVER['SERVER_ADDR']; ?>
<br>
<br>
Your IP: <?php echo $IP; ?>
<br>
<br>
<?php echo 'Request Method:<span>'.$method.'</span>'; ?>
<br>
<br>
<?php echo 'Server Protocol: <span>'.$protocol.'</span>'; ?>
<br>
<br>
<?php echo 'Server Host: <span>'.$host.'</span>'; ?>
<br>
<br>
<?php echo 'User Agent: <span>'.$agent.'</span>'; ?>
<br>
<p>&nbsp;</p>
r.schouw@fullstaq.com

</html>
