const menu = document.getElementById("scrollbar-custom")
const menuLink = menu.querySelectorAll(".main__categories-item")

menuLink.forEach(el => {
    el.onclick = e => {
        localStorage.setItem("scrollMenu", e.target.id)
    }
})

document.addEventListener("DOMContentLoaded", e => {
    const scrollMenu = localStorage.getItem("scrollMenu")
    if (scrollMenu) {
        document.getElementById(scrollMenu).scrollIntoView()
    }

})
