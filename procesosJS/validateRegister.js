(function(){
    'use strict';

    /* VARIABLES DECLARATION */
    //@TODO: check what variables are not being used and delete them
    var registerForm;

    var nameElement; var rName;

    var emailElement; var rEmail; var emailValidMessage;
    var isValidEmail = false; var emailExists = false;
    var emailExistsMessage = 'Su correo ya esta registrado, y no se puede registrar nuevamente, ' +
                'para ingresar a su cuenta haga click en el boton Ya tengo cuenta! o si ha olvidado su ' +
                'contraseña <a href="../pages/forgotPassword.php">Recuperar mi contraseña</a>';

    var emailEntered;
    var emailRegex = new RegExp(/^[\w.%\+-]+@[\w.-]+\.[a-zA-Z]{2,}$/);

    var passElement; var rPass;
    var c_passElement; var rConfirmPass;

    var invalidPassMessage = 'Su contraseña es muy corta';
    var invalidEmailMessage = 'Su correo parece estar incompleto o es invalido.';
    var unableToRegElement;




    /* START: WINDOW LOAD EVENT */
    window.addEventListener('load', function(){


        /* HTML ELEMENTS */
        nameElement = getElement('r_name');
        emailElement = getElement('r_email');
        passElement = getElement('r_pass');
        c_passElement = getElement('r_c_pass');
        emailValidMessage = getElement('email-valid-message');
        registerForm = getElement('needs-validation');
        unableToRegElement = getElement('unable-to-register');


        /* ----------------- FORM SUBMITION -------------------------- */

        registerForm.addEventListener('submit', function(event){

            /* DO NOT SUBMIT THE FORM, VALIDATION FROM SERVER IS NEEDED */
            event.preventDefault();
            event.stopPropagation();


            /* ------------ GETTING INPUT VALUES ---------------- */

            rName = getValue('r_name').trim();
            rEmail = getValue('r_email').trim();
            rPass = getValue('r_pass');
            rConfirmPass = getValue('r_c_pass');



            /* ------------ NAME VALIDATION ---------------- */

            if(rName !== ''){

                updateInputText('r_name', rName);
            }else{

                updateInputText('r_name', '');
            }


            /* ------------ EMAIL VALIDATION ---------------- */

            if(rEmail.length > 0){

                 updateInputText('email_fb', invalidEmailMessage);
               }else{

                 updateInputText('email_fb', 'Por favor ingrese tu correo electrónico');
               }


            /* ------------ PASSWORD VALIDATION ---------------- */

            if(rPass.length >0 && rPass.length < 6){

                updateInputText('pass_fb', invalidPassMessage);
               }else{

                updateInputText('pass_fb', 'Por favor ingrese una contraseña');
               }


            /* ------------ CONFIRM PASSWORD VALIDATION ---------------- */

            if(rConfirmPass.length >0 && rConfirmPass.length < 6){

                updateInputText('c_pass_fb', invalidPassMessage);
               }else{

                updateInputText('c_pass_fb', 'Por favor confirme su contraseña');
               }


            /* ------------ PREPARING FOR REGISTRATION PROCESS ---------------- */

            if(rConfirmPass.length >= 6 && rPass.length >= 6){


                /* ------------ FINAL CHECK OF EVERY INPUT ---------------- */

                    if(rPass === rConfirmPass){

                        if(isValidEmail){

                            if(rName !== ''){

                                if(!emailExists){


                                    /* capturing the data from the form */
                                    var formData = 'name=' + rName + '&email=' + rEmail + '&pass=' + rPass + '&cPass=' + rConfirmPass;

                                    //TODO: send data for registration and wait for response

                                    console.log(' -- READY TO SEND REGISTRATION REQUEST -- ');
                                    console.log('passwords match, all good');
                                    console.log('Form Data: ' + formData);
                                    performHttpRequest(formData, registrationHttpFunc, 'registerProcess.php');
                                    //TODO: redirect user to home if successfull


                                }else{
                                        console.log('passwords match but cant proceed with registration, email exists');
                                    }

                            }else{

                                console.log('passwords match but cant proceed with registration, name is empty');
                            }

                        }else{

                            console.log('email is invalid, no need to check for name');
                        }

                        passElement.classList.remove('is-invalid', 'border-danger');
                        c_passElement.classList.remove('is-invalid', 'border-danger');

                    }else{

                        console.log('passwords do not match');
                        updateInputText('pass_fb', 'Las contraseñas no son iguales');
                        updateInputText('c_pass_fb', 'Las contraseñas no son iguales');

                        passElement.classList.add('is-invalid', 'border-danger');
                        c_passElement.classList.add('is-invalid', 'border-danger');
                        c_passElement.focus();

                    }
               }



            /* ---------- VALIDATION COMPLETE, ADD STYLES TO THE FORM --------------- */
                registerForm.classList.add('was-validated');

        }, false); /* END: FORM SUBMIT EVENT */




        /* ----------------- HTTP REQUEST FUNCTION -------------------------- */




        /* HTTP REQUEST: General Function */
        function performHttpRequest(dataToSend, processFunction, url){

            var request = new XMLHttpRequest();

            request.onreadystatechange = function(){

                /* IF THE RESPONSE IS RECEIVED AND NO ERRORS OCCURED */

                if(this.readyState == 4 && this.status == 200){

                    processFunction(this);

               }
//                else{
//
//
//                    switch(this.readyState){
//
//                        case 1:
//                            console.log('1: server connection established -> status = ' + this.statusText);
//                            break;
//                        case 2:
//                            console.log('2: request received -> status = ' + this.statusText);
//                            break;
//                        case 3:
//                            console.log('3: processing request -> status = ' + this.statusText);
//                            break;
//                        case 4:
//                            console.log('4: request finished and response is ready -> status = ' + this.statusText);
//                            break;
//                        default:
//                            console.log('default: connection not initialized -> status = ' + this.statusText);
//                    }
//                }
            }

            request.open('POST', '../procesosPHP/' + url, true);
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            request.send(dataToSend);
        }




        /* ------------------- EMAIL REQUEST ------------------------ */

        /* Funtion to get the response from email request */

        function emailHttpFunc(xhttp){

            if(xhttp.responseText == 'exists'){

                updateInputText('email-valid-message', emailExistsMessage);

                emailElement.classList.remove('border-success');
                emailElement.classList.add('border-danger');

                emailValidMessage.classList.remove('d-none');
                emailValidMessage.classList.add('d-block', 'text-danger');
                console.log('ERROR: Email exists, do not accept this email for registration!');

                /* ---- The email is not eligible for registration ---- */
                emailExists = true;
            }else{

                console.log(xhttp.responseText);
                updateInputText('email-valid-message', 'Estupendo! su correo es elegible para registrarse.');

                emailElement.classList.remove('border-danger');
                emailElement.classList.add('border-success');

                emailValidMessage.classList.remove('d-none', 'text-danger');
                emailValidMessage.classList.add('d-block', 'fadeInDown', 'text-success');
                emailExists = false;
            }
        }




        /* ------------------- REGISTRATION REQUEST ------------------------ */

        /*@TODO: create registration request function  */
        function registrationHttpFunc(xhttp){


            if(xhttp.responseText == 'success'){

                /* THE USER WAS SUCCESSFULLY REGISTED, NOW REDIRECT USER TO CONFIRM EMAIL PAGE */
                //console.log('Success!, user registered');
                window.location = 'registrationSuccess.php';
            }else{

                /* DISPLAY AN ERROR MESSAGE TO THE UNABLE TO REGISTER DIV (unable-to-register) */
                //console.log('ERROR!, something went wrong -> ' + xhttp.responseText);
                unableToRegElement.classList.add('d-block');
            }

        }







        /* ------------------ EMAIL INPUT EVENT LISTENER ------------------------- */

        emailElement.addEventListener('input', function(){

            emailEntered = getValue('r_email').trim();
            //console.log(emailEntered);

            if(emailRegex.test(emailEntered)){

                //console.log('email valid');
                var emailToCheck = 'emailToCheck='+ emailEntered;


                /* CHECKING IF EMAIL EXISTS ON DB  */
                performHttpRequest(emailToCheck, emailHttpFunc, 'checkEmail.php');


                isValidEmail = true;
            }else{
                //console.log('email invalid ');

                /* ------------ EMAIL VALIDATION ---------------- */

                //[x]@NOTE: Apply the registerForm.classList.contains('was-validated');
                //to be able to properly update the user feedback

                if(emailEntered.length > 0){

                    if(registerForm.classList.contains('was-validated')){

                        //console.log('was validated');
                        updateInputText('email_fb', invalidEmailMessage);
                    }

                     updateInputText('email-valid-message', invalidEmailMessage);

                    emailElement.classList.remove('border-success');
                    emailElement.classList.add('border-danger');

                    emailValidMessage.classList.remove('d-none', 'text-success');
                    emailValidMessage.classList.add('d-block', 'text-danger');

                   }else{
                       updateInputText('email_fb', 'Por favor ingrese tu correo electrónico');
                   }

                updateInputText('email-valid-message', 'Por favor ingrese tu correo electrónico');
                emailElement.classList.remove('border-success', 'border-danger');

                emailValidMessage.classList.remove('text-success', 'text-danger', 'd-block' );
                emailValidMessage.classList.add('d-none');


                isValidEmail = false;
            }
        });

    }, false); /* END: WINDOW LOAD EVENT */



    /* ------------------------------------------- */



    /* HELPER FUNCTIONS */
    /* gets an elements value */
    function getValue(elementId){

       return getElement(elementId).value;
    }

    /* gets an html element */
    function getElement(elementId){

        return document.getElementById(elementId);
    }

    /* this function updates a the innerHTML (text) of an element */
    function updateInputText(elementId, newText){

        getElement(elementId).innerHTML = newText;
    }

})();
