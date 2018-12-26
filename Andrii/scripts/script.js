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
function ValidatePassword(){
	let pswtip = document.getElementById('pswtip');
	let regexp = /\w{6,}/
	pswtip.className = "visible";
	if (regexp.test(document.getElementById('password').value)){
		pswtip.className = "hidden";
	}
	if (document.getElementById('passwordcfm').value != null){
		MatchPassword();		
	}
}
function MatchPassword(){
	let pswcfmtip = document.getElementById('pswcfmtip');
	let passwordcfm = document.getElementById('passwordcfm');
	let password = document.getElementById('password');
	pswcfmtip.className = "visible";
	if (password.value == passwordcfm.value){
		pswcfmtip.className = "hidden";
	}
}
function ShowTip(id){
	id.className = "visible";

}
function HideTip(id){
	id.className = "hidden";
}