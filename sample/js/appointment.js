//----init
$('#dateset').buttonset();
$('#dateset').tooltip({
 placement:'bottom'
 });

$('#num').css("line-height","15px");
$('#num').css("width","80px");
$('#num').css("height","15px");

//实现ajax请求，返回周一到周i的总预订数
var getsta = function(i){
	var xmlhttp;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
//num.php 使用i表示周i，没有周日。
  	xmlhttp.open("GET", "num.php?date="+i, true);
  	xmlhttp.send();
  	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200)
  			ret =  xmlhttp.responseText;
  	}
  	return ret;
}


//-----显示已预订人数

$(document).ready(function(){	
$(':radio').click(function(){
	//修改提示
	var i,s;
		 for (i=1;i<=5;i++)
	  { 
	   s="date"+i;
	 if ($(this).attr('id')==s )
		 $('#num').html("已有"+getsta(i)+"人预约")
		 }

	$('#num').css("visibility","visible");

})
})
$(document).ready(function() {
    $(':reset').click(function(){
			$('#num').css("visibility","hidden");
		})
})

