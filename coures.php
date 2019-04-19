<?php
session_start();
include 'init.php';

$id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
//make sql
$sql="SELECT course.*,section.* from course
JOIN section ON
course.section_id=section.section_id
where section.section_id='{$id}' ";

//prepare the sql
$stmt=$con->prepare($sql);
//execute the query
$stmt->execute();
//fetch data
$row=$stmt->fetchall();
//count the data
$count=$stmt->rowcount();

$coures=$_GET['name'];
?>

<div class="container">
<h1 class="text-center text-info"><?php echo $coures?></h1>
<div class="">
  <div class="">
  <?php foreach($row as $r):?>

  <div class="thumbnail">
      <div class="caption">
        <h3><i class="text-danger">Coures Code:</i> <?php echo $r['course_code'] ?></h3>
        <p><b class="text-danger"> requirements Coures:</b> <?php  echo $r['requirements_name']?></p>
        Hours: <strong><?php echo $r['total_hours'] ?></strong>
        <p><a href="<?php echo $r['reference_table_link']?>"  class="btn btn-success" role="button">view coures</a></p>
      </div>
    </div>
<?php endforeach;?>
  </div>    
</div>
</div>

