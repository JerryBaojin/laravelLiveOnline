<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>内江日报融媒直播</title>
<link rel="stylesheet" type="text/css" href="/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="/css/demo.css" />
<!--必要样式-->
<link rel="stylesheet" type="text/css" href="/css/component.css" />
<!--[if IE]>
	<script src="/js/.jq.min.js"></script>
<script src="/js/html5.js"></script>
<![endif]-->
</head>
<body>

		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
					<div class="logo_box">
						<h3>内江日报融媒直播</h3>
						<form action="" name="f" method="post">
							{{csrf_field()}}
							<div class="input_outer">
								<span class="u_user"></span>
								<input name="logname" required class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户">
								@if(session('errorname'))
									<p  class="error">{{session('errorname')}}</p>
								@endif
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input name="logpass" required class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
								@if(session('errorpwd'))
									<p  class="errorpwd">{{session('errorpwd')}}</p>
								@endif
							</div>
							<button class="mb2"><a class="act-but submit"  style="color: #FFFFFF">登录</a></button>
						</form>
					</div>
				</div>
			</div>

		<script src="/js/TweenLite.min.js"></script>
		<script src="/js/EasePack.min.js"></script>
		<script src="/js/rAF.js"></script>
		<script src="/js/demo-1.js"></script>
		<div style="text-align:center;">
	<style>
		.error{
			color: mistyrose;
			display: block;
			text-align: center;
			margin: 0;
		}
		.errorpwd{
			display: block;
			text-align: center;
			margin-top: 53px;
		}

	</style>
</div>
	</body>
</html>