<?php $this->widget("Header");?>

<body>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           菜单管理 <a href="/sysmenu/list">返回</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/sysmenu/add" method="post">
                                    	   <input type="hidden" name="parentid" value="<?php echo $parentid;?>">
                                    	   
                                    	   <label style="color:red"><?php echo $name;?></label>
                                    	   
                                        <div class="form-group">
                                            <label>菜单名称</label>
                                            <input class="form-control" name="name" placeholder="菜单名称">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>模块(model)</label>
                                            <input class="form-control" name="model" placeholder="模块(model)" value="<?php echo $model;?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>动作(action)</label>
                                            <input class="form-control" name="action" placeholder="模块(action)">
                                        </div>  
                                        <div class="form-group">
                                            <label>是否在左边显示菜单</label>
                                            
                                            <label class="radio-inline">
                                                <input type="radio" value="1" id="optionsRadiosInline1" name="visible">是
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" checked="" value="0" id="optionsRadiosInline2" name="visible">否
                                            </label>
                                        </div>
                                         <label>菜单类型</label>
                                        <select class="js-example-basic-single" name="ctype" id="ctype">
                                        
										  <option value="0">系统菜单</option>
										  <option value="1">游戏菜单</option>
									  
									</select>                                     
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
