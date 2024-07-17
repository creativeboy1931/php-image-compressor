<?php
//#### database version 1.0.2
// only contained basic database activity to Sql database ####
// Auther : Purushottam sahu #####
class database{
    public $result=array();
    private $db_host= "";
    private $db_user= "";
    private $db_pass= "";
    private $db_name= "";
    // conection stablish
    private $mysqli ="";
    private $con = false;

    public function __construct($getDBhost,$getDBuser,$getDBpass,$getDBname) 
    {
        // set database detail dynamicaly
        if(($this->db_host == "")&&($getDBhost != "")){
            $this->db_host = $getDBhost;
        }
        if(($this->db_user == "")&&($getDBuser != "")){
            $this->db_user = $getDBuser;
        }
        if(($this->db_pass == "")&&($getDBpass != "")){
            $this->db_pass = $getDBpass;
        }
        if(($this->db_name == "")&&($getDBname != "")){
            $this->db_name = $getDBname;
        }

        if(!$this->con){
             $this->mysqli = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);

                if($this->mysqli->connect_error){
                    // echo "error_found" .$this->db_name;
                    
                } else{
                    // echo "successfull conection <br>" .$this->db_name; 
                    $this->con =true;
                }
             
        }else{
            // return true;
        }
    }   
    // insert data
    public function insert($table,$params=array())
    {
        if($this->tableExist($table)){

            $table_colums=implode(', ' ,array_keys($params));
            $table_value=implode("', '" ,$params);

         $query="INSERT INTO $table ($table_colums) VALUES ('$table_value')";
            if($this->mysqli->query($query)){
                return true;
                // echo $this->mysqli->insert_id;
            }
            
        }else{
            //  echo "error";
            return false;
        }
        
        
    }
    // UPDATE TABLE DATA
    public function update($table,$params=array(),$where = null){
        if($this->tableExist($table)){
               $args = array();

                foreach($params as $key => $value){
                         $args[] ="$key = '$value'";
                }
                // print_r($args);

             if($where == null){
                $sql= "UPDATE $table SET " . implode(', ', $args);
                // echo "without $where";
             }else{
                $sql= "UPDATE $table SET " . implode(', ', $args). " WHERE ".$where;
            }
                // update query
                if($this->mysqli->query($sql)){
                    // echo "table has updated";
                    return true;
                }else{
                    return false;
                    // echo 'table not updated';
                }
        }else{ 
            // echo $table."Name Table not Exists in database";
            return false;
        }
    }
   //  DELETE TABLE DATA
    public function delete($table,$where)
    {
        if($this->tableExist($table)){
            if($where !=null){
              $sql="DELETE FROM $table WHERE $where";
               if($this->mysqli->query($sql)){
                    // echo "successfull delete record";
                    return true;
                }else{
                    // echo "something went wrong because can't delete record";
                    return false;
                }

            }else{
                // echo "please select right colums";
                return false;
            }
        }else{ 
            // echo $table."Name Table not Exists in database";
            return false;
        }
    }

    // SELECT QUERY
    public function select($table,$field="*",$condition=null,$like=null,$order_by_field=null,$order_by_type=NULL,$limit=NULL){
        if($this->tableExist($table)){

            $sql = "SELECT $field FROM $table ";
                if($condition != null){
                    $sql .= "WHERE $condition ";
                }
                if($like != null){
                    $sql .= "LIKE '$like' ";
                }
                if($order_by_field != null){
                    $sql .= "ORDER BY  $order_by_field ";
                }
                
                if($order_by_type != null && $order_by_field == null){
                    $sql .="ORDER BY $order_by_type ";
                
                }else {
                    $sql .= " $order_by_type ";

                }
                if($limit != null){
                    $sql .= "LIMIT $limit";
                }
            $query=$this->mysqli->query($sql);
            if($query){
                // echo 'query run';
                $this->result=$query;
            }else{
                echo $this->mysqli->error;

            }
            
        }
    }
    // SELECT  CUSTOM TABLE OR RECORD
    public function select_custom($sql){
        $query = $this->mysqli->query($sql);
        
            if($query){
                $this->result = $query;
                // echo 'query success';

            }else{
                $this->mysqli->error;
                // echo 'query faild';
            }
    }
    // SELECT ALLTABLE DATA
    public function selectAll($table){
        if($this->tableExist($table)){
            $sql="SELECT* FROM $table";
            $query=$this->mysqli->query($sql);
    
           if($query){
                // $this->result=$query->fetch_all(MYSQLI_ASSOC);
                //  print_r($this->result);
               
                $this->result=$query;
                // echo 'query success';
            }else{
                echo $this->mysqli->error;
                // echo 'query faild';
            }
            return true;

        }

    }
    // TABLE EXISTS table and its value check
    private function tableExist($table){
        $sql= "SHOW TABLES FROM $this->db_name LIKE '$table'"; 
        $tableResult=$this->mysqli->query($sql);
        if($tableResult){
            if($tableResult->num_rows == 1){
                //  echo '$table exist in this database';
                return true;
            }else{
                // echo '$table not exist';
                return false;
            }
        }                                                                                                                                                                                                                                                                                       
    }
    //use publicly connection
    public function connect(){
        $connect = $this->mysqli; 
        // echo 'connected live server';
        return $connect;
    }

    public function __destruct()
    {
        if($this->con){
            if($this->mysqli->close()){
                // echo "<br> connection close succesfuly";
                $this->con=false;
            }else{

            }
        }
    }
}
?>