import {useGetItems} from "../hooks/useGetItems";
import CardItem from "./CardItem";
import CardForm from "./CardForm";
import {observer} from "mobx-react-lite";
import {store} from "../store";


const Card = () => {
    const items = useGetItems()

    return (
        <div className="card__container">
            <div className="card__items">
                {store.countInCard > 0
                    ? items.map(item => <CardItem id={item.id} name={item.title} img={item.image}/>)
                    : (<div className='text-xl text-center mt-4 flex justify-center w-full'>
                        Товаров в корзине нет,&nbsp;
                        <a className='text-emerald-500 hover:text-emerald-600 transition-colors' href="/">купить?</a>
                    </div>)}
            </div>
            <CardForm/>
        </div>
    );
};


export default observer(Card);
