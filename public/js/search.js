
let btnSearch = document.getElementById('search');

let searchInput = document.getElementById('searchInput');

const url = "http://127.0.0.1:8000/stock/search?";
let searchResult = document.getElementById('searchResult');

searchInput.addEventListener('keyup', function(){
    let productSearch = searchInput.value;
    console.log(productSearch)
    let params = new URLSearchParams();
    params.append('query', productSearch);

    fetch(url + params,{
        method: 'GET',
        headers:{
            'Accept': 'text/html'
        },
    })
        .then(response => response.text())
        .then(data =>{
            searchResult.innerHTML = data;
            console.log(data);
        })
        .catch(error => console.error('Error in fetch request: ', error));
})
