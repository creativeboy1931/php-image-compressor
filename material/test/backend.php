<?php 
       sleep(3);
       ?>
<style>
    .test{
        background-color: red;
        font-size: 13px;
    }
</style>
<script src="/material/test/root.js"></script>
<script>
    alert('hello ram');
</script>
<?php
// echo "name = {$_POST['name']} and sname = {$_POST['sname']}";
    /*$data = array();
    $data = array('name' => $_POST['name'],'sname'=>$_POST['sname']);
   echo json_encode($data,true);*/
   if(isset($_POST['name'])){
       ?>
       <div class="test">
          1212312 Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio ea dolor obcaecati laborum, perspiciatis impedit! Incidunt ea placeat aliquam. Mollitia, voluptatem ut. Sunt tempora suscipit magni quibusdam reprehenderit officiis dolor?
       </div>
       <?php
   }
?>