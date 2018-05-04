<?php $this->load->view('public/head');?>
<html>
<body style="margin:10px">
<div class="panel panel-default my_width">
    <div class="panel-heading">
        <div class="panel-title">
            Order OverAll View
        </div>

    </div>
    <div class="panel-body">
        <table id="myTable1" class="table table-bordered table-striped table-hover" style="margin:10px">
            <thead>
            <tr>
                <th>order id</th>
                <th>material id</th>
                <th>need num</th>
            </tr>
            </thead>

            <tbody>
            </tbody>

        </table>
    </div>
</div>

</body>
</html>

<script type="text/javascript" >
    $(document).ready(function(){
        oTable = initTable();
    })

    function initTable() {
        var table =$('#myTable1').DataTable({
            "sDom":'<"top"lBf<"clear">>rt<"bottom"ip<"clear">>',
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            // "retrieve": true,
            "destroy":true,
            // "bAutoWidth": true,
            // aLengthMenu:[5,10,20,50,-1],
            "aLengthMenu": [[10, 25, 50, -1], ["10", "25", "50", "All"]],
            "ajax": {
                url: "<?php echo site_url('order/queryGet_order'); ?>",
                type : "POST",
                dataSrc : "data",
            },

            "aoColumns": [
                { "mDataProp" : "order_id"},
                { "mDataProp" : "material_id"},
                { "mDataProp" : "need_num"},
            ],
            select:true,
            buttons: [{
                'extend':'excel',
                'text': 'excel',
                'title': 'material',
                'className': 'btn',
                'exportOptions':{
                    'format': {
                        body: function ( data, row, column, node ) {
                            if (!isNaN(data)) {
                                data = "\u200C" + data ;
                                return data;
                            }else{
                                return data;
                            }
                        }
                    }
                }
            },{
                'extend':'copy',
                'text': 'copy',
                'title': 'material',
                'className': 'btn'
            }]
        });
        return table;
    }

</script>