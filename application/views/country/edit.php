<?php $this->widget("Header")?>

<body>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           管理 <a href="/country/list">返回</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/country/edit" method="post">
                                    <input type="hidden" name="id" value="<?php echo $country['id']?>">
                                        <div class="form-group">
                                            <label>标题</label>
                                            <input class="form-control" name="name" placeholder="名称" value="<?php echo $country['name']?>">
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
