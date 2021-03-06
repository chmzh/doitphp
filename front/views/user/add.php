<?php $this->widget("Header");?>

<body>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           用户管理 <a href="admin/user/list">返回</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/user/add" method="post">
                                        <div class="form-group">
                                            <label>用户账号</label>
                                            <input class="form-control" name="uname" placeholder="用户账号">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>账户密码</label>
                                            <input class="form-control" name="pwd" placeholder="账户密码">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>是否使用</label>
                                            
                                            <label class="radio-inline">
                                                <input type="radio" checked="" value="1" id="optionsRadiosInline1" name="enabled">是
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" value="0" id="optionsRadiosInline2" name="enabled">否
                                            </label>
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
    <script src="<?php echo $baseUrl;?>/assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $baseUrl;?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $baseUrl;?>/assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $baseUrl;?>/assets/dist/js/sb-admin-2.js"></script>

</body>

</html>
