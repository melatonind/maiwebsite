var tongueHeight = 0;

$(window).scroll(function() {

	if (tongueHeight < 65) {
		tongueHeight ++ ;
		tongueHeight = tongueHeight + 2 ;
	}
	
	extendTongue(tongueHeight);
});

function extendTongue (tongueHeight){
	$('head').append('<style>#circle:before, #circle:after {height: '+ tongueHeight +'px; top: -' + tongueHeight + 'px;}</style>');
}

function resetTongue() {
	tongueHeight = 0;
	extendTongue(tongueHeight);
	console.log("hi");
}