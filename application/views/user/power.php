<?php $this->widget("Header");?>

<body>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           用户管理 <a href="/user/list">返回</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/user/power" method="post">
                                    <input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>"> 
                                    <label>选择产品</label>
                                        <select class="js-example-basic-single disabled" name="produceid" id="produceid">
                                        <?php foreach ($produces as $k=>$v){?>
										  <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
									   <?php }?>
									</select><br>
									<?php foreach ($parentMenus as $pk=>$pv){?>
											<label><?php echo $pv['name'];?></label>
											
											<?php foreach ($subMenus as $sk=>$sv){?>
											<?php if($pv['id']==$sv['parentid']){?>
											<label class="checkbox-inline">
										  <input type="checkbox" name="powers[]" value="<?php echo $sv['id'];?>" <?php if(in_array($sv['id'], $power)){ ?> checked="checked" <?php }?>/><?php echo $sv['name']?>
										</label>
										<?php }?>
											<?php }?>
											<br>
									<?php }?>                                                                        
                                     <div class="form-group">
                                     <button class="btn btn-success" type="submit">提交</button>
                                     </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->



    <!-- jQuery -->
    <script src="<?php echo $baseUrl;?>/assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $baseUrl;?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $baseUrl;?>/assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $baseUrl;?>/assets/dist/js/sb-admin-2.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
		  /* $("#gameid").change(function(){
			  var v = $(this).children('option:selected').val(); 
			  $.post("gamepartner/ajax_ps",
					  {
				  		gameflag : v
					  },
					  function(data,status){
				  
				  //$("#partnerflag").children('option').remove();
				  $("#partnerid").empty();
				  for(var i = 0; i < data.length; i++)
				    {
					  $("#partnerid").append("<option value="+data[i].partner+">"+data[i].name+"</option>");
				    }
				});
		  }); */
		  
		  $("#gameid").change(function(){
			  var userid = $("#userid").val();
			  var gameid = $(this).children('option:selected').val();
			  window.location.href = "/user/power?userid="+userid+"&gameid="+gameid;
		  });
		});
	</script>
</body>

</html>
