<?php 
 
    $success = array();
    if(isset($_POST['name'])){
        require($_SERVER['DOCUMENT_ROOT'].'/material/class/database_class.php');

        $obj = new database('localhost',"root","",'minfy');

        $table = 'contact_form';
        $params = array('name' => $_POST['name'],'email' =>$_POST['email'],'msg' =>$_POST['msg']);
        $row = $obj ->insert($table,$params);
        if($row){
            $success["msg"] = "Successfully your feedback recived";
        }else{
            $success["status"] = false;
            $success["msg"] = "May have Network problem can`t recive feedback";
        }
        
         echo json_encode($success);
    }

?>