<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Responsive Nav &middot; Advanced Demo</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="/assets/response-nav/dist/styles/responsive-nav.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <script src="/assets/response-nav/dist/responsive-nav.js"></script>
  </head>
  <body>

    <nav class="nav-collapse">
      <ul>
        <li><a href="http://www.baidu.com">Home</a></li>
        <li><a href="http://www.qq.com">About</a></li>
        <li><a href="http://www.uwan.com">Projects</a></li>
        <li><a href="http://www.sina.com">Blog</a></li>
      </ul>
    </nav>

    <script>
      var navigation = responsiveNav(".nav-collapse", {
        animate: true,                    // Boolean: Use CSS3 transitions, true or false
        transition: 284,                  // Integer: Speed of the transition, in milliseconds
        label: "Menu",                    // String: Label for the navigation toggle
        insert: "after",                  // String: Insert the toggle before or after the navigation
        customToggle: "",                 // Selector: Specify the ID of a custom toggle
        closeOnNavClick: false,           // Boolean: Close the navigation when one of the links are clicked
        openPos: "relative",              // String: Position of the opened nav, relative or static
        navClass: "nav-collapse",         // String: Default CSS class. If changed, you need to edit the CSS too!
        navActiveClass: "js-nav-active",  // String: Class that is added to <html> element when nav is active
        jsClass: "js",                    // String: 'JS enabled' class which is added to <html> element
        init: function(){},               // Function: Init callback
        open: function(){},               // Function: Open callback
        close: function(){}               // Function: Close callback
      });
    </script>

  </body>
</html>
