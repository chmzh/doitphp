<?php $this->widget("Header");?>

<body>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           架构管理 <a href="/schema/list">返回</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/schema/edit" method="post">
                                    <input type="hidden" name="id" value="<?php echo $schema['id'];?>">
                                    <div class="form-group">
                                            <label>名称</label>
                                            <input class="form-control" name="name" placeholder="名称" value="<?php echo $schema['name'];?>">
                                            <p class="help-block"></p>
                                     </div>
                                     <div class="form-group">
                                            <label>描述</label>
                                            <input class="form-control" name="des" placeholder="描述" value="<?php echo $schema['des'];?>">
                                            <p class="help-block"></p>
                                     </div>
                                    <label>选择游戏</label>
                                        <select class="js-example-basic-single" name="produceid" id="produceid">
                                        <?php foreach ($produces as $k=>$v){?>
										  <option value="<?php echo $v['id'];?>" <?php if($v['id'] == $schema['produceid']){ ?> selected="selected" <?php }?> ><?php echo $v['name'];?></option>
									   <?php }?>
									</select><br>									
									
									<br>
									<?php foreach ($parentMenus as $pk=>$pv){?>
											<label><?php echo $pv['name'];?></label>
											
											<?php foreach ($subMenus as $sk=>$sv){?>
											
											<?php if($pv['id'] == $sv['parentid']){?>
											<label class="checkbox-inline">
										  <input type="checkbox" name="power[]" value="<?php echo $sv['id'];?>" <?php if( in_array($sv['id'], $powers) ){ ?> checked="checked" <?php }?>/><?php echo $sv['name'];?>
										</label>
										<?php }}?> 
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
</body>

</html>
