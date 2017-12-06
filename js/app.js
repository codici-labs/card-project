function url(path){
	return baseUrl + path;
}

$(document).ready(function(){
	// Init dropdown
	$('.dropdown').dropdown();


	// $('.activating.element').popup();

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

	$("#snackbar").addClass("show");
	setTimeout(function(){ $("#snackbar").removeClass("show"); }, 5000);
});

// Validate form on input/change when there are errors
// $(document).on('input change', '.form.error input', function(){
// 	$('.ui.form').form('validate form');
// });



// var extraValidation = (function(){

// 	// function paramCheck(options, fields){
// 	// 	var valid = true;
// 	// 	fields.forEach(function(value){
// 	// 		// !options.hasOwnProperty(value)
// 	// 		if( typeof options[value] === 'undefined' ) valid = false;
// 	// 	});
// 	// 	return valid;
// 	// }
// 	// ['table', 'field', 'value']
	
// 	function isUnique(type, options){
// 		// if( paramCheck(options, ) ) {
// 		return $.post(baseUrl+'dashboard/unique', {
// 			type: type,
// 			options: options
// 		});
// 		// } else return $.Deferred().resolve(null);

// 	}

// 	return {
// 		isUnique: isUnique
// 	}

// })();

