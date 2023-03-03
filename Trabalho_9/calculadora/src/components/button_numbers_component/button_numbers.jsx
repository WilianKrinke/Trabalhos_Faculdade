import React from 'react';
import './button_number.css'

const ButtonNumbers = ({number,classNameProp}) => {

    let css = `button_numbers ${classNameProp}`

    return (
        <button className={css}>
            <p className='display_numbers'>{number}</p>
        </button>
    );
}

export default ButtonNumbers;
