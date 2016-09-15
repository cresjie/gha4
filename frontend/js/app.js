$(function(){
	$('[data-toggle="tooltip"]').tooltip();
	$('[auto-width]').each(function(i,el){
		$(this).data('input-size', this.size);
	}).on('keydown', function(){
		var l = this.value.length;
		var original = o = $(this).data('input-size');
			original = o ? o : 20;
			
		this.size = l ? l : original;
	});
});