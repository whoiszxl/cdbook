$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});

$(".article-audit").click(function(event){
	target = $(event.target);
	var article_id = target.attr("article-id");
	var status = target.attr("article-action-status");

	$.ajax({

		url		: "/admin/article/status/" + article_id,
		method	: "POST",
		data 	: {"status": status},
		dataType: "json",
		success : function(data){
			if(data.error != 0){
				alert(data.msg);
				return;
			}
			target.parent().parent().remove();
		}
	});
});