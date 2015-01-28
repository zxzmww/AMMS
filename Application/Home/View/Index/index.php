{:R('Head/index','','Widget')}
{:R('Header/index','','Widget')}
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-blue panel-widget ">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left"> <em class="glyphicon glyphicon-plus glyphicon-l"></em> </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><a href="{:U('/Home/Service/Addview')}">新增记录</a></div>
                        <div class="text-muted"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-orange panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left"> <em class="glyphicon glyphicon-list glyphicon-l"></em> </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><a href="{:U('/Home/Service/Listview')}">报表查询</a></div>
                        <div class="text-muted"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-teal panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left"> <em class="glyphicon glyphicon-user glyphicon-l"></em> </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><a href="{:U('/Home/User/Listview')}">用户管理</a></div>
                        <div class="text-muted"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-red panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left"> <em class="glyphicon glyphicon-th-large glyphicon-l"></em> </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><a href="{:U('/Home/CorpRole/Listview')}">组织机构</a></div>
                        <div class="text-muted"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /container -->

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="panel panel-default"> 
                <!-- Default panel contents -->
                <div class="panel-heading">图表一</div>
                <div class="panel-body">
                    <div id="table_01" style="min-width: 310px; height: 360px; margin: 0 auto"></div>
                </div>
            </div>
            <!--图表一--> 

        </div>
        <div class="col-xs-12 col-md-6">
            <div class="panel panel-default"> 
                <!-- Default panel contents -->
                <div class="panel-heading">图表二</div>
                <div class="panel-body">
                    <div id="table_02" style="min-width: 310px; height: 360px; margin: 0 auto"></div>
                </div>
            </div>
            <!--图表二--> 

        </div>
    </div>
</div>
{:R('Footer/copyright','','Widget')} <include file="Public/foot"/> 
<script src="__PUBLIC__/Highcharts/js/highcharts.js"></script> 
<script type="text/javascript">
$(function() {

	$('#table_02').highcharts({
		chart: {
			type: 'line'
		},
		title: {
			text: '曲线'
		},
		subtitle: {
			text: '当月数据'
		},
		xAxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']
		},
		yAxis: {
			title: {
				text: '销量'
			}
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series: [{
				name: '北京',
				data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5]
			}, {
				name: '上海',
				data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2]
			}]
	});





	$('#table_01').highcharts({
		chart: {
			type: 'column'
		},
		title: {
			text: '柱图'
		},
		subtitle: {
			text: '当月数据'
		},
		xAxis: {
			categories: [
				'Jan',
				'Feb',
				'Mar',
				'Apr',
				'May',
				'Jun'

			]
		},
		yAxis: {
			min: 0,
			title: {
				text: '金额'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
				name: '北京',
				data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0]

			}, {
				name: '上海',
				data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5]

			}]
	});
});
</script>