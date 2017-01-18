<?php $this->widget("Header");?>
<script src="/assets/ckeditor/ckeditor.js"></script>
<body>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           管理 <a href="/news/list">返回</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/news/add" method="post">
                                        <div class="form-group">
                                            <label>标题</label>
                                            <input class="form-control" name="title" placeholder="标题">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>是否推荐</label>
                                            
                                            <label class="radio-inline">
                                                <input type="radio"  value="1" id="optionsRadiosInline1" name="recommend">是
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" checked="checked" value="0" id="optionsRadiosInline2" name="recommend">否
                                            </label>
                                        </div>
                                       <label>大类</label>
                                        <select class="js-example-basic-single" name="bigid" id="bigid">
                                        <?php foreach ($bigs as $k=>$v){?>
										  <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
									    <?php }?>
									</select>
									<label>小类</label>
                                        <select class="js-example-basic-single" name="smallid" id="smallid">
                                        <?php foreach ($smalls as $k=>$v){?>
										  <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
									    <?php }?>
									</select>
									<input type="text" name="imgsrc" id="imgsrc"><span onclick="reupload()" style="cursor:pointer">重新上传</span>
									<div class="form-group" id="uploadframe">
										<iframe src="/upload/index" frameborder="0" height="35px" scrolling="no" width="100%"></iframe>
									</div>
									<div class="form-group">
                                            <label>导读</label>
                                            <textarea class='form-control' style='background:#f8f8f8' name='des'  placeholder='导读'></textarea>
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
    <script src="/assets/jquery/jquery.min.js"></script>
	
	<script type="text/javascript">

	function reupload(){
	    $("#uploadframe").html("<iframe src='/upload/index' frameborder='0' height='30px' scrolling='no'></iframe>");
	}
	
	$(document).ready(function(){
		  $("#bigid").change(function(){
			  var v = $(this).children('option:selected').val(); 
			  $.post("/category/json",
					  {
				  		bigid : v
					  },
					  function(data,status){
				  
				  //$("#partnerflag").children('option').remove();
				  $("#smallid").empty();
				  jsonResp=eval("("+data+")");
			      datas = jsonResp['data'];
				  for(var i = 0; i < datas.length; i++)
				    {
					  $("#smallid").append("<option value="+datas[i].id+">"+datas[i].name+"</option>");
				    }
				});
		  });
		});
	</script>
	
</body>

</html>
