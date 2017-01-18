<?php $this->widget("Header")?>
<body>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           游戏管理 <a href="/tea/list">返回</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/tea/add" method="post">
                                        <label>类别</label>
                                        <select class="js-example-basic-single" name="categoryid" id="categoryid">
                                        <?php foreach ($categorys as $k=>$v){?>
										  <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
									    <?php }?>
									</select>
                                       
                                        <div class="form-group">
                                            <label>名称</label>
                                            <input class="form-control" placeholder="名称" id="name" name="name" value="">
                                            <span id="gamename_clew"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>价钱</label>
                                            <input class="form-control" id="price" name="price" value="10">
                                            <span id="gamename_clew"></span>
                                        </div>
                                       <input type="text" name="imgsrc" id="imgsrc"><span onclick="reupload()" style="cursor:pointer">重新上传</span>
									<div class="form-group" id="uploadframe">
										<iframe src="/upload/index" frameborder="0" height="35px" scrolling="no" width="100%"></iframe>
									</div>
									<div class="form-group">
                                            <label>描述</label>
                                            <input class="form-control" id="des" name="des" placeholder="描述">
                                            <span id="gamename_clew"></span>
                                        </div>
                                        <div class="form-group">
                                        <button class="btn btn-success" id="pbtn" type="submit">提交</button>
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
	    $("#uploadframe").html("<iframe src='/upload/index' frameborder='0' height='30px' scrolling='no'></iframe>");
	}
	</script>

</body>

</html>
