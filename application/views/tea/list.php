<?php $this->widget("Header")?>
<body>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            管理 <a href="/tea/add">add</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>游戏名称</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($datas as $k=>$v){?>
                                        <tr class="odd gradeX">
                                        	<td><?php echo $v['id']?></td>
                                        	<td><?php echo $v['name']?></td>
                                            <td><a href="/tea/edit?id=<?php echo $v['id']?>">编辑</a></td>
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
            
            
            
        </div>
        <!-- /#page-wrapper -->


</body>

</html>
