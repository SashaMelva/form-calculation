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