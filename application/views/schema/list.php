<?php $this->widget("Header");?>

<body>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           架构管理 <a href="/schema/add">add</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>名称</th>
                                            <th>所属游戏</th>
                                            <th>描述</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php foreach ($datas as $k=>$v){?>
                                    	<tr class="odd gradeX">
                                            <td><?php echo $v['id'];?></td>
                                            <td><?php echo $v['name'];?></td>
                                            <td><?php echo $v['produceid'];?></td>
                                            <td><?php echo $v['des'];?></td>
                                            <td class="center"><a href="/schema/edit?id=<?php echo $v['id'];?>">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/schema/binduser?schemaid=<?php echo $v['id'];?>">绑定用户</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        </tr>
                                    <?php }?>
                                    
                                        
                                        

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                            <?php echo $pagers;?>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                
            </div>
            <!-- /.row -->
            
            
        <!-- /#page-wrapper -->

</body>

</html>
