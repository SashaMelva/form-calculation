// document.addEventListener("DOMContentLoaded", fetchLoadPage);
// document.querySelector('#countDay').addEventListener('keyup', 'updatePrise');

function updatePrise(value) {
    let countDay = value.value;
    let spanForPriceTariff =  document.querySelector('#price')
    if (countDay === '' || countDay > 30 || countDay < 1 ) {
        spanForPriceTariff.innerHTML = '';
    } else {
        const selectProduct = document.querySelector('#product');
        let productId = selectProduct.value;

        fetchPriceForCountDay(countDay, productId).then(json =>  spanForPriceTariff.innerHTML = json)
    }
}

async function fetchPriceForCountDay(countDay, productId) {
    let param = {
        'productId' : productId,
        'countDay' : countDay
    };
    let response = await fetch('/updatePrice', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(param),
    });
    return await response.text();
}

// async function fetchPriceForCountDay(countDay) {
//     let response = await fetch('/updatePrice?countDay=' + countDay);
//     return await response.text();
// }
// async function fetchPrice() {
//     const form = new FormData(document.querySelector("#form"));
//
//     let response = await fetch('/app.php?formName=calculate', {
//         method: 'POST',
//         body: form
//     });
//
//     return await response.json();
// }

// function insertIntoHtml(json) {
//     let main = document.querySelector('#app');
//     let view = json.html;
//
//    // if (json.status === 'success') {
//         main.innerHTML = view;
//    // }
// }

// async function fetchLoadPage() {
//     let response = await fetch('/index.php?function=viewMainPage');
//
//     let json = await response.json();
//     insertIntoHtml(json);
// }
