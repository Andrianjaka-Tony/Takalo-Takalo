import { site_url } from "./function.js";

export function createCarte(tableau) {
  const boite = document.createElement("div");
  boite.classList.add("carte");

  boite.innerHTML = `
    <img src="${site_url("assets/image/" + tableau.source)}" class="iaage">
    <div class="details">
      <p class="nom">${tableau.designation}</p>
      <p class="desc">${tableau.description}</p>
      <p class="prix">${tableau.prix}</p>
      <button class="button" type="button">Echanger</button>
      <button class="button d" type="button">Details</button>
    </div>
  `
}