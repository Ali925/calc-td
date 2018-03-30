$( document ).ready(function() {
	$(".checkbox>label").click(function(){
		console.log('aaa');
		$(".input-select[name='decors[]'] option").each(function(){
			$(this).click();
		});
	});
});