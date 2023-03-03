import React from 'react';
import "./buttons_operators.css"

const ButtonsOperators = ({operator}) => {
    return (
        <div className='btn_operators'>
            <p className='display_operator'>{operator}</p>
        </div>
    );
}

export default ButtonsOperators;
