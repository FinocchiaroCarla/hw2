
document.querySelector('#pencil_email').addEventListener('click',changeEmail);
document.querySelector('#pencil_username').addEventListener('click',changeUsername);
document.querySelector('#new_email img').addEventListener('click',closeEmail);
document.querySelector('#new_username img').addEventListener('click',closeUsername);

const form_mail = document.querySelector('#new_email');
const form_username = document.querySelector('#new_username');

function changeEmail(){
    form_mail.classList.remove('hidden');
}

function changeUsername(){
    form_username.classList.remove('hidden');
}

function closeEmail(){
    form_mail.classList.add('hidden');
}

function closeUsername(){
    form_username.classList.add('hidden');
}

//validazione lato client
document.querySelector("#new_username input[type='text']").addEventListener('blur',checkNewUser);
document.querySelector("#new_email input[type='text']").addEventListener('blur',checkNewEmail);

function checkNewEmail(event){
    const Emailinput =event.currentTarget;
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(Emailinput.value).toLowerCase())){
        document.querySelector('#new_email span').textContent = "Email non valida";
        event.preventDefault();
    }else{
        fetch(BASE_URL + "check_email/" + encodeURIComponent(String(Emailinput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}

const formStatus = {};

function checkNewUser(event){
    const Userinput=event.currentTarget;
    if(!/^[a-zA-Z0-9_]{1,15}$/.test(Userinput.value)){
        document.querySelector('#new_username span').textContent = "Username non valido";
        event.preventDefault();
    }else{
        fetch(BASE_URL + "check_username/" + encodeURIComponent(String(Userinput.value).toLowerCase())).then(fetchResponse).then(jsonCheckUsername);
    }
}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function jsonCheckEmail(json) {
    if (formStatus.email = !json.exists) {
        document.querySelector('#new_email span').textContent = "";
        formStatus.email = true;
    } else {
        document.querySelector('#new_email span').textContent = "Email già utilizzata";
        formStatus.email = false;
    }

}


function jsonCheckUsername(json) {
    if (formStatus.user = !json.exists) {
        document.querySelector('#new_username span').textContent = "";
        formStatus.user = true;
    }else {
        document.querySelector('#new_username span').textContent = "Username già utilizzato";
        formStatus.user = false;
    } 
}

