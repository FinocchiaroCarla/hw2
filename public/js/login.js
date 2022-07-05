const formStatus = {};
document.querySelector(".username input").addEventListener('blur',checkUser);
document.querySelector(".password input").addEventListener('blur',checkPassword);
document.querySelector(".password input").addEventListener('click',checkUser);
document.forms['login'].addEventListener('submit',checkForm);


function checkForm(event){
    if(Object.keys(formStatus).length !== 2){
        document.querySelector('.submit div').textContent = "Compila tutti i campi";
        event.preventDefault();
    }else if(Object.values(formStatus).includes(false)){
        document.querySelector('.submit div').textContent = "Compila tutti i campi correttamente";
        event.preventDefault();
    }else{
        document.querySelector('.submit div').textContent = "";
    }
}

function checkUser(event){
    const Userinput=document.querySelector(".username input");
    if(Userinput.value == 0){
        document.querySelector('.username div').textContent = "Inserisci username";
        formStatus.password = false;
    }
    fetch(BASE_URL + 'check_username/' + encodeURIComponent(String(Userinput.value).toLowerCase())).then(fetchResponse).then(jsonCheckUsername);
}

function checkPassword(event){
    
    const pswinput=event.currentTarget;
    
        if(pswinput.value == 0){
            document.querySelector('.password div').textContent = "Inserisci password";
            formStatus.password = false;
        }else{
            document.querySelector('.password div').textContent = "";
            formStatus.password = true;
        }
}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function jsonCheckUsername(json) {
    if (formStatus.user = json.exists) {
        document.querySelector('.username div').textContent = "";
        formStatus.user = true;
    }else{
        document.querySelector('.username div').textContent = "Nessun username corrispondente";
        formStatus.user = false;
    } 
}
