<?php $this->widget("Header");?>

<body>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           菜单管理 <a href="/category/list">返回</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/category/add" method="post">
                                    	   <input type="hidden" name="parentid" value="<?php echo $parentid?>">
                                    	   
                                    	   <label style="color:red"><?php echo $name?></label>
                                    	   
                                        <div class="form-group">
                                            <label>菜单名称</label>
                                            <input class="form-control" name="name" placeholder="菜单名称">
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

</body>

</html>
