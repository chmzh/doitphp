<?php $this->widget('Header'); ?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="login" onSubmit="return checkform();">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="uname" id="uname" type="text" autofocus><span id="uname_clew"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pwd" id="pwd" type="password" value=""><span id="pwd_clew"></span>
                                </div>
                                
<!--                                 <div class="form-group"> -->
<!--                                     <input class="form-control" placeholder="验证码" name="code" id="code" type="text" value="" ><span id="code_clew"></span> -->
<!--                                     <br/> -->
                                  <!--   <img style="cursor:pointer;" id="vd_image" onClick="refresh_vdcode();" title="点击图片更新验证码" src="${home}admin/login_code">  -->
<!--                                 </div> -->
<input type="hidden" name="CSRFToken"
						value="${CSRFToken}" />
                                <!-- Change this to a button or input when using this as a form -->
                                        <div class="form-group">
                                        <button class="btn btn-success" type="submit">提交</button>
                                        </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo $baseUrl;?>/assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $baseUrl;?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $baseUrl;?>/assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $baseUrl;?>/assets/dist/js/sb-admin-2.js"></script>
    <script type="text/javascript">
	function refresh_vdcode() {
		$('#vd_image').attr('src',
				'${home}admin/login_code?time=' + Math.round(Math.random() * 10));
	}
	function checkform(){
		var uname = $("#uname").val();
		var pwd = $("#pwd").val();
// 		var code = $("#code").val();
		if(uname == ""){
			$("#uname_clew").html("<font color=red>请输入用户名</font>");
			return false;
		}else{
			$("#uname_clew").html("");
		}
		if(pwd == ""){
			$("#pwd_clew").html("<font color=red>请输入密码</font>");
			return false;
		}else{
			$("#pwd_clew").html("");
		}
// 		if(code == ""){
// 			$("#code_clew").html("<font color=red>请输入验证码</font>");
// 			return false;
// 		}else{
// 			$("#code_clew").html("");
// 		}
	}
	</script>

</body>

</html>
