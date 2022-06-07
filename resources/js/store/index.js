import {action, computed, makeObservable, observable} from "mobx";
import {useStore} from "../hooks/useStore";

const {get, set, has, push, remove} = useStore("card", [])

const getCount = (total, item) => total += item.count
const findItem = id => item => item.id == id
const increaseCountItem = id => item => {
    if (item.id === id) return {...item, count: item.count + 1, price: item.price + (item.price / item.count)}
    return item
}
const decrease = id => item => {
    if (item.id === id) {
        if (item.count === 1) return null
        return {id: item.id, count: item.count - 1, price: item.price - item.price / item.count}
    }
    return item
}

class Store {
    _count = 0

    constructor() {
        makeObservable(this, {
            getAll: computed,
            countInCard: computed,
            ids: computed,
            totalPrice: computed,
            _count: observable,
            addItem: action,
            removeItem: action,
            _hasItem: action,
            getItem: action,
            reset: action,
        })
        if (has()) {
            const count = get().reduce(getCount, 0)
            this._count = count > 0 ? count : 0
        }
    }

    get countInCard() {
        return this._count
    }

    get totalPrice() {
        const _ = this._count
        const totalPrice = get().reduce((prev, curr) => prev += curr.price, 0)
        return totalPrice
    }

    getItem(id) {
        return get().find(findItem(id))
    }

    addItem(id, price) {
        if (!this._hasItem(id)) {
            push({id, count: 1, price: price})
        } else {
            set(get().map(increaseCountItem(id)))
        }
        this._count += 1
        return this.getItem(id)
    }

    removeItem(id) {
        if (this._hasItem(id)) {
            set(get().map(decrease(id)))
            this._count -= 1
            return this.getItem(id)
        }
    }

    reset() {
        remove()
        set([])
    }

    get getAll() {
        return get()
    }

    get ids() {
        const ids = []
        get().forEach(item => ids.push(Number.parseInt(item.id)))
        return ids
    }

    _hasItem(id) {
        return get().find(findItem(id))
    }

}


export const store = new Store()

