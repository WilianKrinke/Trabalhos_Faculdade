import React, { useState } from 'react';
import './pagetwo.css'
import DisplayNum from '../../components/display_num_component/Display_num'
import { Link } from 'react-router-dom';

const Pagetwo = () => {

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
            <Link to={'/'}>Home</Link>
        </div>
    );
}

export default Pagetwo;
