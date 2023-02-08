import { getXHr, site_url } from "./function.js";
import { createMessage } from "./message.js";

function takeOptions() {
  const xhr = getXHr();
  const url = site_url("options/index");
  const method = "GET";
  xhr.addEventListener("load", function() {
    const tableau = JSON.parse(this.responseText);
    const select = document.getElementById("options");
    for (let index = 0; index < tableau.length; index++) {
      select.innerHTML += `<option value=${tableau[index].id_categorie}>${tableau[index].designation}</option>`;
    }
  })
  xhr.open(method, url);
  xhr.send(null);
}
takeOptions();
function upload(form) {
  const xhr = getXHr();
  const url = site_url("upload/index");
  const method = "POST";
  const f = new FormData(form);

  xhr.addEventListener("load", function() {
    createMessage("Ajout reussi!", "green");
  })

  xhr.open(method, url);
  xhr.send(f);
}
const form = document.getElementById("upload_file");
form.addEventListener("submit", function(e) {
  e.preventDefault();
  upload(this);
})