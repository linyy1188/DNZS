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

});

$('#ui-id-1').click(function () {
  htmlobj=$.ajax({
    url:"getdata.php?type=consult",
    success:function(data) {
      for (var i = data.length - 1; i >= 0; i--) {
        $('#tabs-1 table tbody').append(
          '<tr><td>'+data[i].contact+'</td><td>'+data[i].des+
          '</td><td><button class="btn btn-primary reply">回复</button></td></tr>');
      };
    }})
}
)

$('#ui-id-2').click(function () {
  htmlobj=$.ajax({
    url:"getdata.php?type=appointment",
    success:function(data) {
      for (var i = data.length - 1; i >= 0; i--) {
        $('#tabs-1 table tbody').append(
          '<tr><td>'+data[i].name+'</td><td>'+data[i].contact+
          '</td><td>week'+data[i].time+'</td><td>'+data[i].des+'</td><tr>');
      };
    }})
}
)

$('#ui-id-3').click(function () {
  htmlobj=$.ajax({
    url:"getdata.php?type=message",
    success:function(data) {
      for (var i = data.length - 1; i >= 0; i--) {
        $('#tabs-1 table tbody').append(
          '<tr><td>'+data[i].contact+'</td><td>'+data[i].des+'</td><tr>');
      };
    }})
}
)