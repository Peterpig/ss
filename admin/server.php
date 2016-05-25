<?php
header("Content-type: text/html; charset=utf-8");
require_once '_main.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            服务器状态
            <small>Server Status</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        服务器状态
                        <button type="button" class="btn btn-sm btn-success" style="float: right;" onclick="get_data()">刷新数据</button>
                    </div>
                    <div id="is_loading" style="text-align: center; display: none;"><img src="https://vnet.link/tpl/ipac/img/loading.gif" alt="Loading..."></div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>名称</th>
                                    <th>处理器</th>
                                    <th>负载</th>
                                    <th>内存</th>
                                    <th>延迟</th>
                                    <th>网络流入</th>
                                    <th>网络流出</th>
                                </tr>
                            </thead>
                            <tbody id="list_body"></tbody>
                        </table>
                        <!-- Table -->
                    </div>
                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
require_once '_footer.php'; ?>

<script src="http://cdn.staticfile.org/jquery/3.0.0-alpha1/jquery.min.js"></script>
<script>
    var url = 'https://vnet.link/openapi/v1/vdog';
    var userid = '31823';
    var token = '9psqxb574577198fc1a';
    var postg = {
            id:userid,
            token: token,
            action: 'profile_list'
        }
    $(function(){
        get_data();
        var t = setInterval("get_data()", 60000);
    })

function get_data() {
    $("#list_body").html();
    $("#is_loading").fadeIn(300);
    $.post(url, postg, function(rsp) {
        if (rsp.status) {
            console.log('通讯完成');
            console.log(rsp.data);
            var inner_html = '';
            var i = 0;

            for (i in rsp.data) {
                inner_html += '<tr id="server' + i + '">';
                inner_html += '<td>'+ rsp.data[i].label+'</td>';   // 服务器标签
                inner_html += '<td>' + (rsp.data[i].cpu_idle !== undefined ? (100 - rsp.data[i].cpu_idle) + '%' : '无数据') + '</td>';  //处理器
                inner_html += '<td>' + (rsp.data[i].load !== undefined ? rsp.data[i].load : '无数据') + '</td>';  // 负载
                inner_html += '<td>' + (rsp.data[i].memory_pc !== undefined ? rsp.data[i].memory_pc : '无数据') + '</td>';  // 内存
                inner_html += '<td>' + (rsp.data[i].network_delay !== undefined ? rsp.data[i].network_delay + 'ms' : '无数据') + '</td>';  // 延迟
                inner_html += '<td style="text-align:center;">' + (rsp.data[i].network_in_sec !== undefined ? bytes_format(rsp.data[i].network_in_sec, true) + '/s' : '无数据') + '(' + (rsp.data[i].month_network_in > 0 ? bytes_format(rsp.data[i].month_network_in, true) : '0') + ')</td>'; // 网络流入
                inner_html += '<td style="text-align:center;">' + (rsp.data[i].network_out_sec !== undefined ? bytes_format(rsp.data[i].network_out_sec, true) + '/s' : '无数据') + '(' + (rsp.data[i].month_network_out > 0 ? bytes_format(rsp.data[i].month_network_out, true) : '0') + ')</td>'; // 网络流出
                inner_html += '</tr>';
            }
            $("#list_body").html(inner_html);
            $("#is_loading").fadeOut(300);
        }
    }, 'json');
}

 function bytes_format(val, label) { 
    if (val == 0) return '0 Byte'; 
    var s = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB']; 
    var e = Math.floor(Math.log(val) / Math.log(1024)); 
    var value = ((val / Math.pow(1024, Math.floor(e))).toFixed(2)); 
    e = (e < 0) ? (-e) : e; 
    if (label) value +=' ' + s[e]; 
    return value; 
}

</script>