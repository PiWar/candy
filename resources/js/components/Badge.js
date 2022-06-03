import {observer} from "mobx-react-lite";
import {store} from "../store";

const Badge = observer(() => {
    return (
        <>
            {store.countInCard}
        </>
    );
});


export default Badge;
