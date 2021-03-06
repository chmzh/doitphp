<?php $this->widget("Header") ?>

<script src="/assets/ckeditor/ckeditor.js"></script>
<body>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           管理 <a href="/activity/list">返回</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/activity/add" method="post">
                                        <div class="form-group">
                                            <label>标题</label>
                                            <input class="form-control" name="title" placeholder="标题">
                                            <p class="help-block"></p>
                                        </div>
                                        开始日期:<input size="16" type="text" value="2017-01-01" name="sdate" readonly class="form_datetime">
                                        结束日期:<input size="16" type="text" value="2017-01-01" name="edate" readonly class="form_datetime1">
                                       <div class="form-group">
                                            <label>地址</label>
                                            <input class="form-control" name="address" placeholder="地址">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>参与人</label>
                                            <input class="form-control" name="participants" placeholder="参与人">
                                            <p class="help-block"></p>
                                        </div>
									<input type="text" name="imgsrc" id="imgsrc"><span onclick="reupload()" style="cursor:pointer">重新上传</span>
									<div class="form-group" id="uploadframe">
										<iframe src="/upload/index" frameborder="0" height="35px" scrolling="no" width="100%"></iframe>
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
    <script src="<?php echo $baseUrl;?>/assets/jquery/jquery-3.1.1.min.js"></script>
    <script
		src="<?php echo $baseUrl;?>/assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script
		src="<?php echo $baseUrl;?>/assets/bower_components/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script
		src="<?php echo $baseUrl;?>/assets/bower_components/bootstrap-datepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
	<script type="text/javascript">
	function reupload(){
	    $("#uploadframe").html("<iframe src='/upload/index' frameborder='0' height='35px' scrolling='no' width='100%'></iframe>");
	}
		$('.form_datetime').datetimepicker({minView: "month",language: 'zh-CN',format: 'yyyy-mm-dd',autoclose: 1});
		$('.form_datetime1').datetimepicker({minView: "month",language: 'zh-CN',format: 'yyyy-mm-dd',autoclose: 1});
	</script>
</body>

</html>
