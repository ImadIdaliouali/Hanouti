const articles_liste = document.querySelector(".articles-liste");
const plus = document.querySelectorAll(".plus");
const total = document.querySelector(".total");

console.log(products);

let idUsed = [];

plus.forEach(elem => elem.addEventListener("click", () => {
    let id = elem.getAttribute("id");
    plusClicked(id);
}));

let sum = 0;

function plusClicked(id) {
    products.forEach(p => {
        if (p.id == id) {
            p.qtt++;
            sum += p.price;
            total.textContent = `Total: ${sum}DH`;
            if (idUsed.indexOf(id) === -1) {
                // create article div
                let div = document.createElement("div");
                div.setAttribute("class", "article");
                div.setAttribute("id", `article${p.id}`);
                // create img
                let img = document.createElement("img");
                img.setAttribute("src", `./imgs/${p.img}`);
                div.appendChild(img);
                // create name
                let name = document.createElement("p");
                name.textContent = p.name;
                div.appendChild(name);
                // create qtt
                let qtt = document.createElement("p");
                qtt.setAttribute("class", "qtt");
                qtt.textContent = p.qtt;
                div.appendChild(qtt);
                // create del img
                let del = document.createElement("img");
                del.setAttribute("src", "./imgs/del.png");
                del.setAttribute("class", "del");
                del.setAttribute("id", `${p.id}`);
                div.appendChild(del);
                // appendChild to articles_liste
                articles_liste.appendChild(div);
                // update total
                idUsed.push(id);
            }
            else {
                let qtt = document.querySelector(`#article${id} .qtt`);
                console.log(qtt);
                qtt.textContent = p.qtt;
            }
        }
    });
}

const del = document.querySelectorAll(".del");
del.forEach(elem => elem.addEventListener("click", delClicked));

function delClicked() {
    console.log("you clicked me");
}