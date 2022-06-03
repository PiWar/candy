import {isArray, isNull} from "lodash";

const getItem = key => {
    return JSON.parse(localStorage.getItem(key))
}
const setItem = (key, val) => {
    if (isArray(val)) val = val.filter(item => !!item)
    localStorage.setItem(key, JSON.stringify(val))
    return val
}
const removeItem = key => {
    localStorage.removeItem(key)
}
const hasItem = key => localStorage.hasOwnProperty(key)
const pushItem = (key, val) => {
    const data = getItem(key)
    data.push(val)
    setItem(key, data)
    return data
}

export function useStore(key, initValue = []) {
    const get = () => getItem(key)
    const set = val => setItem(key, val)
    const remove = () => removeItem(key)
    const has = () => hasItem(key)
    const push = val => pushItem(key, val)
    if (!has()) set(initValue)

    return {
        get,
        set,
        remove,
        has,
        push
    }
}
