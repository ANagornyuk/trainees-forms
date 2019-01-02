function ShowLogin(){
	document.getElementById('signUpForm').className = "hidden";
	document.getElementById('loginForm').className = "visible";
	document.getElementById('signup').classList.remove("checked");
	document.getElementById('signup').classList.add("unchecked");
	document.getElementById('login').classList.remove("unchecked");
	document.getElementById('login').classList.add("checked");
}

function ShowSignUp(){
	document.getElementById('signUpForm').className = "visible";
	document.getElementById('loginForm').className = "hidden";
	document.getElementById('login').classList.remove("checked");
	document.getElementById('login').classList.add("unchecked");
	document.getElementById('signup').classList.remove("unchecked");
	document.getElementById('signup').classList.add("checked");
	
}

function ValidateName(id){
	let regexp = /^\D+$/;
	if (regexp.test(id.value) != true){
		ShowTip(nametip);
		id.style.borderColor = "red";
	}
	if (regexp.test(id.value) == true){
		HideTip(nametip);
		id.style.borderColor = "green";
	}
	if (id.value == ""){
		id.style.borderColor = "initial";
	}
} 

function ValidateEmail(id){
	let emailre = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if (id.value == ""){
		id.style.borderColor = "initial";
	}
	if (emailre.test(id.value) != true){
		//ShowTip(nametip);
		id.style.borderColor = "yellow";
	}
	if (emailre.test(id.value) == true){
		HideTip(emailtip);
		id.style.borderColor = "green";
	}
}

function OnEmailLeaveFocus (id) {
	let emailre = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if (emailre.test(id.value) != true){
		ShowTip(emailtip, "Email is not valid");
		id.style.borderColor = "red";
	}
	if (emailre.test(id.value) == true){
		HideTip(emailtip);
		id.style.borderColor = "green";
	}
	if (id.value == ""){
		id.style.borderColor = "initial";
		HideTip(emailtip);
	}

}

function ValidatePassword(id){
	let pswtip = document.getElementById('pswtip');
	let regexp = /\w{6,}/;
	let strongRegex =
	 new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})");
	pswtip.className = "visible";
	if (strongRegex.test(id.value)){
		pswtip.className = "hidden";
		id.style.borderColor = "green";
	}
	if (strongRegex.test(id.value) != true){
		id.style.borderColor = "yellow";
	}
	if (document.getElementById('passwordcfm').value != ""){
		MatchPassword();		
	}
	if (id.value == "")
		id.style.borderColor = "initial";
}
function MatchPassword(){
	let pswcfmtip = document.getElementById('pswcfmtip');
	let passwordcfm = document.getElementById('passwordcfm');
	let password = document.getElementById('password');
	let passwords_coincide;
	//pswcfmtip.className = "visible";
	if (password.value == passwordcfm.value){
		pswcfmtip.className = "hidden";
		passwordcfm.style.borderColor = "green";
	}
	if (password.value != passwordcfm.value){
		pswcfmtip.className = "visible";
		passwordcfm.style.borderColor = "red";
		passwords_coincide = false;
	}
	if (passwordcfm.value == ""){
		passwordcfm.style.borderColor = "initial";
		pswcfmtip.className = "hidden";
		passwords_coincide = false;
	}
	return passwords_coincide;
}
function ShowTip(id, text){
	id.className = "visible";
	if (text != undefined) {
		id.textContent = text;
	}

}
function HideTip(id){
	id.className = "hidden";
}