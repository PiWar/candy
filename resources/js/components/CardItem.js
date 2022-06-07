import {observer} from "mobx-react-lite";
import {store} from "../store";
import {useEffect, useState} from "react";
import {isNull, isUndefined} from "lodash";

const CardItem = observer(({id, name, img}) => {
    const [item, setItem] = useState(null)


    useEffect(() => {
        setItem(store.getItem(id.toString()))
    }, [])

    const minus = () => setItem(store.removeItem(id))
    const plus = () => setItem(store.addItem(id))


    if (isUndefined(item)) return null


    return (
        <div className="card__item">
            <img src={img} alt={name}/>
            <div className="item__content">
                <div className="title">
                    {name}
                </div>
                <div className="control">
                    <span className="action minus" onClick={minus}>-</span>
                    <span className="count">{item?.count}</span>
                    <span className="action plus" onClick={plus}>+</span>
                </div>
                <div className='price'><span>{item?.price} p.</span></div>
            </div>
        </div>
    );
});


export default CardItem;
