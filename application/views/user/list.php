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
                                    
                                    #foreach($user in $users)
                                    	<tr class="odd gradeX">
                                            <td>$user.getId()</td>
                                            <td>$user.getUname()</td>
                                            <td>#if($user.isEnabled()==true) 是 #else 否 #end</td>
                                           	<td></td>
                                            <td class="center"><a href="/user/edit?id=$user.getId()">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/user/power?userid=$user.getId()&produceid=0">权限管理</a></td>
                                        </tr>
                                    #end
                                    
                                        
                                        

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                            <div class="row"><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"><ul class="pagination">${pages}</ul></div></div></div>
                            
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
