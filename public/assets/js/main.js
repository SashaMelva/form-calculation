// document.addEventListener("DOMContentLoaded", fetchLoadPage);
// document.querySelector('#countDay').addEventListener('keyup', 'updatePrise');

function updatePrise(value) {
    let countDay = value.value;
    fetchPriceForCountDay(countDay).then(json => console.log(json))
    // if (countDay) {
    //
    // }
    alert();
}

async function fetchPriceForCountDay(countDay) {
    let response = await fetch('/updatePrice', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=UTF-8'
        },
        body: JSON.stringify(
            {countDay : countDay}
        ),
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
