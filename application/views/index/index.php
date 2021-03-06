<?php $this->widget('header');?>
<style>
#games a{
	color:white;
	margin-left:6px;
	cursor:pointer;
}
</style>
<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation"
			style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand">动网BI游戏配置系统 v1.0</a> 
				 
				<a id="allgames" class="navbar-brand">所有游戏</a>
				<div style="display:none;opacity:0.8;z-index:999;width:300px;height:200px;left:200px;top:45px;position:absolute;background-color:black" id="games">
					#foreach($game in $userPowers)
					<a >${game.getGamename()}</a>
					#end
				</div>
				 
			</div>
			<!-- 
			<div>
				
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">iOS</a></li>
					<li><a href="#">SVN</a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown"> Java <b class="caret"></b>
					</a>
						<ul class="dropdown-menu">
							<li><a href="#">jmeter</a></li>
							<li><a href="#">EJB</a></li>
							<li><a href="#">Jasper Report</a></li>
							<li class="divider"></li>
							<li><a href="#">分离的链接</a></li>
							<li class="divider"></li>
							<li><a href="#">另一个分离的链接</a></li>
						</ul></li>
				</ul>
			</div>
			-->
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">
				<!-- /.dropdown -->
				<li class="dropdown"><a class="dropdown-toggle"
					data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i>${adminUser}
						<i class="fa fa-caret-down"></i>
				</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="#"><i class="fa fa-user fa-fw"></i> User
								Profile</a></li>
						<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
						</li>
						<li class="divider"></li>
						<li><a href="${home}admin/logout"><i
								class="fa fa-sign-out fa-fw"></i> Logout</a></li>
					</ul> <!-- /.dropdown-user --></li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li class="sidebar-search">
							<div class="input-group custom-search-form">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">
										<i class="fa fa-search"></i>
									</button>
								</span>
							</div> <!-- /input-group -->
						</li> <?php foreach ($parentMenus as $pk=>$pv){?>
						<?php if ($pv['visible']==1){?>
						<li><a href="javascript:;"><i
								class="fa fa-bar-chart-o fa-fw"></i> <?php echo $pv['name'];?><span
								class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<?php foreach ($menus as $sk=>$sv){?>
								<?php if ($pv['id']==$sv['parentid']){?>
								<?php if ($sv['visible']==1){?>
								<li><a
									href="/<?php echo $pv['model']?>/<?php echo $sv['action']?>"
									target="mainFrame"><?php echo $sv['name'];?></a></li> <?php }}}?>
							</ul> <!-- /.nav-second-level --></li> <?php }}?>


						<!-- 
                        <li>
                            <a href="${home}gamelist" target="mainFrame"><i class="fa fa-table fa-fw"></i> 游戏配置</a>
                        </li>
                         <li>
                            <a href="${home}loglist" target="mainFrame"><i class="fa fa-table fa-fw"></i> 日志配置</a>
                        </li>
                        <li>
                            <a href="${home}resource/list" target="mainFrame"><i class="fa fa-edit fa-fw"></i> 资源管理</a>
                        </li>
                        <li>
                            <a href="${home}group/list" target="mainFrame"><i class="fa fa-edit fa-fw"></i> 组管理</a>
                        </li>
                        <li>
                            <a href="${home}user/list" target="mainFrame"><i class="fa fa-edit fa-fw"></i> 用户管理</a>
                        </li>
                        
                        <li>
                            <a href="javascript:;"><i class="fa fa-bar-chart-o fa-fw"></i> 下拉示例<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="${home}user/menus" target="mainFrame">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html" target="mainFrame">Morris.js Charts</a>
                                </li>
                            </ul>
                        </li>
                        -->
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>

		<div id="page-wrapper" style="padding: 5px; margin: 0;">
			<iframe id="mainFrame" name="mainFrame" src="" width="100%"
				height="100%" frameborder="0"></iframe>
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- jQuery -->
	<script src="<?php echo $baseUrl;?>/assets/jquery/jquery-3.1.1.min.js"></script>


	<!-- Bootstrap Core JavaScript -->
	<script
		src="<?php echo $baseUrl;?>/assets/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="<?php echo $baseUrl;?>/assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

	<!-- Morris Charts JavaScript -->
	<script src="<?php echo $baseUrl;?>/assets/bower_components/raphael/raphael-min.js"></script>
	<script src="<?php echo $baseUrl;?>/assets/bower_components/morrisjs/morris.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="<?php echo $baseUrl;?>/assets/dist/js/sb-admin-2.js"></script>
	<script type="text/javascript">

	function size1(){
		$('#page-wrapper').css("margin-left",
				$('.sidebar-nav').width() );
		$('#page-wrapper').css(
				"width",
				($(window).width()
						- $('.sidebar-nav').width() - 3)
						);
		$('#page-wrapper')
				.css(
						"height",
						($(window).height() - $('.navbar')
								.height())
								);
	}
	
		$(document)
				.ready(
						function() {
							
							size1();
							$("#allgames").hover(function() {
								$("#games").show();
							}, function() {
								$("#games").hide();
							});
							
							$("#games").hover(function() {
								$(this).show();
							}, function() {
								$(this).hide();
							});
							  
							
						});

		$(window).on("resize",function(){
			size1();
			console.log($('#page-wrapper').css("height"));
		});
		//console.log($('#page-wrapper').css("height"));
	</script>

</body>

</html>
