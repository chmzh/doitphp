<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Responsive Nav &middot; Advanced Left Navigation Demo</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!--[if lte IE 8]><link rel="stylesheet" href="/assets/response-nav/dist/styles/responsive-nav.css"><![endif]-->
    <!--[if gt IE 8]><!--><link rel="stylesheet" href="/assets/css/stylesleft.css"><!--<![endif]-->
    <script src="/assets/response-nav/dist/responsive-nav.js"></script>
  </head>
  <body>

    <div role="navigation" id="foo" class="nav-collapse">
      <ul>
        <li class="active"><a href="http://www.baidu.com" target="mainFrame">Home</a></li>
        <li><a href="http://www.qq.com" target="mainFrame">About</a></li>
        <li><a href="http://www.sina.com" target="mainFrame">Projects</a></li>
        <li><a href="#" target="mainFrame">Blog</a></li>
      </ul>
    </div>

    <div role="main" class="main">
      <a href="#nav" class="nav-toggle">Menu</a>
      
    </div>
<iframe id="mainFrame" name="mainFrame" src="http://www.baidu.com" width="100%"
				height="100%" frameborder="0"></iframe>
    <script>
      var navigation = responsiveNav("foo", {customToggle: ".nav-toggle"});
    </script>
  </body>
</html>
