function changeClass(id, newClass) {
    var change = document.getElementById(id);
    change.className = newClass;
}

function display_menu(){
        var change = document.getElementById(id);
		if(change.className = "hide_nav"){
			changeClass("mobile_nav", "show_nav");
		}else {
			changeClass("mobile_nav", "hide_nav");
		}
}


