const listSvg = document.getElementById('list');
const urlListe = "http://127.0.0.1:8000/stock/liste";

listSvg.addEventListener("click", function (e){
    e.stopPropagation();
    fetch(urlListe)
        .then(response => response.json())
        .then(data => {
            alert(data);
        })
})

