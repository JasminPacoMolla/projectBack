"use strict";

//Referencias a los id y clases que me hacen falta.
let id = (id) => document.getElementById(id);
let classes = (classes) => document.getElementsByClassName(classes);
let email = id("email"),
  password = id("password"),
  login = id("btn-login"),
  errorMsg = classes("error"),
  successIcon = classes("success-icon"),
  failureIcon = classes("failure-icon");

  login.addEventListener("click", validarFormulario);

//Función para validar el formulario. 
function validarFormulario() {
   let email = validarEmail(); 
   let password = validarPassword();
  
   return (email && password);
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
    //Peso
    peso.style.border = "2px solid #c4c4c4";
    successIcon[2].style.opacity = "0";
    failureIcon[2].style.opacity = "0";
    errorMsg[2].innerHTML = "";
    //Precio
    precio.style.border = "2px solid #c4c4c4";
    successIcon[3].style.opacity = "0";
    failureIcon[3].style.opacity = "0";
    errorMsg[3].innerHTML = "";
    //Descripción
    descripcion.style.border = "2px solid #c4c4c4";
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

//Función para validar email
function validarEmail() {
  var patron = new RegExp("^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$");
  if(!patron.test(email.value) || email.value.trim()===""){
    error(email, 0,"Introduce un email valido");
  }else{
    bien(email,0, "");
  }
  return patron.test(email.value);
};
//Función para validar password. Mínimo 8 caracteres, al menos una letra, un número y un carácter especial.
function validarPassword() {
 let patron = new RegExp("^(?=.[A-Za-z])(?=.\d)(?=.[@$!%#?&])[A-Za-z\d@$!%*#?&]{8,}$");
  if( password.value.trim()===""){
    error(password, 1,"Password no valido ");
  }else{
    bien(password, 1,"");
    patron = true;
  }
  return patron;
};

export { resetColorBordeFormulario, validarFormulario };
