<?php $this->load->view('public/head');?>
<div class="panel panel-default my_short_width">
    <div class="panel-heading">
        Add Proudct
    </div>
    <div class="panel-body">
        <div class="row-fluid">
            <form id="sign_form" action="<?php echo site_url('order/addNew'); ?>" method="post" enctype="multipart/form-data">
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="home">

                        <div class="input-group">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <lable>order_id</lable>
                                    <input type="text" class="form-control input-group-sm" name="order_id" id="" readonly="readonly"  value="<?php echo $order_id; ?>">
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <lable>material id</lable>
                                    <input type="text" class="form-control input-group-sm" name="material_id">
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <lable>num</lable>
                                    <input type="text" class="form-control input-group-sm" name="num" id="">
                                </div>
                            </div>

                        </div>

                        <div  class="offset3 span8" style="margin-top: 10px;margin-bottom: 10px;">
                            <input type="submit" value="submit" class="btn btn-primary btn-large" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>