$(function () {

    // Tabs
    $('#tabs').tabs();
	
    $('.reply').click(function () {
        $('#myModal').modal({
			 backdrop:true,
  			  keyboard:true,
     		 show:true
			}
		);
		
		$('#re-con').text($('tr:eq(1)>td:eq(1)').html());
        return false;
    });

    $("[href='#tabs-1']").click();

});

$("[href='#tabs-1']").click(function () {
  htmlobj=$.ajax({
    url:"getdata.php?type=consult",
    success:function(data) {
      var newdata = null;
      for (var i = data.length - 1; i >= 0; i--) {
        newdata +='<tr><td>'+data[i].contact+'</td><td>'+data[i].des+
          '</td><td><button class="btn btn-primary reply">回复</button></td></tr>';
      };
      $('#tabs-1 table tbody').html(newdata);      
    }
  })
}
)

$("[href='#tabs-2']").click(function () {
  htmlobj=$.ajax({
    url:"getdata.php?type=appointment",
    success:function(data) {
      var newdata = null;
      for (var i = data.length - 1; i >= 0; i--) {
        newdata += '<tr><td>'+data[i].name+'</td><td>'+data[i].contact+
          '</td><td>week'+data[i].time+'</td><td>'+data[i].des+'</td><tr>';
      };
      $('#tabs-2 table tbody').html(newdata);
    }})
}
)

$("[href='#tabs-3']").click(function () {
  htmlobj=$.ajax({
    url:"getdata.php?type=message",
    success:function(data) {
      var newdata = null;
      for (var i = data.length - 1; i >= 0; i--) {
        newdata += '<tr><td>'+data[i].contact+'</td><td>'+data[i].des+'</td><tr>';
      };
      $('#tabs-3 table tbody').html(newdata);
    }})
}
)