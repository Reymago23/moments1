(function(){

    var emailElement;
    var emailValue;
    var formElement;
    var isValidEmail = false;
    var isRegister = false;
    var emailRegex = new RegExp(/^[\w.%\+-]+@[\w.-]+\.[a-zA-Z]{2,}$/);
    var fbElement;
    var emailToCheck;


window.addEventListener('load', function(){


    formElement = getElement('needs-validation');

    emailElement = getElement('forgotpwEmail');

    fbElement = getElement('fb-element');

    formElement.addEventListener('submit', function(event){

        event.preventDefault();
        event.stopPropagation();


        emailValue = getValue('forgotpwEmail');


        if(!emailElement.checkValidity() && emailValue.length > 0){

            updateInputText('invalid-fb', 'Su email parece estar incompleto o es invalido.');
        }else{

            updateInputText('invalid-fb', 'Por favor ingrese su correo electrónico.');
        }


        if(!isRegister && isValidEmail){

            if(fbElement.classList.contains('d-none')){

                fbElement.classList.remove('d-none');
                fbElement.classList.add('d-block');
            }
        }else if(isRegister){

            //TODO: redirect to the correct page email sent successfully.
            location = '../pages/resetPwEmailSent.php';
        }



        if(!formElement.checkValidity()){

            formElement.classList.add('was-validated');
        }

    }); // SUBMIT FORM EVENT ENDS


    function performXhttpRequest(dataToSend){

        var request = new XMLHttpRequest();

        request.onreadystatechange = function(){

            if(this.readyState == 4 && this.status == 200){

                switch(this.responseText){

                    case "it's registered":

                        console.log('send email to change password');

                        isRegister = true;
                        break;

                    case "it's not registered":

                        isRegister = false;
                        break;
                    default:
                        fbElement.innerHTML = this.responseText;
                }
            }

        }

        request.open('POST', '../procesosPHP/forgotpwProcess.php', true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send(dataToSend);

    }


    emailElement.addEventListener('input', function(){

        emailValue = getValue('forgotpwEmail').trim();

        isValidEmail = emailRegex.test(emailValue);

        if(isValidEmail){

            emailToCheck = 'emailEntered=' + emailValue;
            performXhttpRequest(emailToCheck);
        }else{

            if(emailValue.length > 0){

                updateInputText('invalid-fb', 'Su email parece estar incompleto o es invalido.');
            }else{
                updateInputText('invalid-fb', 'Por favor ingrese su correo electrónico.');
            }

            if(fbElement.classList.contains('d-block')){

                fbElement.classList.remove('d-block');
                fbElement.classList.add('d-none');
            }
        }

    });



}); // LOAD EVENT ENDS



    /* HELPER FUNCTIONS */

function getElement(elementId){

    return document.getElementById(elementId);
}

function updateInputText(elementId, newText){

    document.getElementById(elementId).innerHTML = newText;
}

function getValue(elementId){

    return document.getElementById(elementId).value;
}

})();
