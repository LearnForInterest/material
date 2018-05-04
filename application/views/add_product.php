<?php $this->load->view('public/head');?>
<div class="panel panel-default my_short_width">
    <div class="panel-heading">
        Add Proudct
    </div>
    <div class="panel-body">
        <div class="row-fluid">
            <form id="sign_form" action="<?php echo site_url('product/addNew'); ?>" method="post" enctype="multipart/form-data">
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="home">

                        <div class="input-group">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <lable>product_id</lable>
                                    <input type="text" class="form-control input-group-sm" name="product_id" id="" readonly="readonly"  value="<?php echo $product_id['new_pid']; ?>">
                                </div>
                            </div>


                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <lable>customer</lable>
                                    <input type="text" class="form-control input-group-sm" name="customer" id="">
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <lable>des</lable>
                                    <input type="text" class="form-control input-group-sm" name="des" id="">
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <lable>material</lable>
                                    <?php foreach ($mate_name as $value): ?>
                                        <div><input type="checkbox" name="material[]" id="" class="" value="<?php echo $value['unique_code'] ?>" ><?php echo "    ".$value['name']."--".$value['des']; ?></div>
                                    <?php endforeach; ?>

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