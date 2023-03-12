import React from 'react';
import "./display_num.css"

const DisplayNum = ({num}) => {
    return (
        <div className='display_num_class'>
            {num}
        </div>
    );
}

export default DisplayNum;
