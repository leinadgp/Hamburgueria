
const lista = document.querySelector(".burguer-list")


//foreach  para mostrar todos.
// map para dar 10% de desconto em todos
//reduce para somar o valor de todos os hamburgueres e mostrar valor total
// filter para listar somente os veganos

function btnForEach() {
    clearr()

    menuOptions.forEach(item => {
        const newPrice = new Intl.NumberFormat("pt-BR", {
            style: "currency",
            currency: "BRL"

        }).format(item.price)

        lista.insertAdjacentHTML('beforeend', `
                <li class="item-price">
                <img class="imgBurguer" src="./assets/images/burguer/${item.src}" alt="">
                <p>${item.name}</p>
                <p class="item-price">${newPrice}</p>
                
            </li>
            `);
        console.log(item.price);
        
    });



}

function btnMapDescont() {
    clearr()
    const burguerDescont = menuOptions.map(item => {
        const newPrice = new Intl.NumberFormat("pt-BR", {
            style: "currency",
            currency: "BRL"

        }).format(item.price - item.price / 10)

        return {
            name: item.name, price: newPrice, vegan: item.vegan, src: item.src
        }
    })


    burguerDescont.forEach(item => {


        lista.insertAdjacentHTML('beforeend', `
               <li class="item-price">
                <img class="imgBurguer" src="./assets/images/burguer/${item.src}" alt="">
                <p>${item.name}</p>
                <p class="item-price">${item.price}</p>
            </li>
            `)
    });


}

function clearr() {
    lista.innerHTML = ""
    auxiliar = 0

}

function btnReduce() {
    clearr()
    let somaTotal = menuOptions.reduce((acc, item) => {
        item.price = parseFloat(item.price)
        acc += item.price;
        
        
        
        return acc

    }, 0)

   
    

    let somaBurguerDescont = menuOptions.map(item => {
        const newPrice = item.price - item.price / 10

        return {
            name: item.name, price: newPrice, vegan: item.vegan, src: item.src
        }
    }).reduce((acc, item) => {
        acc += item.price
        return acc
    }, 0)
   
    somaTotal = new Intl.NumberFormat("pt-BR", {
            style: "currency",
            currency: "BRL"

        }).format(somaTotal)

    somaBurguerDescont = new Intl.NumberFormat("pt-BR", {
            style: "currency",
            currency: "BRL"

        }).format(somaBurguerDescont)  

    console.log(somaTotal);
    console.log(somaBurguerDescont);


     lista.innerHTML = `
                <li class="item-price">
                <p>A soma total dos produtos sem desconto</p>
                <p class="item-price">${somaTotal}</p>
                </li>
                <li class="item-price">
                <p>A soma total dos produtos com desconto de 10%</p>
                <p class="item-price">${somaBurguerDescont}</p>
                </li>


            `
}


function btnFilter(tipo){
    clearr()
    
    const listaFiltrada = menuOptions.filter(item => item[tipo] === "1");
        console.log(listaFiltrada);
        
        listaFiltrada.forEach(item => {

            const newPrice = new Intl.NumberFormat("pt-BR", {
            style: "currency",
            currency: "BRL"

        }).format(item.price)
        lista.insertAdjacentHTML('beforeend', `
                <li class="item-price">
                <img class="imgBurguer" src="./assets/images/burguer/${item.src}" alt="">
                <p>${item.name}</p>
                <p class="item-price">${newPrice}</p>
            </li>
            `)
    });
}


