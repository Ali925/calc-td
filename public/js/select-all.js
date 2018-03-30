$( document ).ready(function() {
	$(".checkbox>label").click(function(){
		var self = $(this);
		if(self.find("input").is(':checked')){
			console.log('aaa');
			$(".input-select[name='decors[]']").next().find("li.select2-selection__choice").remove();
			$(".input-select[name='decors[]'] option").prop('selected', true);
			$(".input-select[name='decors[]'] option").each(function(){
				var text = "<li class='select2-selection__choice' title='"+self.text()+"'>" +
							"<span class='select2-selection__choice__remove' role='presentation'>x</span>"+
							self.text() + "</li>";
				$(".input-select[name='decors[]']").next().find("ul").prepend(text);
			});
		} else {
			$(".input-select[name='decors[]'] option").prop('selected', false);
			$(".input-select[name='decors[]']").next().find("li.select2-selection__choice").remove();
		}
	});
});