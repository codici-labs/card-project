function openNav() {
	$('#app-sidebar').addClass('navbar-collapse');
}

function closeNav() {
   $('#app-sidebar').addClass('navbar-collapsed');
}


function sidebar(){
	var width = $(window).width();

	if(width < 760){
		closeNav();
	}else{
		openNav();
	}
}
$(document).ready(function(){
	sidebar()
});

