

let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('#list');
let listCard = document.querySelector('.listShop');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

let isMenuOpen = false;



openShopping.addEventListener('click', () => {
    if (isMenuOpen) {
        // Si el menú está abierto, ciérralo
        body.classList.remove('active');
    } else {
        // Si el menú está cerrado, ábrelo
        body.classList.add('active');
    }

    // Cambia el estado del menú
    isMenuOpen = !isMenuOpen;
});
closeShopping.addEventListener('click', () => {
    body.classList.remove('active');
})

let listCards = [];

let products = [];

// Realiza una solicitud HTTP para obtener los productos
fetch('/inventory/get_tipos')
    .then(response => response.json())
    .then(data => {
        products = data; // Almacena los datos de productos en 'products'
        console.log(products); // Verifica que los datos se hayan cargado correctamente
    })
    .catch(error => {
        console.error('Error al obtener los productos: ' + error);
    });




function addToCard(key) {
    if (listCards[key] == null) {
        // Copiar producto de la lista al carrito
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    } else {
        // Si el producto ya está en el carrito, incrementar la cantidad
        listCards[key].quantity++;
    }
    reloadCard();
}
function reloadCard() {
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key) => {
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if (value != null) {
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
            <img src="storage/${value.image.toLocaleString()}" style="height: 100px; border-radius: 15px;">

                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button><br>
                    <button class="fa fa-trash-o" onclick="changeQuantity(${key}, ${value.quantity - value.quantity})"></button>
                </div>`;
            listCard.appendChild(newDiv);
        }
    })
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}
function changeQuantity(key, quantity) {
    if (quantity == 0) {
        delete listCards[key];
    } else {
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}

function initApp() {
    if (products.length > 0) {
        products.forEach((value, key) => {
            let newDiv = document.createElement('div');
            newDiv.classList.add('item');
            newDiv.innerHTML = `
        <div data-aos="fade-up" data-aos-delay="450">
            <div class="card">
            <div class="card-body">
            <img src="storage/${value.image.toLocaleString()}" style="height: 100px; border-radius: 15px;">
            <h5 class="title">${value.name}</h5>
            <p class="description">${value.description}<p>
            </div>
            <div class="mb-5 d-flex justify-content-around">
                    <h3 class="price">$${value.price.toLocaleString()}</h3>
                    <h3 class="product_code">${value.amount.toLocaleString()}</h3>
                    <button class="btn btn-primary" onclick="addToCard(${key})">Buy Now</button>
                </div>
            </div>
        </div>`;
            list.appendChild(newDiv);
        });
    } else {
        // Código a ejecutar cuando no hay elementos en products
        let noItemsMessage = document.createElement('div');
        noItemsMessage.innerHTML = `
        <div data-aos="fade-up" data-aos-delay="450">
            <h1 class="title">No Hay Elementos Disponibles Master, Lamentamos Los Inconvenientes.</h1>
            <img src="https://milkandhoney.in/wp-content/uploads/2019/01/emoji4-1-300x300.png" style="height: 100px; border-radius: 15px;">
        </div>`;
        list.appendChild(noItemsMessage);
    }
}

total.addEventListener('click', () => {
    if (listCards.length > 0) {
        const cartInfo = JSON.stringify(listCards);
        window.location.href = `/confirmacion?cart=${encodeURIComponent(cartInfo)}`;
    } else {
        window.location.href = '/confirmacion';
    }
});


window.onload = initApp;
