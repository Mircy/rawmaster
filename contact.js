function getValue(id) {
    var inputValue = document.getElementById(id).value;
    return inputValue;
}

function displayString(id, string) {
    document.getElementById(id).innerHTML = string;
}

var regName = /^[a-zA-Z][a-zA-Z ]*$/;
var regPhone = /^(?:\+\d{1,3}|0\d{1,3}|00\d{1,2})?(?:\s?\(\d+\))?(?:[-\/\s.]|\d)+$/;
var regEmail = /^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,}$/;
var regMessage = /^\s*([^\s]\s*){5,500}$/;

function submitValidate() {	
    document.getElementById("contact").onsubmit = function() {
        var submitStatus = true;
        function validateField (id, reg, mess){
            var val = getValue(id);
            if (val == "") { 
                submitStatus = false;
                displayString(id + "_error", mess + " is required");
            }else{
				if(reg == ""){
					displayString(id + "_error", "");
				}else {
					if (reg.test(val)) {
						displayString(id + "_error", "");
					}else {
						submitStatus = false;
						displayString(id + "_error", mess + " is invalid");
					}
				}
            }
        }
        validateField("name", regName, "* Name");
        validateField("phone", regPhone, "* Phone");
        validateField("email", regEmail, "* Email");
        validateField("message", regMessage, "* Message");		
        return submitStatus;
    }
}

function blurValidate(){
	function validateField(id, reg, mess){
		var nameElem = document.getElementById(id);
		nameElem.onfocus = function(){
			displayString(id + "_error", "");
		}
		nameElem.onblur = function(){
			if(this.value == ""){
				displayString(id + "_error", mess + " is required");
			}else{
				var nameValue = nameElem.value;
				var nameTest = reg;
				if(nameTest.test(nameValue)){
					displayString(id + "_error", "");
				}else {
					displayString(id + "_error", mess + " is invalid");
				}
			}
		}
	}
	validateField("name", regName,"* Name");
	validateField("phone", regPhone, "* Phone");
	validateField("email", regEmail, "* Email");
	validateField("message", regMessage, "* Message");
}

function init() {
	blurValidate();
    submitValidate();
}

window.onload = init;