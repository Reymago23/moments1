(function(){

    var newPwForm;
    var newPass;
    var cNewPass;
    var pwNoMatchElement;
    var cPwNoMatchElement;
    var h1MessageElement;
    var pMessageElement;
    var btnEntrar;
    var btnRegresar;

    window.addEventListener('load', function(){

        newPwForm = getElement('needs-validation');
        pwNoMatchElement = getElement('pw-no-match');
        cPwNoMatchElement = getElement('cpw-no-match');
        h1MessageElement = getElement('h1-message');
        pMessageElement = getElement('p-message');
        btnEntrar = getElement('btn-entrar');
        btnRegresar = getElement('btn-regresar');

        newPwForm.addEventListener('submit', function(event){

            event.preventDefault();
            event.stopPropagation();

            cNewPass = getValue('c-new-pass');
            newPass = getValue('new-pass');

            if(newPass.length > 0 && newPass.length < 6) {

                updateInputText('pass-fb','su contraseña es muy corta');
            }

            if(cNewPass.length > 0 && cNewPass.length < 6) {

                updateInputText('c-pass-fb','su contraseña es muy corta');
            }

            if(newPass.length >= 6 && cNewPass.length >= 6){

                if(newPass == cNewPass){

                    console.log('passwords match');

                    //TODO: perform the xhttpRequest
                    var dataToSend = 'newPass=' + newPass;
                    performHttpRequest(dataToSend);

                }else{

                    if(pwNoMatchElement.classList.contains('d-none')){

                        pwNoMatchElement.classList.remove('d-none');
                        pwNoMatchElement.classList.add('d-block');
                    }

                    if(cPwNoMatchElement.classList.contains('d-none')){

                        cPwNoMatchElement.classList.remove('d-none');
                        cPwNoMatchElement.classList.add('d-block');
                    }
                }
            }else{

                if(pwNoMatchElement.classList.contains('d-block')){

                        pwNoMatchElement.classList.remove('d-block');
                        pwNoMatchElement.classList.add('d-none');
                }

                if(cPwNoMatchElement.classList.contains('d-block')){

                    cPwNoMatchElement.classList.remove('d-block');
                    cPwNoMatchElement.classList.add('d-none');
                }
            }


            if(!newPwForm.checkValidity()){

                newPwForm.classList.add('was-validated');
            }

        });//SUBMIT EVENT END



        /* ------------- HTTP REQUEST GENERAL FUNCTION ----------- */
        function performHttpRequest(dataToSend){

            var request = new XMLHttpRequest();

            request.onreadystatechange = function(){

                if(this.readyState == 4 && this.status == 200){

                    if(this.responseText == 'success'){

                        newPwForm.classList.add('d-none');
                        h1MessageElement.innerHTML = "Contraseña actualizada!";
                        pMessageElement.innerHTML = "Su contraseña fue cambiada con exito, " +
                        "ahora puede entrar a su cuenta con su nueva contraseña."

                        btnEntrar.classList.add('d-block');

                    }else{

                        h1MessageElement.classList.add('text-danger');
                        h1MessageElement.innerHTML = "Algo salio mal.";
                        pMessageElement.innerHTML = "Su contraseña no pudo ser cambiada, " +
                        "si aun necesita cambiar su contraseña, solicite un nuevo enlace de " +
                        "recuperación de contraseña.";
                        newPwForm.classList.add('d-none');
                        btnRegresar.classList.add('d-block');
                    }
                }

            }


            request.open("POST", "../procesosPHP/resetPwProcess.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(dataToSend);
        }



    });//LOAD EVENT END



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

