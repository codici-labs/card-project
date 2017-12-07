function url(path){
	return baseUrl + path;
}

$(document).ready(function(){
	// Init dropdown
	$('.dropdown').dropdown();

	// Select and disable if only one option in dropdown
	$('.dropdown.selection').each(function(){
		var selectOptions = $(this).find('.menu .item');
		if(selectOptions.length == 1) {
			$(this).dropdown('set selected', selectOptions.data('value')).addClass("disabled");
		} else {
			selectOptions.each( $.proxy(function(index, value){
				if($(value).attr('selected') == 'selected')
					$(this).dropdown('set selected', $(selectOptions[index]).data('value'));
			}, this));
		}
	});


});


var snackbar = (function(){
	function add(msg, type){
		type = typeof type === 'number' ? (type ? 'success' : 'error') : type;
		
		var $container = $('#snackbar-container>div');
		var el = document.createElement('div');
		
		el.classList.add('snack');
		if(typeof type !== 'undefined') el.classList.add(type);

		el.innerHTML = msg;
		$container.prepend(el);
		setTimeout(function(){ $(el).slideUp('slow',function() {
		    $(this).remove();
		}); }, 5000);
	}

	return {
		add: add,
		error: function(msg){ add(msg, 'error') },
		success: function(msg){ add(msg, 'success') }
	}
})();