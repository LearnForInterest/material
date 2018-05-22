<?php $this->load->view('public/head');?>
<html>
<body style="margin:10px">
<div class="panel panel-default my_width">
    <div class="panel-heading">
        <div class="panel-title">
            Material OverAll View
            <div class="my_right">
                <button type="button" class="btn btn-primary btn-sm" id="_add">add</button>
                <form id="del_form" action="<?php echo site_url('mate/del_material'); ?>" method="post" class="my_incline">
                    <button type="button" class="btn btn-primary btn-sm" id="_delete">delete</button>
                </form>
            </div>
        </div>

    </div>
    <div class="panel-body">
        <table id="myTable1" class="table table-bordered table-striped table-hover" style="margin:10px">
            <thead>
            <tr>
                <th>Select</th>
                <th>Unique_code</th>
                <th>Name</th>
                <th>Des</th>
                <th>price</th>
                <th>Number</th>
                <th>UpdateLink</th>
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
        $("#_add").click(function () {
            window.location.href = "<?php echo site_url('mate/add_material'); ?>";
        });
        $("#_delete").click(function () {
            //console.log(_delItem);
            var del_tmp = '';
            input = $("<input type='hidden'>");
            input.attr({"name":"del_str"});

            $("._delItem").each(function(){
                if($(this).prop('checked')){
                    console.log($(this).val());
                    del_tmp = del_tmp + $(this).val() + ",";
                }

            });
            input.val(del_tmp);

            if (del_tmp.length == 0)
            {
                alert("you havn't selected a single one yet.Plz select in the fisrt column!");
                return false;
            }
            $("#del_form").append(input);
            $("#del_form").submit();
        });
        $(".my_upd").click(function () {
            var td = $(this);
            //console.log(td);
            //alert("ok");
            return false;
            window.location.href = "<?php echo site_url('mate/add_material'); ?>";
        });
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
            responsive : true,
            // "retrieve": true,
            "destroy":true,
            // "bAutoWidth": true,
            // aLengthMenu:[5,10,20,50,-1],
            "aLengthMenu": [[10, 25, 50, -1], ["10", "25", "50", "All"]],
            "ajax": {
                url: "<?php echo site_url('mate/queryGet_material'); ?>",
                type : "POST",
                dataSrc : "data",
            },

            "aoColumns": [
                { "mDataProp" : "unique_code","mRender": function ( dat, type, full ) {
                        return '<input type="checkbox" name="selectedItem[]" value="'+dat+'" class="_delItem"/>';

                }},
                { "mDataProp" : "unique_code",'sClass':'center'},
                { "mDataProp" : "name"},
                { "mDataProp" : "des"},
                { "mDataProp" : "price"},
                { "mDataProp" : "num"},
                { "mDataProp" : "unique_code","mRender": function ( dat, type, full ) {
                        return '<a href="http://www.liu-gan.top/xiaoguo/material/index.php/mate/upd_material/'+dat+'" class="my_link"><button type="button" class="btn btn-primary btn-sm">update</button></a>';
                    }},
            ],
            select:true,
            buttons: [{
                'extend':'copy',
                'text': 'copy',
                'title': 'material',
                'className': 'btn'
            }]
        });
        return table;
    }

</script>