<?php $this->widget("Header");?>

<body>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           用户管理 <a href="/user/list">返回</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/user/edit" method="post">
                                    	<input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                    	<input type="hidden" name="uname" value="<?php echo $data['uname'];?>">
                                        <div class="form-group">
                                            用户账号:<?php echo $data['uname'];?>
                                        </div>
                                         <div class="form-group">
                                            <label>账户旧密码</label>
                                            <input class="form-control" name="oldpwd" placeholder="账户旧密码">
                                        </div>
                                        <div class="form-group">
                                            <label>账户新密码</label>
                                            <input class="form-control" name="pwd" placeholder="账户密码（6~12位）">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>是否使用</label>
                                            
                                            <label class="radio-inline">
                                                <input type="radio"  <?php if($data['enabled']==1){?> checked="checked" <?php }?> value="1" id="optionsRadiosInline1" name="enabled">是
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" <?php if($data['enabled']==0){?> checked="checked" <?php }?> value="0" id="optionsRadiosInline2" name="enabled">否
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


</body>

</html>
