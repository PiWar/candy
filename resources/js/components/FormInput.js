const FormInput = ({title, name, handleChange, value, placeholder, touched, error, disabled}) => {
    return (
        <div className="card__input">
            <label htmlFor={name}>{title}:</label>
            <input disabled={disabled} type="text" id={name} name={name} onChange={handleChange} value={value}
                   placeholder={placeholder}/>
            {touched && Boolean(error) && <div className="card__input-error">{touched && error}</div>}
        </div>
    );
};

FormInput.propTypes = {}

export default FormInput;
