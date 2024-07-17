<?php
    $success = array(); // for json encode
    if(isset($_POST['imgLocation'])){
        if (file_exists($_POST['imgLocation'])) {
            if(unlink($_POST['imgLocation'])){
                $success["staus"] = true;
                $success["msg"] = 'Successfully File has deleted';
            }else{
                $success["staus"] = false;
                $success["msg"] = 'File Not deleted';
            }
        }else{
            $success["staus"] = false;
            $success["msg"] = 'File location not found';
        }
    }else{
        $success["staus"] = false;
        $success["msg"] = 'File location is not set';
    }
    echo json_encode($success);
?>