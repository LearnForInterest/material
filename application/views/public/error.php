<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/lib/bootstrap/css/bootstrap.css'); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/stylesheets/theme.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('style/lib/font-awesome/css/font-awesome.css'); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/stylesheets/style.css'); ?>">
    <script src="<?php echo base_url('style/lib/jquery-1.7.2.min.js'); ?>" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

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
  <body class="">
  <!--<![endif]-->


    <div class="row-fluid">
    <div class="http-error">

        <h1><?php echo isset($title) ? $title : 'something wrong！'; ?></h1>
        <p><i class="icon-home"></i></p>
        <p><a href="http://www.liu-gan.top/xiaoguo/material/index.php/Mate/query">GetBack</a></p>
    </div>
</div>

    <?php $this->output->enable_profiler(TRUE); ?>
  </body>
</html>

<?php exit; ?>
