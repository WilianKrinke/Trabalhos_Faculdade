import React, { useState } from 'react';
import './grid.css'
import DisplayNum from "../display_num_component/Display_num"

const Grid = () => {

    const [num, setNum] = useState(0);

    const sumNum = (e) => {
        e.preventDefault();
        console.log("UP")
        setNum(num + 1)
    }

    const minusNum = (e) => {
        e.preventDefault();
        console.log("Down")
        setNum(num - 1)
    }

    return (
        <div className='grid_class'>
            <button className='button_class' onClick={minusNum}>-1</button>
            <DisplayNum num={num}/>
            <button className='button_class' onClick={sumNum}>+1</button>
        </div>
    );
}

export default Grid;
