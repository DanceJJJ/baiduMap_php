<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<style type="text/css">
body, html,#baiduMap {width: 100%;height: 100%;overflow: hidden;margin:0;}
#baiduMap{width:300px;height:300px;}
</style>
<title>�ٶȵ�ͼ</title>
</head>
<body>
<div id='inputTable'>
	<input type='text' class='cityName' required placeholder='��������'>
	<input type='text' class='address' required placeholder='��ϸ��ַ'>
	<input type='button' class='btn' value='��ѯ'>
</div>
<div id="baiduMap"></div>
</body>
</html>
<script src='../common/js/jquery.js'></script>
<script type="text/javascript">
//���ذٶȵ�ͼjs
var map = null,point = null,myGeo = null,prePoint = null;
$('.btn').one('mouseover',function(){
	var script = document.createElement('script');
	script.src = 'http://api.map.baidu.com/api?v=2.0&ak=18090d256a4250c0d9157215bde88c16&callback=init';
	document.body.appendChild(script);
});
function init(){
	map = new BMap.Map("baiduMap");
	map.enableScrollWheelZoom();
	myGeo = new BMap.Geocoder();
}
$('.btn').on('click',function(){
	var cityName = $('.cityName').val();
	var address = $('.address').val();
	map.centerAndZoom(point,12);
	if(prePoint){map.removeOverlay(prePoint)};
	// ����ַ���������ʾ�ڵ�ͼ��,��������ͼ��Ұ
	myGeo.getPoint(address, function(point){
	  if (point) {
		map.centerAndZoom(point, 12);
		prePoint = new BMap.Marker(point);
		map.addOverlay(prePoint);
	  }
	}, cityName);
});
</script>
