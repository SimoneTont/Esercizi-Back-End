let c = 0;
const apiPages = "http://localhost/19-febbraio/wordpress/wp-json/wp/v2/pages";
fetch(apiPages)
    .then(res => res.json())
    .then(data => data.forEach(element => {
        CreateCard(element)
    }))

const apiUsers = "http://localhost/19-febbraio/wordpress/wp-json/wp/v2/users";
fetch(apiUsers)
    .then(res => res.json())
    .then(data => data.forEach(element => {
        UserCard(element)
    }))

function CreateCard(obj) {
    c++;
    //CardsContainer
    const cardsContainer = document.querySelector(".cardsContainer");
    //card
    let card = document.createElement("div");
    card.classList.add("card");
    card.style.width = "18rem";
    cardsContainer.appendChild(card);
    //img
    let img = document.createElement("img");
    img.classList.add("card-img-top");
    card.appendChild(img);
    //card-body
    let cardBody = document.createElement("div");
    cardBody.classList.add("card-body");
    card.appendChild(cardBody);
    //card-title
    let cardTitle = document.createElement("h5");
    cardTitle.classList.add("card-title");
    cardTitle.innerText = obj.title.rendered;
    cardBody.appendChild(cardTitle);
    //card-text
    let cardText = document.createElement("p");
    cardText.classList.add("card-text");
    cardText.innerHTML = obj.excerpt.rendered;
    cardBody.appendChild(cardText);
    //a
    let a = document.createElement("a");
    a.href = obj.link;
    a.innerText = "Go to page";
    a.classList.add("btn", "btn-primary");
    cardBody.appendChild(a);
    //Delete button
    let deleteButton = document.createElement("button");
    deleteButton.id = obj.id;
    deleteButton.innerText = "Delete";
    deleteButton.classList.add("btn", "btn-danger");
    deleteButton.addEventListener("click", (e) => {
        //console.log(e.target)
        e.target.parentElement.parentElement.remove();
        deleteFunction(e.target.id);
    })
    cardBody.appendChild(deleteButton);
    //console.log(obj)
}

function UserCard(user) {
    //CardsContainer
    const cardsContainer = document.querySelector(".UsersContainer");
    //card
    let card = document.createElement("div");
    card.classList.add("card");
    card.style.width = "18rem";
    cardsContainer.appendChild(card);
    //img
    let img = document.createElement("img");
    img.classList.add("card-img-top");
    img.src = user.avatar_urls[96];
    card.appendChild(img);
    //card-body
    let cardBody = document.createElement("div");
    cardBody.classList.add("card-body");
    card.appendChild(cardBody);
    //card-title
    let cardTitle = document.createElement("h5");
    cardTitle.classList.add("card-title");
    cardTitle.innerText = user.name;
    cardBody.appendChild(cardTitle);
    //a
    let a = document.createElement("a");
    a.href = user.link;
    a.innerText = "Go to page";
    a.classList.add("btn", "btn-primary");
    cardBody.appendChild(a);

    console.log(user)
}

deleteFunction = (id) => {
    deleteUrl = "http://localhost/19-febbraio/wordpress/wp-json/wp/v2/pages/" + id;
    fetch(deleteUrl, {
        method: "DELETE",
        headers: {
            "Content-type": "application/json"
        }
    })
    console.log(deleteUrl)
}

/*  <div class="card" style="width: 18rem;">
        <img src="" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div> */