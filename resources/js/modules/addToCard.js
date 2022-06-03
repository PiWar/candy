import {store} from "../store";


const getAllBtn = () => {
    return document.querySelectorAll(".item-btn")
}

const handleClick = e => {
    const id  = e.target.dataset.product
    store.addItem(Number.parseInt(id))
}

const init = () => {
    getAllBtn().forEach(node => {
        node.onclick = handleClick
    })
}


export default function () {
    init()
}
