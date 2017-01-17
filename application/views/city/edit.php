<?php $this->widget("Header")?>
<body>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           管理 <a href="/city/list">返回</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/city/edit" method="post">
                                    <input type="hidden" name="id" value="<?php echo $city['id'];?>">
                                    <label>国家</label>
                                        <select class="js-example-basic-single" name="countryid" id="countryid">
                                        <?php foreach ($countrys as $k=>$v){?>
										  <option value="<?php echo $v['id'];?>" <?php if($v['id']==$city['countryid']){?> selected="selected" <?php }?>><?php echo $v['name'];?></option>
									   <?php }?>
									</select>
                                    <label>省份</label>
                                        <select class="js-example-basic-single" name="provinceid" id="provinceid">
                                        <?php foreach ($provinces as $k1=>$v1){?>
										  <option value="<?php echo $v1['id'];?>" <?php if($v1['id']==$city['provinceid']){?> selected="selected" <?php }?>><?php echo $v1['name'];?></option>
									   <?php }?>
									</select>
                                        <div class="form-group">
                                            <label>名称</label>
                                            <input class="form-control" name="name" placeholder="名称" value="<?php echo $city['name'];?>">
                                            <p class="help-block"></p>
                                        </div>
                                                                             
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
    <script src="<?php echo $baseUrl;?>/assets/jquery/jquery-3.1.1.min.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function(){
		  $("#countryid").change(function(){
			  var v = $(this).children('option:selected').val(); 
			  $.post("/province/json",
					  {
				  		countryid : v
					  },
					  function(data,status){
				  
				  //$("#partnerflag").children('option').remove();
				  $("#provinceid").empty();
				  jsonResp=eval("("+data+")");
			         datas = jsonResp['data'];
				  for(var i = 0; i < datas.length; i++)
				    {
					  $("#provinceid").append("<option value="+datas[i].id+">"+datas[i].name+"</option>");
				    }
				});
		  });
		});
	</script>
	
</body>

</html>
