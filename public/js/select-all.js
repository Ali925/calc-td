$( document ).ready(function() {
	$(".checkbox>label").click(function(){
		var self = $(this);
		if($(this).find("input").is(':checked')){
			console.log('aaa');
			$(".input-select[name='decors[]']").next().find("li.select2-selection__choice").remove();
			$(".input-select[name='decors[]'] option").prop('selected', true);
			$($(".input-select[name='decors[]'] option").get().reverse()).each(function(){
				var text = "<li class='select2-selection__choice' title='"+$(this).text()+"'>" +
							"<span class='select2-selection__choice__remove' role='presentation'>x</span>"+
							$(this).text() + "</li>";
				$(".input-select[name='decors[]']").next().find("ul").prepend(text);
			});
			$(".select2-selection__choice__remove").click(function(){
				var text = $(this).parent().attr("title");
				$(".input-select[name='decors[]'] option").filter(function () { return $(this).html() == text; }).prop('selected', false);
				$(this).parent().remove();
				$(".checkbox>label>input").prop('checked', false);
			});
		} else {
			$(".input-select[name='decors[]'] option").prop('selected', false);
			$(".input-select[name='decors[]']").next().find("li.select2-selection__choice").remove();
		}
	});

	$(".input-select[name='decors[]']").change(function(){
		$(".checkbox>label>input").prop('checked', false);
	});
});