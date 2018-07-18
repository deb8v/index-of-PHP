
<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
function largefile($file) {
    $file   =  filesize($file);
    $sizekb = $file / 1024;
    $sizemb = $sizekb / 1024;
    $sizegb = $sizemb / 1024;
    $sizetb = $sizegb / 1024;

    if ($file > 1) {$size = round($file,2) ." b";}
    if ($sizekb > 1) {$size = round($sizekb,2) ." Kb";}
    if ($sizemb > 1) {$size = round($sizemb,2) . " Mb";}
    if ($sizegb > 1) {$size = round($sizegb,2) ." Gb";}
    if ($sizetb > 1) {$size = round($sizetb,2) ." Tb";}
    
    return $size;
    }
    function file_extension($filename) {
        $file_info = pathinfo($filename);
        return $file_info['extension'];
        }
        
    function return_img($ext){
        $pic='no.gif';
if($ext=='mp3' || $ext=='mp2' || $ext=='wav'){$pic='sound.gif';}
if($ext=='png' || $ext=='jpg' || $ext=='jpeg'|| $ext=='bmp'|| $ext=='gif'){$pic='pic.gif';}
if($ext=='7z' || $ext=='rar' || $ext=='zip'){$pic='arh.gif';}
if($ext=='exe'){$pic='exe.gif';}
return $pic;
    }
$dir = "files";
    if($handle = opendir($dir)){
        echo '<table border="1" width="30%" cellpadding="3">';
        echo '<tr><th> </th><th>files</th><th></th><th>size</th></tr>';
        while(false !== ($file = readdir($handle))) {
            if($file != "." && $file != ".."){
        
        
            echo '<tr>';
            if(is_dir('files/'.$file)){echo '<td bgcolor="#FAA">';}else{echo '<td bgcolor="#AFA">';}
            echo ' ';
            echo '</td><td>';
            echo '<a href="files/'.$file.'">'.$file.'</a>';
            echo '</td><td>';
            if(is_dir('files/'.$file)){echo '<img align="moddle" src="fld.gif"/>';}else{ 
                //echo file_extension("file/".$file);
                echo '<img align="moddle" src="'.return_img(file_extension($file)).'"/>';
            }
           
            echo '</td><td>';
            if(!is_dir('files/'.$file)){ echo largefile("files/".$file);}else{echo 'dir';}
            
            echo '</td>';
            echo '</tr>';

        }
          
    }
    echo '</table>';      
}


?>
