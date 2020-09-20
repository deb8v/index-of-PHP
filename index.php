<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>1111</title>
    </head> 
<?php 
header('Content-Type: text/html; charset=utf-8');

$dir="dir/";

$path = scandir($dir);
 
explore($dir);

function explore($fld){

$path = scandir($fld);
echo("<table>");
echo('<tr><th></th><th></th><th></th></tr>');
foreach($path as $k){
    if($k!='.' && $k!='..'){
        $ft=end(explode(".", $k));
        $cdir=$fld.'/'.$k;
        $pdir=fileperms($cdir);
        
        echo '<tr>';
        if(!is_dir($cdir)){
        echo "<td>".'<a download href="/'.$cdir.'">💾</a>&nbsp;<a href="/'.$cdir.'">👁</a></td> '; 
        echo '<td class="filesize">'.human_filesize(filsize_32b($cdir)).'</td>';
        echo '<td>';
        
        echo '</td>';}else{echo '<td colspan="3"><center><b>'.$k.'\\<br>'.permis($pdir).'<b></center>';}
        echo '<td class="w100">';
        if(!is_dir($cdir)){
            if($ft=='mp4' ||$ft=='m4a' ||$ft=='m4p' ||$ft=='m4b' ||$ft=='m4r' ||$ft=='MOV'){returnvid($cdir,$k);}else
            if($ft=='mp3' ||$ft=='ogg'||$ft=='wav'){returnmusik($cdir,$k);}else
            if($ft=='pdf' ||$ft=='html'){returnframe($cdir,$k);}else{
                echo $k;}
            }
        if(is_dir($cdir)){explore($cdir);}
        echo '</td>';
        echo "</tr>";
    }
}
echo("</table>");

}
function returnvid($k,$n){

   echo '<details closed>';
   echo '<summary>📹'.$n.'</summary><br>';
    echo '<video class="vid" controls="controls">';
     echo '<source src="/'.$k.'">';
     
     
    echo '</video>';
  echo '</details>';

}

function returnmusik($k,$n){
    echo '<details closed>';
        echo '<summary>💿'.$n.'</summary><br>';
    echo '<audio controls>';
        echo '<source src="/'.$k.'">';
    echo '</audio>';
  echo '</details>';
}

function returnframe($k,$n){
    $uc=uniqid();
    //$void='document.getElementById(\''.$uc.'\').style.visibility=1';
    //$void="console.log(999)";
    $void="document.getElementById('$uc').style.display=''";
    echo '<details closed>';
    echo '<summary onclick="'.$void.'">✅'.$n.'</summary><br>';
            echo '<iframe style="display: none;" id='.$uc.' class="w100 h100" src="'.'/'.$k.'">';
        echo '</iframe>';
  echo '</details>';
}

function human_filesize($bytes, $decimals = 2) {
    $size = array('Б','кБ','МБ','ГБ');
    $factor = (int) floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

function filsize_32b($file) {
    $filez = filesize($file);
    if($filez < 0) {  return (($filez + PHP_INT_MAX) + PHP_INT_MAX + 2); }
    else { return $filez; }
}
function permis($perms){
// u
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
// gr
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
// oth
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');

return $info;
}
?>



<style>
.vid{
    max-height:40em;
}
.filesize{
    font-size:14px;}
.w100{
    width:100%;
}
.h100{
    min-height:40em;
    height:100%;
}
body{
    font-size:3em;
}
ul {
    padding:0;
    list-style: none;
}
a{
    
    text-decoration:none;
}
a:before {
    padding-right:10px;
    font-weight: bold;
    color: #77AEDB;
    
    transition-duration: 0.5s;
}
a:hover:before {
    color: #337AB7;
    
}
td:first-child {
border-left: 2px dotted #56433D;
border-right: none;
border-top: 2px solid #56433D;

}
td:last-child {
border-left: 2px solid #56433D;
border-right: none;
border-bottom:2px solid #56433D;
}

td:last-child{
    border-bottom:2px solid #56433D;
    
}
}
</style>