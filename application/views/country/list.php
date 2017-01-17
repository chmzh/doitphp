<?php $this->widget("Header") ?>

<body>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           管理 <a href="/country/add">add</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>名称</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php foreach ($datas as $k=>$v){?>
                                    	<tr class="odd gradeX">
                                            <td><?php echo $v['id']?></td>
                                            <td><?php echo $v['name']?></td>
                                            <td class="center"><a href="/country/edit?id=<?php echo $v['id']?>">编辑</a></td>
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
