
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
if($ext=='3dm' || $ext=='3ds' || $ext=='dwg' || $ext=='dxf' || $ext=='max' || $ext=='obj'){$pic='3dm.gif';}
if($ext=='zip' || $ext=='tar' || $ext=='sitx' || $ext=='7z' || $ext=='cbr' || $ext=='deb' || $ext=='gz' || $ext=='pkg' || $ext=='rpm' || $ext=='rar'){$pic='arh.gif';}
if($ext=='aif' || $ext=='iff' || $ext=='m3u' || $ext=='m4u' || $ext=='mid' || $ext=='midi' || $ext=='mp3' || $ext=='mp2' || $ext=='mpa' || $ext=='ra' || $ext=='wav' || $ext=='wma'){$pic='sound.gif';}
if($ext=='svg' || $ext=='ps' || $ext=='eps' || $ext=='ai'){$pic='vect.gif';}
if($ext=='3gp' || $ext=='avi' || $ext=='flv' || $ext=='mov' || $ext=='m4v' || $ext=='mov' || $ext=='mp4' || $ext=='mpg' || $ext=='rm' || $ext=='srt' || $ext=='swf' || $ext=='vob' || $ext=='wmv'){$pic='vid.gif';}
if($ext=='kmz' || $ext=='kml' || $ext=='gpx'){$pic='geo.gif';}
if($ext=='doc' || $ext=='docx' || $ext=='ibooks' || $ext=='odt' || $ext=='pdf' || $ext=='rtf' || $ext=='tex' || $ext=='wpd' || $ext=='wps'){$pic='docs.gif';}
if($ext=='uue' || $ext=='mim' || $ext=='keychain' || $ext=='hqx' || $ext=='cer'){$pic='encr.gif';}
if($ext=='xhtml' || $ext=='rss' || $ext=='jsp' || $ext=='js' || $ext=='php' || $ext=='htm' || $ext=='html'){$pic='web.gif';}
if($ext=='apk' || $ext=='app' || $ext=='dat' || $ext=='exe' || $ext=='jar' || $ext=='msi' || $ext=='pif' || $ext=='vb' || $ext=='wsf'){$pic='exe.gif';}
if($ext=='conf' || $ext=='prf' || $ext=='cue' || $ext=='ini' || $ext=='cfg'){$pic='cfg.gif';}
if($ext=='toast' || $ext=='vcd' || $ext=='mdf' || $ext=='iso' || $ext=='dmg' || $ext=='bin'){$pic='iso.gif';}
if($ext=='crx' || $ext=='plugin'){$pic='plugin.gif';}
if($ext=='bmp' || $ext=='gif' || $ext=='jpg' || $ext=='png' || $ext=='psd' || $ext=='tga' || $ext=='tif' || $ext=='tiff'|| $ext=='yuv'){$pic='pic.gif';}
if($ext=='sys' || $ext=='lnk' || $ext=='ico' || $ext=='drv' || $ext=='dmp' || $ext=='dll' || $ext=='cur' || $ext=='cpl'|| $ext=='cab'){$pic='sys.gif';}
if($ext=='sln' || $ext=='sh' || $ext=='py' || $ext=='pl' || $ext=='m' || $ext=='lua' || $ext=='java' || $ext=='h' || $ext=='cs' || $ext=='cpp' || $ext=='class'|| $ext=='c'){$pic='scr.gif';}
if($ext=='txt' || $ext=='log'){$pic='txt.gif';}
if($ext=='accdb' || $ext=='sql' || $ext=='pdb' || $ext=='mdb' || $ext=='dbf' || $ext=='dbf'){$pic='db.gif';}
if($ext=='ttf' || $ext=='otf' || $ext=='fon' || $ext=='fnt'){$pic='fonts.gif';}
if($ext=='xml' || $ext=='sdf' || $ext=='ged' || $ext=='gbr' || $ext=='dat' || $ext=='csv'){$pic='data.gif';}

return $pic;
    }
$dir = "files";
    if($handle = opendir($dir)){
        echo '<table border="1%" cellpadding="1%">';
        echo '<tr><th></th><th>Files</th><th></th><th>Size</th><th>Last edit</th></tr>';
        while(false !== ($file = readdir($handle))) {
            if($file != "." && $file != ".."){
        
        
            echo '<tr>'; if(is_dir('files/'.$file)){echo '<td bgcolor="#F00">';}else{echo '<td bgcolor="#0F0">';}echo ' ';

            echo '</td><td>';
            
            echo '<a href="files/'.$file.'">'.$file.'</a>';
            echo '</td><td>';
            if(is_dir('files/'.$file)){echo '<img src="ico/fld.gif"/>';}else{ 
                //echo file_extension("file/".$file);
                echo '<img align="center" src="ico/'.return_img(file_extension($file)).'"/>';
            }
           
            echo '</td><td>';
            if(!is_dir('files/'.$file)){ echo largefile("files/".$file);}else{echo 'dir';}
            echo '</td><td>';
            
if (file_exists('files/'.$file)) {echo date("d.m.Y H:i",filectime('files/'.$file));}
            echo '</td></tr>';

        }
          
    }
    echo '</table>';      
}


?>
