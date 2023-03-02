import React from 'react';
import "./grid.css";
import Ecra from '../ecra_component/ecra';
import ButtonsOperators from '../button_operators_component/buttons_operators';

const Grid = () => {
    return (
        <div className='grid'>
            <div className='ecra_display'>
                <Ecra/> 
            </div>          
            <div className='ecra_buttons'>
                <div className='ecra_btn_numbers'>

                </div>
                <div className='ecra_btn_operators'>
                    <ButtonsOperators operator="/"/>
                    <ButtonsOperators operator="*"/>
                    <ButtonsOperators operator="-"/>
                    <ButtonsOperators operator="+"/>
                    <ButtonsOperators operator="="/>
                </div>
            </div>
        </div>
    );
}

export default Grid;
