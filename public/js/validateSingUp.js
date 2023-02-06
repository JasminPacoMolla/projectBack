"use strict";

//Referencias a los id y clases que me hacen falta.
let id = (id) => document.getElementById(id);
let classes = (classes) => document.getElementsByClassName(classes);
let name = id("name"),
  email = id("email"),
  password = id("password"),
  confirmPass = id("password_confirmation"),
  check = id("remember_me"),
  singUp = id("btn-signUp"),
  errorMsg = classes("error"),
  successIcon = classes("success-icon"),
  failureIcon = classes("failure-icon");

  singUp.addEventListener("click", validarFormulario);


//Función para validar el formulario. 
function validarFormulario() {
  let nombre = validarNombre();
   let email = validarEmail(); 
   let password = validarPassword();
   let confirmPass = confirmPassword();
   let terms = validarTerms();
   return (nombre && email && password && confirmPass && terms);
};

//Función para quitar los avisos de correcto o incorrecto en el formulario.
const resetColorBordeFormulario = () => {
  setTimeout(() => {
    //email
    email.style.border = "2px solid #c4c4c4";
    successIcon[0].style.opacity = "0";
    failureIcon[0].style.opacity = "0";
    errorMsg[0].innerHTML = "";
    //password
    password.style.border = "2px solid #c4c4c4";
    successIcon[1].style.opacity = "0";
    failureIcon[1].style.opacity = "0";
    errorMsg[1].innerHTML = "";
    //Name
    name.style.border = "2px solid #c4c4c4";
    successIcon[2].style.opacity = "0";
    failureIcon[2].style.opacity = "0";
    errorMsg[2].innerHTML = "";
    //Confirmar email
    confirmPass.style.border = "2px solid #c4c4c4";
    successIcon[3].style.opacity = "0";
    failureIcon[3].style.opacity = "0";
    errorMsg[3].innerHTML = "";
    //Check
    check.style.border = "2px solid #c4c4c4";
    successIcon[4].style.opacity = "0";
    failureIcon[4].style.opacity = "0";
    errorMsg[4].innerHTML = "";
  }, 2000);
};

//Función flecha para modificar la clase y mostrar que los datos del formulario son incorrectos
let error= (id, serial, message) => {
    errorMsg[serial].innerHTML += message;
    id.style.border = "2px solid red";
    
    //iconos
    failureIcon[serial].style.opacity = "1";
    successIcon[serial].style.opacity = "0";
};

//Función flecha para modificar la clase y mostrar que los datos del formulario son correctos.
let bien= (id, serial, message) => {
  errorMsg[serial].innerHTML += message;
    id.style.border = "2px solid green";
    //iconos
    failureIcon[serial].style.opacity = "0";
    successIcon[serial].style.opacity = "1";
};


//Función para validar el nombre, admite texto con acentos, la ñ y números pero sin espacios en blanco.
function validarNombre() {
    var patron = new RegExp("^[a-zA-ZÀ-ÿ-0-9\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ-0-9\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ-0-9\u00f1\u00d1]+$");
    if(!patron.test(name.value) || name.value.trim()===""){
      error(name, 0,"Debes poner un nombre");
    }else{
      bien(name,0, "");
    }
    return patron.test(name.value);
  };


//Función para validar email
function validarEmail() {
  var patron = new RegExp("^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$");
  if(!patron.test(email.value) || email.value.trim()===""){
    error(email, 1,"Introduce un email valido");
  }else{
    bien(email,1, "");
  }
  return patron.test(email.value);
};
//Función para validar password. Mínimo 8 caracteres, al menos una letra, un número y un carácter especial.
function validarPassword() {
 let patron = new RegExp("^(?=.[A-Za-z])(?=.\d)(?=.[@$!%#?&])[A-Za-z\d@$!%*#?&]{8,}$");
  if( password.value.trim()===""){
    error(password, 2,"Password no valido ");
  }else{
    bien(password, 2,"");
    patron = true;
  }
  return patron;
};

//Función para validar Peso debe de ser un número positivo.
function confirmPassword(){
    let patron = false;
    if( confirmPass.value.trim()==="" || confirmPass.value != password.value ){
      error(confirmPass, 3,"Password no es igual ");
    }else{
      bien(confirmPass, 3,"");
      patron = true;
    }
    return patron;
};

//Función para validar Precio debe de ser un número positivo.
function validarTerms(){
  let validar = false;
  if(!check.checked){
    error(check,4, "Debe de aceptar nuestros términos");
  }else{
    bien(check, 4,"");
    validar = true;
  }
  return validar;
};


export { resetColorBordeFormulario, validarFormulario };
