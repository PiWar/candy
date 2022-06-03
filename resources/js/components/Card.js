import {useGetItems} from "../hooks/useGetItems";
import CardItem from "./CardItem";
import CardForm from "./CardForm";


const Card = () => {
    const items = useGetItems()
    console.log(items);

    return (
        <div className="card__container">
            <div className="card__items">
                {items.map(item => <CardItem id={item.id} name={item.title} img={item.image}/>)}
            </div>
            <CardForm/>
        </div>
    );
};


export default Card;
