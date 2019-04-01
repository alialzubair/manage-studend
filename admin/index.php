<?php
include 'include/header.php';

include 'init.php';
 include 'actions.php';

 $count_section=rowcount('section');
 $count_major=rowcount('major');
//  $count_section=rowcount('section');
?>




  <!-- section of breadcrumd -->
  <section id="breadcrumd">
      <div class="container">
          <ol class="breadcrumd">
              <li class="active"><a href="index.php">Dashbord</a> </li>
          </ol>
      </div>

  </section>

  <!-- main -->
  <section id="main">
      <div class="container">
          <div class="row">
              <div class="col-md-3">
                  <div class="list-group">
                      <a href="index.html" class="list-group-item active"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashbord</a>
                      <a href="pages.html" class="list-group-item "><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Section <span class="badge"><?php echo $count_section ?></span></a>
                      <a href="post.html" class="list-group-item "><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Major <span class="badge"><?php echo $count_major ?></span></a>
                      <a href="user.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge">150</span></a>

                  </div>
                  <div class="well">
                      <h4>Disk space using</h4>
                      <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60" style="width:90%">90%</div>
                      </div>

                      <h4>BindWidth Used</h4>
                      <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60%" style="width:60%">40%</div>
                      </div>
                  </div>
              </div>

              <div class="col-md-9">
                  <div class="panel panel-default">
                      <div class="panel-heading main-color">
                          <h3 class="panel-title">Website overview</h3>
                      </div>
                      <div class="panel-body">
                          <!-- manage users -->
                          <div class="col-md-3">
                              <div class="well dash-box">
                                  <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 234</h2>
                                  <h4>Users</h4>
                              </div>
                          </div>
                          <!-- end mange user -->

                          <!-- manage posts -->
                          <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 234</h2>
                                    <h4>Posts</h4>
                                </div>
                            </div>
                          <!-- end manage post -->

                          <!-- manage pages -->
                          <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 234</h2>
                                    <h4>Pages</h4>
                                </div>
                            </div>
                          <!-- end manage pages -->

                          <!-- mange the vistor -->

                          <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 234</h2>
                                    <h4>Users</h4>
                                </div>
                            </div>

                          <!-- end manage vistor -->
                      </div>
                  </div>

                  <!-- strat the view users -->
                  <div class="panel panel-default">
                      <div class="panel-heading main-color">
                          <h4 class="panel-title">Lastes Users</h4>
                      </div>
                      <div class="panel-body">
                         <table class="table table-striped table-hover">
                             <tr>
                                 <th>id</th>
                                 <th>name</th>
                                 <th>address</th>
                                 <th>phone</th>
                                 <th>age</th>
                             </tr>
                             <tr>
                                 <th>1</th>
                                 <th>ali</th>
                                 <th>omdraman</th>
                                 <th>0999567272</th>
                                 <th>26</th>
                             </tr>
                             <tr>
                                    <th>2</th>
                                    <th>ali</th>
                                    <th>omdraman</th>
                                    <th>0999567272</th>
                                    <th>26</th>
                                </tr>
                                <tr>
                                        <th>3</th>
                                        <th>ahmed</th>
                                        <th>ejpt</th>
                                        <th>0999567272</th>
                                        <th>26</th>
                                    </tr>
                                    <tr>
                                            <th>4</th>
                                            <th>omer</th>
                                            <th>bahre</th>
                                            <th>0999567272</th>
                                            <th>27</th>
                                        </tr>
                                        <tr>
                                                <th>5</th>
                                                <th>osman</th>
                                                <th>omdraman</th>
                                                <th>0999567272</th>
                                                <th>30</th>
                                            </tr>
                             
                         </table>
                      </div>
                  </div>


                  <!-- end view users -->


              </div>
          </div>
      </div>
  </section>

  <!-- model -->

  <!-- end model -->

  <!-- addpage -->
  <div class="modal fade" id="addpage" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              
              <div class="modal-header">
                  <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true"> </span></button>
                  <h4 class="modal-title" id="myModalLabel">modal title</h4>
              </div>
              <div class="modal-body"></div>
                  <form action="">
                        <div class="modal-header">
                                <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true"> </span></button>
                                <h4 class="modal-title" id="myModalLabel">modal title</h4>
                            </div>
                            <div class="modal-body"></div>
                                <div class="form-group">
                                    <label>page title</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                      <label>page body</label>
                                      <textarea name="" id="" cols="15" rows="5" class="form-control"></textarea>
                                  </div>
                                  <div class="check-box">
                                          <label>page check
                                          <input type="checkbox">
                                          </label>
                                      </div>
                                      <div class="form-group">
                                              <label>meta tag</label>
                                              <input type="text" class="form-control">
                                          </div>
                                          <div class="form-group">
                                                  <label>meta description</label>
                                                  <input type="text" class="form-control">
                                              </div>
                  </form>
              <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal">close</button>
                  <button type="button" class="btn btn-danger">save change</button>
              </div>
          </div>
      </div>
  </div>

  <!-- end add page -->

  <!-- footer -->
  <footer id="footer">
   <p>All copyright by &copy; 2019</p>
  </footer>


 




<?php include 'include/footer.php'; ?>