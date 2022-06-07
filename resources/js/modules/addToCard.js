import {store} from "../store";


const getAllBtn = () => {
    return document.querySelectorAll(".item-btn")
}

const handleClick = e => {
    const id  = e.target.dataset.product
    const price = e.target.dataset.price
    store.addItem(Number.parseInt(id), Number.parseInt(price))
}

const init = () => {
    getAllBtn().forEach(node => {
        node.onclick = handleClick
    })
}


export default function () {
    init()
}
