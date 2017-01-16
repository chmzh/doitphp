<?php $this->widget("Header");?>

<body>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           资源管理 <a href="/sysmenu/add">add</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>菜单名称</th>
                                            <th>模块(model)</th>
                                            <th>动作(action)</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php foreach ($datas as $k=>$v){?>
                                    	<tr class="odd gradeX">
                                            <td><?php echo $v['id'];?></td>
                                            <td><?php echo $v['name'];?></td>
                                            <td><?php echo $v['model'];?></td>
                                            <td><?php echo $v['action'];?></td>
                                            <td class="center"><a href="/sysmenu/edit?id=<?php echo $v['id'];?>">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/sysmenu/add?id=<?php echo $v['id'];?>">添加子菜单</a></td>
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



    <!-- jQuery -->
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="assets/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
