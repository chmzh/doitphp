<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>分页演示</title>
    <style type="text/css"> 
    <!-- 
    .pagination {font-family: Tahoma;overflow: hidden; padding-top: 12px; text-align: center;} 
    .pagination-tab { margin-bottom: 20px;} 
    .pagination a, .pagination .page-cur, .pagination .page-prev_g, .pagination .page-prev, .pagination .page-next, .pagination .page-next_g, .pagination .page-break, .pagination .page-skip { 
        display: inline-block;font-family: Tahoma,SimSun,Arial; height: 22px;line-height:22px; margin: 0; min-width: 16px;padding: 0 5px; text-align: center; vertical-align: top; white-space: nowrap;} 
    .pagination a, .pagination .page-prev_g, .pagination .page-prev, .pagination .page-next, .pagination .page-next_g, .pagination .page-cur, .pagination .page-break { 
        border: 1px solid #ed3d83; color:#e9357d; font-weight:bold;} 
    .pagination a:hover { border: 1px solid #ed3d83;text-decoration: none; background-color:#f95f9d; color:#fff;} 
    .pagination .page-prev_g, .pagination .page-prev, .pagination .page-next, .pagination .page-next_g { width: 36px; background-image: url(../static/img/page.gif);} 
    .pagination .page-prev { background-position: -0px -38px; padding-left: 16px;} 
    .pagination .page-prev_g { background-position:0px -59px; padding-left: 16px; color:#cbcbcb; font-weight:normal;} 
    .pagination .page-next { background-position: 0px 0px; padding-right: 16px; font-weight:normal;} 
    .pagination .page-next_g { background-position: -0px -19px; padding-right: 16px; color:#cbcbcb;} 
    .pagination .page-cur {background-color: #f95f9d; border: 1px solid #ed3d83;color: #fff;font-weight: bold;} 
    .pagination .page-break {border: medium none; background:none transparent; color:#333;} 
     
    --> 
    </style> 
</head>

<body>
<?php echo $pagers;?>
</body>
</html>