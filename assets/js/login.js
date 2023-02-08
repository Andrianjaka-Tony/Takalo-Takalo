import { getXHr, site_url } from "./function.js";
import { createMessage } from "./message.js";


const input_containers = document.querySelectorAll(".input_container");
input_containers.forEach(item => {

  const label = item.children[0];
  const input = item.children[1];
  
  input.addEventListener("focus", function() {
    label.classList.add("active");
    if(this.classList.contains("number")) {
      window.setTimeout(() => {
        this.type = "number";
      }, 300)
    }
  })
  input.addEventListener("blur", function() {
    if(!this.value) {
      label.classList.remove("active");
    }
    if(this.type == "number") {
      this.type = "text";
    }
  })

})
const btn_link = document.querySelectorAll(".button-link");
btn_link.forEach(item => {
  item.addEventListener("click", function() {
    this.parentElement.style.animation = "to-right .8s forwards"
    window.setTimeout(() => {
      item.parentElement.classList.remove("active");
      if(this.parentElement.classList.contains("connexion")) {
        const boite = document.querySelector(".inscription");
        boite.classList.add("active");
        boite.style.animation = "from-right .6s forwards";
      } else if(this.parentElement.classList.contains("inscription")) {
        const boite = document.querySelector(".connexion");
        boite.classList.add("active");
        boite.style.animation = "from-right .6s forwards";
      }
      item.parentElement.style.animation = "none";
    }, 900)
  })
})
function sendData(url, formular) {
  const xhr = getXHr();
  url = site_url(url);
  const form = new FormData(formular);
  const method = "POST";
  xhr.open(method, url);
  xhr.send(form);
  xhr.addEventListener("load", function() {
    var value = xhr.responseText;
    value = parseInt(value);

    if(value == 1) {
      createMessage("L'email est deja utilise!", "red");
    } else if(value == 2) {
      createMessage("Votre compte a ete cree", "green");
    } else if(value == 3) {
      createMessage("La connexion est refusee", "red");
    } else if(value == 4) {
      createMessage("Connexion reussie", "green");
      window.setTimeout(() => {
        window.location = "home/index";
      }, 3000)
    }
  })
}
const connexion = document.querySelector(".connexion");
const inscription = document.querySelector(".inscription");
inscription.addEventListener("submit", function(e) {
  e.preventDefault();
  sendData("log/signup", this);
})
connexion.addEventListener("submit", function(e) {
  e.preventDefault();
  sendData("log/signin", this);
})