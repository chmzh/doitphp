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
                                    <form role="form" action="/schema/binduser" method="post">	
                                    <input type="hidden" name="schemaid" value="<?php echo $schema['id'];?>">
                                    <input type="hidden" name="ouserids" value="<?php echo implode($ouserids, ",");?>">
                                    <label><?php echo $schema['name'];?></label><br>
                                    								
										<label>选择用户</label>
										<?php foreach ($users as $k=>$v){?>

											<label class="checkbox-inline">
										  		<input type="checkbox" name="userid[]" value="<?php echo $v['id'];?>" <?php if(in_array($v['id'], $ouserids)){?> checked="checked" <?php }?>/><?php echo $v['uname'];?>
										</label>

										<?php }?>
											<br>                                                                      
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
