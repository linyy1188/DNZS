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