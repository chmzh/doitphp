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
                                            <td><span id="menu_<?php echo $v['id'];?>" onclick="showmenu('<?php echo $v['id'];?>')" style="color: red;cursor:pointer">显示子菜单</span>
                                                <br>
                                                <span id="submenu_<?php echo $v['id'];?>"></span>
                                            </td>
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
    <script src="<?php echo $baseUrl;?>/assets/jquery/jquery-3.1.1.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>

    function showmenu(pid){
        if($("#menu_"+pid).html()=='隐藏子菜单'){
        	$("#submenu_"+pid).hide();
        	$("#menu_"+pid).html("显示子菜单");
        }else{
        	$.post("/sysmenu/ajax_showmenu",
        		    {
      		            parentid:pid,
        		    },
        		        function(data,status){
        		        if(status=='success'){
        		        	jsonResp=eval("("+data+")");
        		        	datas = jsonResp['data'];
        		        	$("#submenu_"+pid).show();
        		        	$("#submenu_"+pid).empty();
        		        	for(var i = 0; i < datas.length; i++){
        		        	    $("#submenu_"+pid).append("<span>"+datas[i].name+"</span>&nbsp;&nbsp;&nbsp&nbsp;")
            		        }
        		        	$("#menu_"+pid).html("隐藏子菜单");
            		    }
        		    });
        }
    	
    }
    </script>

</body>

</html>
