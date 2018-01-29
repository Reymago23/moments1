(function() {
  'use strict';

    /* VARIABLES DECLARATION */
    var loginForm;
    var passElement;
    var emailElement;
    var data;
    var unbleToLoginMessage;
    var invalidPassword = 'Su contraseña es muy corta, debe ser de 6 o mas caracteres.';
    var invalidEmail = 'Su correo parece estar incompleto o es invalido.';
    var reenviarCorreoElement;

    /* SCRIPT START AFTER WINDOW LOADS */
   window.addEventListener('load', function() {

    loginForm = getElement('needs-validation');
    emailElement = getElement('l_email');
    passElement = getElement('l_pass');
    unbleToLoginMessage = getElement('unable-to-login');
    reenviarCorreoElement = getElement('reenviar-correo');



    /* ------------------------------------------- */


    /* START: FORM SUBMIT EVENT */
    loginForm.addEventListener('submit', function(event) {

        /* DO NOT SUBMIT THE FORM, VALIDATION FROM SERVER IS NEEDED */
        event.preventDefault();
        event.stopPropagation();


        var l_passValue = getValue('l_pass');
        var l_emailValue = getValue('l_email').trim();

        if(l_emailValue.length > 0){

            /* Changing the value of the DIV for invalid feedback */
            updateInputText('l_email_fb', invalidEmail);

        }else{

            updateInputText('l_email_fb', 'Por favor ingrese su correo electrónico');
        }

        if(l_passValue.length > 0 && l_passValue.length < 6){

            /* Changing the value of the DIV for invalid feedback */
            updateInputText('l_pass_fb', invalidPassword);
        }else{

            updateInputText('l_pass_fb', 'Por favor ingrese su contraseña');
        }


        if(emailElement.checkValidity() && l_passValue.length > 5){

            data = 'email=' + l_emailValue + '&pass=' + l_passValue;

            performHttpRequest(data, loginFuntion, 'loginProcess.php');
        }


        if(unbleToLoginMessage.classList.contains('d-block')){

           unbleToLoginMessage.classList.remove('d-block');
           unbleToLoginMessage.classList.add('d-none');
       }


        if(reenviarCorreoElement.classList.contains('d-block')){

           reenviarCorreoElement.classList.remove('d-block');
           reenviarCorreoElement.classList.add('d-none');
       }



      loginForm.classList.add('was-validated');

    }, false);/* END: FORM SUBMIT EVENT */







       passElement.addEventListener('input', function(){



               var passEntered = getValue('l_pass');
               //console.log(passEntered);

               if(passEntered.length > 0 && passEntered.length < 6){

                   updateInputText('l_pass_fb', invalidPassword);

               }else if(passEntered === ''){

                   updateInputText('l_pass_fb', 'Por favor ingrese su contraseña');
               }

       });


        /* -------------------- HTTP REQUEST ----------------------- */

        function performHttpRequest(dataToSend, processFunction, url){

            var request = new XMLHttpRequest();

            request.onreadystatechange = function(){

                if(this.readyState == 4 && this.status == 200){

                    processFunction(this);
                }
            }

            request.open('POST', '../procesosPHP/' + url, true);
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            request.send(dataToSend);
        }


       function loginFuntion(xhttp){

           switch(xhttp.responseText){

               case 'success':
                   window.location = '../pages/home.php';
                   break;
               case 'pending':

                   //TODO: crear nuevo archivos php para reenviar el correo, actualizar la base de datos con el nuevo
                   // codigo de activacion.
                   reenviarCorreoElement.classList.remove('d-none');
                   reenviarCorreoElement.classList.add('d-block');
                   break;

               default:

                    updateInputText('unable-to-login', xhttp.responseText);

                   if(unbleToLoginMessage.classList.contains('d-none')){

                       unbleToLoginMessage.classList.remove('d-none');
                       unbleToLoginMessage.classList.add('d-block');
                   }else{

                       unbleToLoginMessage.classList.remove('d-none');
                       unbleToLoginMessage.classList.add('d-block');
                   }
           }
       }

  }, false); /* END: WINDOW LOAD EVENT */




    /* ------------------------------------------- */

    /* HELPER FUNCTIONS */

    /* gets an elements value */
    function getValue(elementId){

       return document.getElementById(elementId).value;
    }


    /* gets an element reference */
    function getElement(elementId){
        return document.getElementById(elementId);
    }

    /* updates the innerHTML (text) of an element */
    function updateInputText(elementId, newText){

        document.getElementById(elementId).innerHTML = newText;
    }

})();
