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
echo $count;
print_r($row);
$major_name= $_GET['name'];
?>
<div class="container">
<h1><?php echo $major_name?></h1>
<div class="rows">
  <div class="col-sm-6 col-md-4">
  <?php foreach($row as $r):?>

  <div class="thumbnail">
      <div class="caption">
        <h3><?php echo $r['section_name'] ?></h3>
        <p><?php  echo $r['descs']?></p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
<?php endforeach;?>
  </div>    
</div>
</div>
