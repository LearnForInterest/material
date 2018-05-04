<?php $this->load->view('public/head');?>
<div class="panel panel-default my_short_width">
    <div class="panel-heading">
        Upd Material
    </div>
    <div class="panel-body">
        <div class="row-fluid">
            <form id="sign_form" action="<?php echo site_url('Material/UpdMaterial'); ?>" method="post" enctype="multipart/form-data">
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="home">

                        <div class="input-group">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <lable>unique_code</lable>
                                    <input type="text" class="form-control input-group-sm" name="unique_code" id="" readonly="readonly"  value="<?php echo $upd_unCode[0]; ?>">
                                </div>
                            </div>


                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <lable>name</lable>
                                    <input type="text" class="form-control input-group-sm" name="name" id="" value="<?php echo $info[0]['name'];?>">
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <lable>des</lable>
                                    <input type="text" class="form-control input-group-sm" name="des" id="" value="<?php echo $info[0]['des'];?>">
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <lable>price</lable>
                                    <input type="text" name="price" id="" class="form-control input-group-sm" value="<?php echo $info[0]['price'];?>">
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <lable>num</lable>
                                    <input type="text" name="num" id="" class="form-control input-group-sm" value="<?php echo $info[0]['num'];?>">
                                </div>
                            </div>
                        </div>

                        <div  class="offset3 span8" style="margin-top: 10px;margin-bottom: 10px;">
                            <input type="submit" value="update" class="btn btn-primary btn-large" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>