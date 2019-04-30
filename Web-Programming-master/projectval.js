document.getElementById("textForm").onsubmit = validate;
  function validate ()
  {
    var elt = document.getElementById("textForm");
    var name = elt.userName.value;
    var ul = elt.userName.value.length;
    var firstChar = name[0]

    var mail = elt.eMail.value
    var ml = mail.length
    var pass = elt.pswd.value;
    var pl = pass.length;

    var rpass = elt.repeat.value;
    var rl = rpass.length;


    if ( ul < 6 || ul > 10 || !isNaN(firstChar))
    {
      window.alert ("Invalid Input");
      return false;
    } else if (name.search(/[^A-Za-z0-9]+/) != -1) {
      window.alert ("Invalid Username");
      return false;
    }else if( mail.search(/[A-Za-z0-9]{1,}@{1}[A-Za-z]{1,}\./) == -1) {
      window.alert("Invalid Email!");
    }else if (!(pass === rpass)){
      window.alert ("PAsswords don't match!");
      return false;
    } else if( pl < 6 || pl > 10 ) {
        window.alert ("Invalid password");
        return false;
    } else if (pass.search(/[^A-Za-z0-9]+/) != -1){
      window.alert ("Invalid password");
      return false;
    }else if (pass.search(/[A-Z]/) == -1 || pass.search(/[a-z]/) == -1  || pass.search(/[0-9]/) == -1  ){
      window.alert ("Invalid password");
      return false;
    }else{
      return true;
    }
  }
