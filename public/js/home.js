const form=document.querySelector('form');
form.addEventListener('submit',Search);

const container=document.querySelector('.container');


function Search(event){
    event.preventDefault();
    const recipe_input = document.querySelector(".cerca_ricette input");
    const recipe_value = encodeURIComponent(recipe_input.value);
    console.log('Eseguo ricerca: ' + recipe_value);
    //mando il contenuto dell'input alla pagina search_content.php
    fetch(BASE_URL + "search_recipe/" + recipe_value).then(searchResponse).then(searchJson);
}

function searchResponse(response){
    console.log(response);
    return response.json();
}

function searchJson(json){
    console.log(json);
    showResults(json);
}

function showResults(json){
    container.innerHTML = '';
    const results = json.hits;
    let num_results = results.length;

    if(num_results > 12)
    num_results = 12;

    for(let i=0; i<num_results; i++){
        const recipe_data = results[i]
    
        const name = recipe_data.recipe.label;
        const image = recipe_data.recipe.images.REGULAR.url;
        const cuisine = recipe_data.recipe.cuisineType[0];

        const content = document.createElement('div');
        content.classList.add('content');

        var currentUrl = recipe_data.recipe.uri;
  
        var id = currentUrl.substring(51);
        content.dataset.id = id;

        const bottom = document.createElement('div');
        bottom.classList.add('bottom');

        const text = document.createElement('div');
        text.classList.add('text');

        const title = document.createElement('div');
        text.classList.add('title');
        text.textContent = name;

        const type = document.createElement('div');
        type.classList.add('type');
        type.textContent = "Tipo di cucina: " + cuisine;

        const more = document.createElement('div');
        more.classList.add('more');

        text.appendChild(title);
        text.appendChild(type);

        bottom.appendChild(text);
        bottom.appendChild(more);

        const img_rec = document.createElement('img');
        img_rec.classList.add('img_rec');
        img_rec.src = image;

        content.appendChild(img_rec);
        content.appendChild(bottom);

        container.appendChild(content);

        content.addEventListener('click', Select);
    }
}

var id='';

function Select(event){
    id = event.currentTarget.dataset.id;
    fetch(BASE_URL + "select/" + id).then(selectResponse).then(selectJson); 
}

function selectResponse(response){
    console.log(response);
    return response.json();
}

function selectJson(json){
    console.log(json);
    showSelect(json);
}

function showSelect(json){
    const modal = document.querySelector('#modal');
    modal.classList.remove('hidden');
    document.body.classList.add('no-scroll');
    
    butt.classList.remove('hidden');
    success.classList.add('hidden');

    const title = json.recipe.label;
    const ingredients = json.recipe.ingredients;
    let num = ingredients.length;
    console.log(num);

    if(num>10){
        num=10;
    }

    const tit = document.createElement('h1');
    tit.textContent = title;

    const body_div = document.createElement('div');
    body_div.classList.add('body_div');

    const body = document.querySelector('.body');
    body.appendChild(tit);
    body.appendChild(body_div);

    for(let j=0; j<num; j++){
        const item = document.createElement('div');
        item.classList.add("item");
        const img = document.createElement('img');
        img.classList.add('spoon');
        img.src = ingredients[j].image
        const ing = document.createElement('p');
        ing.textContent=ingredients[j].text;

        item.appendChild(img);
        item.appendChild(ing);

        body_div.appendChild(item);

    }
}

const esc=document.querySelector('#modal .esc');
esc.addEventListener('click',hideModal);

function hideModal(event){
    const modal = document.querySelector('#modal');
    modal.classList.add('hidden');
    const body = document.querySelector('.body');
    body.innerHTML = '';
    document.body.classList.remove('no-scroll');
}

document.querySelector(".salva form").addEventListener("submit", savePost);

function savePost(event){
    event.preventDefault();
    const id_recipe = id;
    fetch(BASE_URL + "save_recipe/" + id_recipe).then(saveResponse,saveError);

}

function saveResponse(response) {
    butt.classList.add('hidden');
    fail.classList.add('hidden');
    success.classList.remove('hidden');

    if(!response.ok) {
        saveError();
        return null;
    }
    console.log(response);
    return response.json().then(databaseResponse); 
}

const paragraph = document.querySelector('.paragraph');
const butt = paragraph.querySelector('.salva');
const success = paragraph.querySelector('#success');
const fail = paragraph.querySelector('#fail');

function saveError(error) {     
    butt.classList.add('hidden');
    success.classList.add('hidden');
    fail.classList.remove('hidden');
    
    console.log('errore');
}

function databaseResponse(json) {
    if (!json.ok) {
        saveError();
        return null;
    }
    console.log('ok');
}


// per la visualizzazione mobile
const menu = document.querySelector('#menu');
const modal_links=document.querySelector('#modal_link');
menu.addEventListener('click', SHLinks);


function SHLinks(event){
    if(modal_links.classList == "show"){
        modal_links.classList.remove('show');
    }else{
        modal_links.classList.add('show');
    }
}

