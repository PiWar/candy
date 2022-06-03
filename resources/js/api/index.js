import {store} from "../store";

const _api = async (cb) => {
    try {
        const response = await cb()
        return {
            data: response.data,
            code: response.status
        }
    } catch (e) {
        return {
            data: e.response.data,
            code: e.response.status
        }
    }
}

export const getAllItems = async () => {
    return await _api(async () => await axios.post("/api/products/card", {
        ids: store.ids
    }))
}

export const createOrder = async ({name, phone, email}) => {
    return await _api(async () => axios.post("/api/order", {
        user_name: name,
        user_phone: phone,
        user_email: email,
        products: store.getAll
    }))
}
