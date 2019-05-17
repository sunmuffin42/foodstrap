var xhr;
if (window.ActiveXObject){
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
else if (window.XMLHttpRequest){
    xhr = new XMLHttpRequest();
}

function callServer(){

    var user = document.getElementById("userName").value;
    var email = document.getElementById("eMail").value;
    var url = "https://spring-2019.cs.utexas.edu/cs329e-mitra/sunnya/foodstrap/Web-Programming-master/check.php?user=" +escape(user) + "&email=" + escape(email); 
    var params = "user=user&email=email";   
    xhr.open("GET", url, true);  
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = updatePage;
    xhr.send(params); 
}

function updatePage(){
    if ((xhr.readyState == 4) && (xhr.status == 200)){
        var response = xhr.responseText;
        if (response != ""){
        	window.alert(repsonse);
		document.getElementById("submit").disabled = true;
        }
    }
}


function validatep ()
  {
    var pass =  document.getElementById("pswd").value;
    var pl = pass.length;

    if (pl > 0) {
    if( pl < 6 || pl > 10 ) {
	    document.getElementById("after").innerHTML = "";
        window.alert ("Password must be between 6 and 10 characters (inclusive)");
        document.getElementById("submit").disabled = true;
        return false;
     } else if (pass.search(/[^A-Za-z0-9]+/) != -1){
       document.getElementById("after").innerHTML = "";
	     window.alert ("Invalid password");
       document.getElementById("submit").disabled = true;
       return false;
    }else if (pass.search(/[A-Z]/) == -1 || pass.search(/[a-z]/) == -1  || pass.search(/[0-9]/) == -1  ){
      document.getElementById("after").innerHTML += "";
      document.getElementById("submit").disabled = true;
      window.alert ("Invalid password");
      return false;
    }else{
      document.getElementById("after").innerHTML += "";
	return true;
    }
  }
  else {
    document.getElementById("submit").disabled = true;
	  return false;
  }
  }
function validateu() {
  let user = document.getElementById("userName").value;
  if (user.length > 0) {
	if (user.search(/[A-Za-z0-9]{6,10}/) == 0) {
		return true;
	}
	else {
    window.alert ("Invalid Username");
    document.getElementById("submit").disabled = true;
		return false;
  }
}
else {
	document.getElementById("submit").disabled = true;
	return false;
}
}
function validatee() {
  let email = document.getElementById("eMail").value;
  if (email.length > 0) {
	if(email.search(/[A-Za-z0-9]{1,}@{1}[A-Za-z]{1,}\./) == -1) {
  window.alert("Invalid Email!");
  document.getElementById("submit").disabled = true;
  return false;
	}
	else {
		return true;
	}
}
else {
	document.getElementById("submit").disabled = true;
	return false;
}
}

function validater() {
	pass = document.getElementById("pswd").value;
	rpass = document.getElementById("repeat").value;
	if (!(pass === rpass)){
		document.getElementById("after").innerHTML = "Passwords don't match!";
		document.getElementById("submit").disabled = true;
		return false;
	}
	else {
		return true;
	}
}

function bigVal() {
if (validateu() && validatee() && validatep() && validater()) {
          document.getElementById("submit").disabled = false;
        }
}
