
                <div class="container-fluid">
                    <div class="row text-center text-white profile-block" style="height: 45px;"></div>

                    <div class="row">
                        <!-- User Profile -->
                        <div class="col-lg-6 col-sm-12">
                            <div class="card m-b-30 border-1">
                                <div class="row text-center text-white profile-block" style="height: 25px;">
                                </div>
                                
                                <div class="row text-center profile-block">
                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            <h5 class="mt-3"><b>Add a Vehicle</b></h5>
                                            <?php
                                                $validation = \Config\Services::validation();
                                                if($validation->getErrors() or session()->getFlashdata('error'))
                                                {
                                                    echo "<div class=\"alert alert-danger\" role=\"alert\">";
                                                    echo $validation->listErrors();
                                                    echo session()->getFlashdata('error');
                                                    echo "</div>";
                                                }
                                            ?>
                                        </div> 
                                        <form class="form mt-5 contact-form" method="post">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line" id='select_make' name="make">
                                                        <?php 
                                                        foreach($themakes as $mk){
                                                        echo "<option value='".$mk['make_id']."' >".ucwords($mk['make_name'])."</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                        <span id='models'></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                        <span id='years'></span>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="col-sm-12">
                                                    <span id='notes'></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12 mt-4">
                                                    <span id="save"></span>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Vehicle -->
                    </div>                 
                    
                </div><!--end container-->

            </div>
            <!--end body content-->
        </section>

          <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type='text/javascript'>
  $(document).ready(function(){
      $(document).on('change','#select_make',function(){
          var yourmake = $('#select_make').val();
          if(yourmake.length == 0)
          {
              $('#models').text('');
              $('#years').text('');
              $('#notes').text('');
              $('#save').text('');
            
          }
          else{
              $.ajax({
                  method: "POST",
                  url: '<?= site_url('getmodels'); ?>',
                  data: {yourmake: yourmake},
                  dataType: 'json',
                  success: function(response)
                  {
                      if(response)
                      {
                        //display the information
                        $("#models").html(response[0]);
                        $("#years").html(response[1]);
                        $("#notes").html("<textarea class=\"form-control form-control-line\" rows=\"5\" name=\"notes\" placeholder=\"Your Notes\"></textarea>")
                        $("#save").html("<button class=\"btn btn-primary\" type=\"submit\">Save</button>");
                      }
                  }
              });
          }

          
      });

   
 });
 </script>