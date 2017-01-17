<?php $this->widget("Header") ?>
<script src="<?php echo $baseUrl;?>/assets/ckeditor/ckeditor.js"></script>
<body>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           管理 <a href="/organization/list">返回</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/organization/add" method="post">
                                    <label>国家</label>
                                        <select class="js-example-basic-single" name="countryid" id="countryid">
                                        <?php foreach ($countrys as $k=>$v){?>
										  <option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
									   <?php }?>
									</select>
                                    <label>省份</label>
                                        <select class="js-example-basic-single" name="provinceid" id="provinceid">
                                        <?php foreach ($provinces as $k1=>$v1){?>
										  <option value="<?php echo $v1['id'];?>"><?php echo $v1['name'];?></option>
									   <?php }?>
									</select>
									<label>城市</label>
                                        <select class="js-example-basic-single" name="cityid" id="cityid">
                                        <?php foreach ($citys as $k1=>$v1){?>
										  <option value="<?php echo $v1['id'];?>"><?php echo $v1['name'];?></option>
									   <?php }?>
									</select><br>
                                    <label>机构类型</label>
                                       
                                        <?php foreach ($orgtypes as $k1=>$v1){?>
										  <label class="checkbox-inline">
										  <input type="checkbox" name="orgtypeid[]" value="<?php echo $v1['id'];?>" /><?php echo $v1['name'];?>
										</label>
									   <?php }?>
									
                                        <div class="form-group">
                                            <label>名称</label>
                                            <input class="form-control" name="name" placeholder="名称">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>创办于</label>
                                            <input class="form-control" name="startDate" placeholder="创办年月">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>发源地</label>
                                            <input class="form-control" name="origin" placeholder="发源地">
                                            <p class="help-block"></p>
                                        </div>
                                         <div class="form-group">
                                            <label>适合年龄</label>
                                            <input class="form-control" name="minage" placeholder="最小年龄">
                                            <input class="form-control" name="maxage" placeholder="最大年龄">
                                            <p class="help-block"></p>
                                        </div>  
                                        <div class="form-group">
                                            <label>分店数</label>
                                            <input class="form-control" name="shops" placeholder="分店数">
                                            <p class="help-block"></p>
                                        </div>    
                                        <div class="form-group">
                                        <textarea name="content" id="content" rows="10" cols="80">
							                
							            </textarea>
							            </div>
							            <script>
							                // Replace the <textarea id="editor1"> with a CKEditor
							                // instance, using default configuration.
							                CKEDITOR.replace( 'content' );
							            </script>                              
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
    <script src="<?php echo $baseUrl;?>assets/jquery/jquery.min.js"></script>

	
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
				  $("#cityid").empty();
				  jsonResp=eval("("+data+")");
			         datas = jsonResp['data'];
				  for(var i = 0; i < datas.length; i++)
				    {
					    if(i==0){
					    		$("#provinceid").append("<option value="+datas[i].id+" selected='selected'>"+datas[i].name+"</option>");
					    		fillCitys(v,data[i].id);
						}else{
							$("#provinceid").append("<option value="+datas[i].id+">"+datas[i].name+"</option>");
						}
					  
				    }
				});
		  });

		  $("#provinceid").change(function(){
				 var v = $("#countryid").children('option:selected').val();
				 var v1 = $(this).children('option:selected').val(); 
				 fillCitys(v,v1);
			  });
		  
		});
	function fillCitys(countryid,provinceid){
		$.post("/city/json",
				  {
			  		countryid : countryid,
			  		provinceid : provinceid
				  },
				  function(data,status){
			  
			  //$("#partnerflag").children('option').remove();
			  $("#cityid").empty();
			  jsonResp=eval("("+data+")");
		         datas = jsonResp['data'];
			  for(var i = 0; i < data.length; i++)
			    {
				  $("#cityid").append("<option value="+datas[i].id+">"+datas[i].name+"</option>");
			    }
			});
	}
		 
	</script>
	
</body>

</html>
