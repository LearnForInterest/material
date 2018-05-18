<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta charset="gb2312">
    <!--<script src="<?php echo base_url('style/lib/jquery-1.7.2.min.js'); ?>" type="text/javascript"></script>-->
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/stylesheets/jquery.dataTables.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/lib/bootstrap/css/bootstrap.css'); ?>">
    <link href="<?php echo base_url('style/lib/bootstrap/css/bootstrap.min.css');  ?>" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/stylesheets/theme.css'); ?>">
    <!-- 自定义样式 -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/stylesheets/style.css'); ?>">

    <!-- 日历样式 -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/js/lhgcalendar/lhgcalendar.css'); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/button/css/buttons.dataTables.css'); ?>">

    <script src="<?php echo base_url('style/lib/bootstrap/js/bootstrap.js'); ?>"></script>
    <script src="<?php echo base_url('style/lib/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('style/lib/jquery.dataTables.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('style/lib/dataTables.bootstrap.js'); ?>" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url('style/button/js/dataTables.buttons.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('style/button/js/buttons.flash.js'); ?>" type="text/javascript"></script>
    <!-- Demo page code -->

    <style type="text/css">
        body {
            margin: 0px auto;
            margin-top: 1em;
        }
        .my_right{
            float:right;
            margin: 0px auto;
        }
        .my_width{
            width:80%;
            margin-left: auto;
            margin-right: auto;
        }
        .my_short_width{
            width:20%;
            margin-left: auto;
            margin-right: auto;
        }
        .my_incline{
            display:inline;
        }
        .my_link{
            color:#00F;
        }
    </style>
    <script type="text/javascript" >
        Array.prototype.in_array = function(e)
        {
            for(i=0;i<this.length;i++)
            {
                if(this[i] == e)
                    return true;
            }
            return false;
        }
    </script>


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="lib/html5.js"></script>
    <![endif]-->


</head>

<!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
<!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
<!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
<!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<!--<![endif]-->

    <div class="sidebar-nav">
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Menu</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">

            <li ><a href="<?php echo site_url('mate/query');  ?>">material</a></li>
            <li ><a href="<?php echo site_url('product/query');  ?>">product</a></li>
            <li ><a href="<?php echo site_url('order/query');  ?>">order</a></li>
        </ul>

    </div>
    <title>MaterialManagementSystem</title>




