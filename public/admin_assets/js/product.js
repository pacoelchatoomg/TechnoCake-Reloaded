let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('#list');
let listCard = document.querySelector('.listShop');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

total.addEventListener('click', () => {
    // Redirige al usuario a la sección de la página deseada, por ejemplo, "#pedido"
    const contactSection = document.getElementById('contacto');
    if (contactSection) {
        // Utiliza scrollIntoView para desplazar suavemente hacia la sección de contacto
        contactSection.scrollIntoView({ behavior: 'smooth' });
    }

})
openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})


let listCards  = [];
function initApp() {
    fetch('/producto/get_products') // Esta ruta debe coincidir con la ruta que configuraste en el controlador
        .then((response) => response.json())
        .then((data) => {
            list.innerHTML = ''; // Limpia el contenido actual de la lista

            data.forEach((value, key) => {
                let newDiv = document.createElement('div');
                newDiv.classList.add('item');
                newDiv.innerHTML = `
                <div data-aos="fade-up" data-aos-delay="450">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="title">${value.title}</h1>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                                dignissimos accusantium amet similique velit iste.</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around">
                            <h3 class="price">${value.price.toLocaleString()}</h3>
                            <button class="btn btn-primary" onclick="addToCard(${key})">Buy Now</button>
                        </div>
                    </div>
                </div>`;
                list.appendChild(newDiv);
            });
        })
        .catch((error) => {
            console.error('Error al obtener los datos: ' + error);
        });
        
        // Llama a fetchDataFromServer() para cargar los datos desde el controlador
        
    }
    
initApp();
    
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
        if (value != null) {
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><h1>${value.title}</h1></div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button><br>
                    <button class="fa fa-trash-o" onclick="changeQuantity(${key}, ${value.quantity - value.quantity})"></button>
                </div>`;
            listCard.appendChild(newDiv);

            // Mover estos cálculos dentro del bucle
            totalPrice += value.price;
            count += value.quantity;
        }
    });

    // Actualizar el total y la cantidad una vez dentro del bucle
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}

function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}
