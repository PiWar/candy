import {useFormik} from "formik";
import * as yup from "yup"
import FormInput from "./FormInput";
import {createOrder} from "../api";
import {store} from "../store";
import {useEffect, useState} from "react";
import {observer} from "mobx-react-lite";

const CardForm = () => {
    const [title, setTitle] = useState("Оформить заказ")
    const {handleSubmit, handleChange, values, errors, touched, resetForm, setFieldValue} = useFormik({
        initialValues: {
            phone: "",
            email: "",
            name: "",
        },
        validationSchema: yup.object({
            phone: yup.string().required("Обязательное поле").trim(),
            email: yup.string().required("Обязательное поле").trim().email("Почта должна быть валидной"),
            name: yup.string().required("Обязательное поле"),
        }),
        onSubmit: async value => {
            if (store.getAll.length > 0) {
                const {code} = await createOrder(value)
                if (code === 200) {
                    resetForm()
                    setTitle("Заказ успешно создан")
                    store.reset()
                    setTimeout(() => {
                        location.reload()
                    }, 2000)
                }
            }
        }
    })

    useEffect(() => {
        const card = document.getElementById("card")
        if (card?.dataset?.phone && card?.dataset?.name) {
            setFieldValue("phone", card.dataset.phone)
            setFieldValue("name", card.dataset.name)
        }
    }, [])

    return (
        <form onSubmit={handleSubmit} className="card__form">
            <p className="card__form-title">{title}</p>
            <FormInput title={"Ваше имя"} name={"name"} value={values.name} handleChange={handleChange}
                       placeholder={"Никита"} touched={touched.name} error={errors.name}/>
            <FormInput title={"Ваша почта"} name={"email"} value={values.email} handleChange={handleChange}
                       placeholder={"ваша@почта.рф"} touched={touched.email} error={errors.email}/>
            <FormInput title={"Ваш телефон"} name={"phone"} value={values.phone} handleChange={handleChange}
                       placeholder={"89000000000"} touched={touched.phone} error={errors.phone}/>
            <div className="card__input">
                <label htmlFor="typeBuy">Способ оплаты:</label>
                <select name="typeBuy" id="typeBuy" disabled>
                    <option value="_">Картой при получении</option>
                </select>
            </div>
            <div className="card__input">
                <label htmlFor="typeGet">Способ получения:</label>
                <select name="typGet" id="typeGet" disabled>
                    <option value="_">Самовывоз</option>
                </select>
            </div>

            <div className="card__control">
                <div className="card__total-price">{store.totalPrice} p.</div>
                <input type="submit" value="Заказать" className="card__submit"/>
            </div>
        </form>
    );
};


export default observer(CardForm);
