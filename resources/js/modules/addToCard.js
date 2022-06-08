import {store} from "../store";
import toast from "vanilla-toast"
import 'vanilla-toast/vanilla-toast.css'

let isOpenToast = false
const toastConfig = {
    duration: 1000,
    fadeDuration: 300,
}


const getAllBtn = () => {
    return document.querySelectorAll(".item-btn")
}

const showToast = () => {
    if (!isOpenToast) {
        isOpenToast = true
        toast.show("Добавлено", toastConfig, () => isOpenToast = false)
    }
}

const handleClick = e => {
    const id = e.target.dataset.product
    const price = e.target.dataset.price
    store.addItem(Number.parseInt(id), Number.parseInt(price))
    showToast()
}

const init = () => {
    getAllBtn().forEach(node => {
        node.onclick = handleClick
    })
}


export default function () {
    init()
}
