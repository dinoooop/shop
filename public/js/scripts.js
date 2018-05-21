$(function(){
	var csrf_token = $('meta[name="csrf-token"]').attr("content");
	
	$(".model-delete").click(function(e){
		e.preventDefault();
		
		var $this = $(this);
		var url = $this.attr("href");

		$.ajax({
			url:url,
			type:'DELETE',
			dataType : 'json',
			data: '_token=' + csrf_token,
			success: function(res) {
	    		if(res.result){
	    			$this.parents(".model-row").remove();
	    		}
			}
		});
		
	});
});