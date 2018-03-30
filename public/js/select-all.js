$( document ).ready(function() {
	$(".checkbox>label").click(function(){
		console.log('aaa');
		$(".input-select[name='decors[]'] option").prop('selected', true);
		$(".input-select[name='decors[]'] option").each(function(){
			var text = "<li class='select2-selection__choice' title='"+$(this).text()+"'>" +
						"<span class='select2-selection__choice__remove' role='presentation'>x</span>"+
						"</li>";
			$(".input-select[name='decors[]']").next().find("ul").prepend(text);
		});
	});
});