// * 1: Le compte qui utilise cet email existe deja
// * 2: Le compte a ete cree
// * 3: LA connexion est refusee

// * 5: FIchier envoye!




export function createMessage(text, nom_classe) {
  const boite = document.createElement("div");
  boite.classList.add("message");
  boite.classList.add(nom_classe);
  boite.innerHTML = text;
  document.body.appendChild(boite);
  window.setTimeout(() => {
    document.body.removeChild(boite);
  }, 3000);
}