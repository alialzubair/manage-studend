<?php
//include '../init.php';
/**
 * in this page will make all action to working in database
 * make the method like [add,edit,delete,show,getall,get_single,rowCount...]
 */


 //function to get all data

 function getAll($table){
     global $con;
 $query="SELECT * from {$table}";
  //prepare the query
  $stmt=$con->prepare($query);
  //execute the query
  $stmt->execute();
  //fetch all data
  $fetch=$stmt->fetchAll();

  //return the data
  return $fetch;
 }
 //get thesiangle data
 function singel($table ,$filed,$id){
    global $con;
 $query="SELECT * from {$table} where {$filed}={$id}";
     //prepare the query
     $stmt=$con->prepare($query);
     //execute the query
     $stmt->execute();
     //fetch all data
     $fetch=$stmt->fetch();
   
     //return the data
     return $fetch;
 }

 //make the row count
 function rowCount($table){
    global $con;
    $query="SELECT * from {$table}";
     //prepare the query
     $stmt=$con->prepare($query);
     //execute the query
     $stmt->execute();
     //fetch all data
     $fetch=$stmt->fetchAll();
     $count=$stmt->rowCount();
   
     //return the data
     return $count;
 }

 //make the delete function

 function delete($table,$field, $id){
    global $con;
 $query="DELETE  from {$table} where {$field}={$id}";
     //prepare the query
     $stmt=$con->prepare($query);
     //execute the query
     $stmt->execute();
     //fetch all data
     if($stmt){
         return true;
     }
     else{
         return false;
     }
 }

 function AllSection(){
     global $con;
     $sql="SELECT section.*,major.major_name FROM section
     JOIN major ON
     section.id_major=major.major_id";
     //prepare the sql
     $stmt=$con->prepare($sql);
     //execute the query
     $stmt->execute();

     //fetch all
     $getAll=$stmt->fetchall();

     //return the getall
     return $getAll;
 }

 //sinagel
 
 function SingleSection($id){
    global $con;
    $sql="SELECT section.*,major.major_name FROM section
    JOIN major ON
    section.id_major=major.major_id
      where section_id={$id}
    ";
    //prepare the sql
    $stmt=$con->prepare($sql);
    //execute the query
    $stmt->execute();

    //fetch all
    $getAll=$stmt->fetch();

    //return the getall
    return $getAll;
}

//make function to get admin
function admin($user){
    global $con;
  $sql="SELECT * from employee_table where username=? and  groups='admin' and status='yes'";
  $stmt=$con->prepare($sql);
  $stmt->execute([$user]);

  $fetch=$stmt->fetch();
  $count=$stmt->rowcount();

  return $count;
}

//make function to get admin
function empl($user){
    global $con;
    $sql="SELECT * from employee_table where username=? and  groups='emplyoee' and status='yes'";
    $stmt=$con->prepare($sql);
    $stmt->execute([$user]);
  
    $fetch=$stmt->fetch();
    $count=$stmt->rowcount();
  
    return $count;
  }

//make function to get studend
function studend($user){
    global $con;
    $sql="SELECT * from user where username=?  and status=1";
    $stmt=$con->prepare($sql);
    $stmt->execute([$user]);
  
    
    $count=$stmt->rowcount();
  
    return $count;
  }
  //make the function  to check the status account
  function status($user){
      
 global $con;
 $stmtx=$con->prepare("select username ,status
                         
                             from
                             user
                             where
                             username=?
                             and
                             status=1");
 $stmtx->execute(array($user));

 $statues=$stmtx->rowcount();
return $statues;

  }

  //make the function male
  function male($user){
    global $con;
    $sql="SELECT * from user where username=?  and gender='male'";
    $stmt=$con->prepare($sql);
    $stmt->execute([$user]);
  
    
    $count=$stmt->rowcount();
  
    return $count;

  }
  //make the function female
  function female($user){
    global $con;
    $sql="SELECT * from user where username='{$user}'  and gender='female'";
    $stmt=$con->prepare($sql);
    $stmt->execute();
  
    
    $count=$stmt->rowcount();
  
    return $count;

  }

  /**
   * make the functions to easy work
   */
  
 
//here we create some function to make work very easy

/*
 **first function I we create echo title of page
 **this function accept paramters
 **$pagetitle echo the title  
***if not fount $pagetitle in the page echo default



*/
function gettitle(){
global $pagetitle;

if(isset($pagetitle)){

	echo $pagetitle;
}
else{
	echo 'default';
}

}

//end the $pagetitle function

/*
 //second function we create function to redirect you in other page
 **redirct function[this function accept paramter]
 **$themsg=echo the errors message
 **$url=link to redircting.
 **$second= second befor redircting
*/
//now I create the function

function redircthome($themsg,$url=null,$second=3){

	//ckeck the url
	if($url==null){
		$url='index.php';
	}
	else{
	  $url=header("location:'{$url}'");
}

echo $themsg;
echo "<div class='alert alert-info'>you well be directed after $second second.</div>";
header("refresh:$second;url=$url");

}




