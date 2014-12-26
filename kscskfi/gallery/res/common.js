var PhotoBox = {};
			
PhotoBox.keyboardShortcut = function(destination) {
	if(typeof _jaWidgetFocus != 'undefined' && _jaWidgetFocus) {
		return true;
	}
	window.location.replace(destination);
}
