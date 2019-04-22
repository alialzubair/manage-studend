<?php
session_start();

include 'init.php';
$id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;

$sql="SELECT major.* ,section.*,employee_table.* FROM major
join section on section.id_major=major.major_id
join employee_table on section.section_id=employee_table.section_id
where major.major_id='{$id}'   and gender='male' ";
$stmt=$con->prepare($sql);
$stmt->execute();
$row=$stmt->fetchall();
$count=$stmt->rowcount();




?>
    
        
    <div class="container">
           <div class="rwo">
    
        
            <div class="col-lg-6" ><!---6 rows----->
             <section class="c2">
             
            <?php foreach($row as $r): ?>
            
            <ul class="list-group">
            <img src="image/img_avatar.png" 
           width=20% class="img-circle" align='center' >
           <hr>
           
            <li class="list-group-item">Name:Miss:<?php echo $r['employee_table_name'] ?></li>
            <li class="list-group-item">Job:<?php echo $r['major_name'] ?> </li>
            <li class="list-group-item">Office:<?php echo $r['office_no'] ?></li>
            <li class="list-group-item">Phoen:<?php echo $r['phone'] ?></li>
            <li class="list-group-item">section:<?php echo $r['section_name'] ?></li>
            <li class="list-group-item">Office hours:  <?php echo $r['time_start']?> to <?php echo $r['time_end']?> </li>
           <li class="list-group-item">Room Number:    A362 </li>
            </ul>
            
 <a href="#"><?php echo $r['email'] ?></a>
       <br>
       <br>
       
   
<a href="booking_emp.php?id=<?php echo $r['employee_table_id'] ?>" > <input type="submit" name="checks" class="btn btn-info" value="Chose"></a>

<?php endforeach;?>
            
        </section> 
        </div>
 
        </form>
     