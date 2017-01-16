<?php $this->widget("Header");?>

<body>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           用户管理 <a href="/user/add">add</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>用户账号</th>
                                            <th>是否在用</th>
                                            <th>拥有架构</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($datas as $k=>$v){?>
                                    	<tr class="odd gradeX">
                                            <td><?php echo $v['id'];?></td>
                                            <td><?php echo $v['uname'];?></td>
                                            <td><?php if($v['enabled']==1){?> 是 <?php }else{?> 否 <?php }?></td>
                                           	<td>1</td>
                                            <td class="center"><a href="/user/edit?id=<?php echo $v['id'];?>">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/user/power?userid=<?php echo $v['id'];?>&produceid=0">权限管理</a></td>
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
    <script src="<?php echo $baseUrl;?>/assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $baseUrl;?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $baseUrl;?>/assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $baseUrl;?>/assets/dist/js/sb-admin-2.js"></script>

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
