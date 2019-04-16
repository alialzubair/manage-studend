
<?php  
session_start();
include 'init.php';
 $query = "SELECT DISTINCT hulls.Hulls_id,Hulls_name,Hulls_cordinator,Hulls_capacity,Hulls_status,section, date_table.date_table_date,time_table.time_table_start_time,time_table_end_time FROM `hulls` JOIN `date_table` ON date_table.hull_id = hulls.Hulls_id JOIN time_table ON date_table.date_table_id=time_table.date_id " ;  
 $stmt=$con->prepare($query);

 $stmt->execute();

 $fetch=$stmt->fetchall();

    
 
 ?>  

     
  <div class="container" style="width:900px;">  
                <h2 class="c1" align="center">Schedule Of Booking Classes and Labs </h2>  
                <h3 align="center">Please,Select appropriate date</h3><br />  
                <div class="col-md-3">  
                <input type="text" 
               name="search"
               class="form-control"
               id="myInput"
               placeholder="search....." 

               >
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
               
                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered table-condensed table-hover table-striped">  
 <tr>  
      <th>Hull ID</th> 
     <th>Hull Name</th>  
     <th>Cordinator</th> 
     <th>Capacity</th>  
     <th>Status</th>  
     <th>Section</th>
     <th>Date</th>
     <th>Start Time</th>
 <th>End Time</th>
 <th>Booking</th>
                             
 </tr>  
      <?php foreach($fetch as $row):?>
      <tbody id='myTable'>
      <tr>
      <td><?php echo $row["Hulls_id"]; ?></td> 
          <td><?php echo $row["Hulls_name"]; ?></td> 
     <td><?php echo $row["Hulls_cordinator"]; ?></td> 
     <td><?php echo $row["Hulls_capacity"]; ?></td> 
     <td><?php echo $row["Hulls_status"]; ?></td>
     <td><?php echo $row["section"]; ?></td> 
     <td><?php echo $row["date_table_date"]; ?></td>  
     <td><?php echo $row["time_table_start_time"]; ?></td> 
     <td><?php echo $row["time_table_end_time"]; ?></td> 
     <td>
          <a href="add_booking.php?id=<?php echo $row['Hulls_id'] ?>" class="btn btn-success">booking</a>
     </td> 
      </tr>
      </tbody>
     <?php endforeach;?>
                     
                   
                     </table>  
                </div>  
           </div>  

           
           <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<?php include 'include/footer.php'; ?>
