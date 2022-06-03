import {useFormik} from "formik";
import * as yup from "yup"
import FormInput from "./FormInput";
import {createOrder} from "../api";
import {store} from "../store";
import {useState} from "react";

const CardForm = () => {
    const [title, setTitle] = useState("Оформить заказ")
    const {handleSubmit, handleChange, values, errors, touched, resetForm} = useFormik({
        initialValues: {
            phone: "",
            email: "",
            name: "",
        },
        validationSchema: yup.object({
            phone: yup.string().required("Обязательное поле"),
            email: yup.string().required("Обязательное поле").email("Почта должна быть валидной"),
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


    return (
        <form onSubmit={handleSubmit} className="card__form">
            <p className="card__form-title">{title}</p>
            <FormInput title={"Name"} name={"name"} value={values.name} handleChange={handleChange}
                       placeholder={"name"} touched={touched.name} error={errors.name}/>
            <FormInput title={"Email"} name={"email"} value={values.email} handleChange={handleChange}
                       placeholder={"email"} touched={touched.email} error={errors.email}/>
            <FormInput title={"Phone"} name={"phone"} value={values.phone} handleChange={handleChange}
                       placeholder={"phone"} touched={touched.phone} error={errors.phone}/>
            <input type="submit" value="Заказать" className="card__submit"/>
        </form>
    );
};


export default CardForm;
