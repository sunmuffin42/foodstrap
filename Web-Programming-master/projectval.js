var xhr;
if (window.ActiveXObject){
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
else if (window.XMLHttpRequest){
    xhr = new XMLHttpRequest();
}

function callServer(){

    var user = document.getElementById("userName").value;  
    if (user == null){ 
    	return;
    }  
    var url = "https://spring-2019.cs.utexas.edu/cs329e-mitra/sunnya/foodstrap/Web-Programming-master/check.php?user=" +escape(user); 
    var params = "user=user";   
    xhr.open("GET", url, true);  
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = updatePage;
    xhr.send(params); 
}

function updatePage(){
    if ((xhr.readyState == 4) && (xhr.status == 200)){
        var response = xhr.responseText;
        if (response == "x"){
          window.alert("Username already exists, please choose a unique username");
          document.getElementById("submit").disabled = true;
        }
        else if (response == "y") {
          window.alert("Email already used, please choose a unique username");
          document.getElementById("submit").disabled = true;
        }
        else if (validateu() && validatee() && validate()) {
          document.getElementById("submit").disabled = false;
        }
    }
}
function validate ()
  {
    var pass =  document.getElementById("pswd").value;
    var pl = pass.length;

    var rpass =  document.getElementById("repeat").value;
    var rl = rpass.length;

    if (pl > 0 && rl > 0) {
    if (!(pass === rpass)){
      document.getElementById("after").innerHTML = "Passwords don't match!";
      document.getElementById("submit").disabled = true;
      return false;
   // } else if( pl < 6 || pl > 10 ) {
//	    document.getElementById("after").innerHTML = "";
 //       window.alert ("Password too short");
//        document.getElementById("submit").disabled = true;
//        return false;
    // } else if (pass.search(/[^A-Za-z0-9]+/) != -1){
	  //   document.getElementById("after").innerHTML += "";
    //   window.alert ("Invalid password");
    //   document.getElementById("submit").disabled = true;
    //   return false;
    }else if (pass.search(/[A-Z]/) == -1 || pass.search(/[a-z]/) == -1  || pass.search(/[0-9]/) == -1  ){
      document.getElementById("after").innerHTML += "";
      document.getElementById("submit").disabled = true;
      window.alert ("Invalid password");
      return false;
    }else{
      document.getElementById("after").innerHTML += "";
      if (validateu() && validatee()) {
        document.getElementById("submit").disabled = false;
      }
      return true;
    }
  }
  else {
    document.getElementById("submit").disabled = true;
  }
  }
function validateu() {
  let user = document.getElementById("userName").value;
  if (user.length > 0) {
	if (user.search(/[A-Za-z0-9]{6,10}/) == 0) {
    // if (validate() && validatee()) {
    //   document.getElementById("submit").disabled = false;
    // }
		return true;
	}
	else {
    window.alert ("Invalid Username");
    document.getElementById("submit").disabled = true;
		return false;
  }
}
else {document.getElementById("submit").disabled = true;}
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
    // if (validateu() && validate()) {
    //   document.getElementById("submit").disabled = false;
    // }
		return true;
  }
}
else {document.getElementById("submit").disabled = true;}
}



