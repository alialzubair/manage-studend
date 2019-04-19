<?php
include 'init.php';

//make get request to fetch the section of major
$id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
//fetch all section where major = id
$sql="select section.*, major.major_name,major.descs from section
JOIN major on  
section.id_major=major.major_id
where major.major_id= '{$id}' ";
//prepare the sql
$stmt=$con->prepare($sql);
//execute the query
$stmt->execute();
//fetch data
$row=$stmt->fetchall();
//count the data
$count=$stmt->rowcount();

$major_name= $_GET['name'];
?>
<div class="container">
<h1 class="text-success text-center"><?php echo $major_name?></h1>
<div class="">
  <div class="">
  <?php foreach($row as $r):?>

  <div class="thumbnail">
      <div class="caption">
        <h3><i class="text-danger">Section Name:</i><?php echo $r['section_name'] ?></h3>
        <p class="lead"><b class="text-danger">Description:</b><?php  echo $r['descs']?></p>
        <p><a href="coures.php?id=<?php echo $r['section_id'] ?>&name=<?php echo $r['section_name'] ?>" class="btn btn-primary" role="button">Coures</a></p>
      </div>
    </div>
<?php endforeach;?>
  </div>    
</div>
</div>
