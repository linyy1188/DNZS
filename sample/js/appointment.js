//----init
$('#dateset').buttonset();
$('#dateset').tooltip({
 placement:'bottom'
 });

$('#num').css("line-height","15px");
$('#num').css("width","80px");
$('#num').css("height","15px");



//-----显示已预订人数

$(document).ready(function(){	
$(':radio').click(function(){
	//修改提示
	var i,s;
		 for (i=1;i<=5;i++)
	  { 
	   s="date"+i
	 if ($(this).attr('id')==s )
		 $('#num').html("已有"+i+"人预约")
		 }

	$('#num').css("visibility","visible");

})
})
$(document).ready(function() {
    $(':reset').click(function(){
			$('#num').css("visibility","hidden");
		})
})

