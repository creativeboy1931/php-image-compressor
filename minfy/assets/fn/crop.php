<?php
// $file = array("file"=>array(),"success"=>array()); // for json encode
$file = array(); // for json encode
if(isset($_POST['index'])){
    // Create zip Obj
    $zip = new ZipArchive();
    $zipFIleName = "minfy.zip";

    if(file_exists($_SERVER['DOCUMENT_ROOT']."/minfy/assets/img/item/".$zipFIleName)){
        unlink ($_SERVER['DOCUMENT_ROOT']."/minfy/assets/img/item/".$zipFIleName); 
        $zip->open($_SERVER['DOCUMENT_ROOT']."/minfy/assets/img/item/".$zipFIleName, ZIPARCHIVE::CREATE);
    }else{
        $zip->open($_SERVER['DOCUMENT_ROOT']."/minfy/assets/img/item/".$zipFIleName, ZIPARCHIVE::CREATE);
    }

    for($i=0;$i<$_POST['index'];$i++){
        $filename = $_FILES["file{$i}"]["name"];
        $folder = $_SERVER['DOCUMENT_ROOT']."/minfy/assets/img/item/".time().$filename;
        $downloadFile = cropa($_FILES["file{$i}"],$folder);
        if($downloadFile){
            // array_push($file,$downloadFile);
            $file["file{$i}"] = $downloadFile;
            $file["index"] = $i;
            $zip->addFile("{$downloadFile}",$_FILES["file{$i}"]["name"]); 
        }else{
            $file["staus"] = false;
            $file["msg"] = 'error in croping images';
            break;
        }
    }
    $zip->close(); // close zipper

    if(isset($_POST['ad_quality'])){
        $quality = $_POST['ad_quality'];
        switch($quality){
            case 1.2:
                $file["success"]['img_quality'] = '20%';
                break;
            case 1.42 :
                $file["success"]['img_quality'] = '30%';
                break;
            case 1.65:
                $file["success"]['img_quality'] = '40%';
                break;
            case 2:
                $file["success"]['img_quality'] = '50%';
                break;
            default:
                $file["success"]['img_quality'] = '30%';
                break;
        }

    }
  echo json_encode($file);
        // print_r($file);

}else{
    //  $file["success"]['staus'] = false;
        $file["msg"] = 'Images of index not found';
        $file['staus'] = false;
     echo json_encode($file);
}
// crop img
function cropa($img,$folder){
    /*{
        $img = image file,
        $img_retio = new img retio
        $folder = where img is save after croping
        if $img_retio is 0 mens only add watermark
    }*/
    // 1.2 20%, 1.42 30 %, 1.65 40% ,2 50%
    $tempname = $img["tmp_name"];
    $type = $img["type"];
    // $folder = $folder.$filename;

    list($w,$h) = getimagesize($tempname); //get image width height 

    if(isset($_POST['ad_quality'])){
        $nw = $w/$_POST['ad_quality'];
        $nh = $h/$_POST['ad_quality'];
        if($w >= $h){
            $coodX = $nw - ($nw*95/100);
            $coodY = $nh - ($nh*3/100);
            $fn_size = ($nh*5/100);
        }else{
            $coodX = $nw - ($nw*95/100);
            $coodY = $nh - ($nh*3/100);
            $fn_size = ($nw*5/100);
        }

    }else{
        $nw = $w/1.42;
        $nh = $h/1.42;
        if($w >= $h){
            $coodX = $nw - ($nw*95/100);
            $coodY = $nh - ($nh*3/100);
            $fn_size = ($nh*5/100);
        }else{
            $coodX = $nw - ($nw*95/100);
            $coodY = $nh - ($nh*3/100);
            $fn_size = ($nw*5/100);
        }  
    }
    //control font size 
    $new_img = imagecreatetruecolor($nw,$nh); //create new black image

    $color = imagecolorallocate($new_img,255,255,255); //color for text in img
    // $text = "www.myhelper.live";
    $font = $_SERVER['DOCUMENT_ROOT']."/minfy/assets/fonts/ARIAL.TTF";
    switch($type){
        case 'image/jpeg':
            $sourceImage = imagecreatefromjpeg($tempname);
            if(isset($_POST['ad_water_mark'])){
                imagecopyresized($new_img,$sourceImage,0,0,0,0,$nw,$nh,$w,$h);
                imagefttext($new_img,$fn_size,0,$coodX,$coodY,$color,$font,$_POST['ad_water_mark']);
            }else{
                imagecopyresized($new_img,$sourceImage,0,0,0,0,$nw,$nh,$w,$h);
                // imagefttext($new_img,$fn_size,0,$coodX,$coodY,$color,$font,$text);
            }
    
            if(imagejpeg($new_img,$folder)){
                return $folder;
            }else{
                return false;
            }
            break;
        case 'image/png':
            $sourceImage = imagecreatefrompng($tempname);
            if(isset($_POST['ad_water_mark'])){
                imagecopyresized($new_img,$sourceImage,0,0,0,0,$nw,$nh,$w,$h);
                imagefttext($new_img,$fn_size,0,$coodX,$coodY,$color,$font,$_POST['ad_water_mark']);
            }else{
                imagecopyresized($new_img,$sourceImage,0,0,0,0,$nw,$nh,$w,$h);
                // imagefttext($new_img,$fn_size,0,$coodX,$coodY,$color,$font,$text);
            }
            
            if(imagepng($new_img,$folder)){
                return $folder;
            }else{
                return false;
            }
            break;
    }

 }
