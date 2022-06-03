import {useEffect, useState} from "react";
import {getAllItems} from "../api";


export function useGetItems() {
    const [items, setItems] = useState([])

    useEffect(() => {
        const fetch = async () => {
            setItems((await getAllItems()).data)
        }
        fetch()
    }, [])

    return items
}
