import React from 'react';
import "./grid.css";
import Ecra from '../ecra_component/ecra';
import ButtonsOperators from '../button_operators_component/buttons_operators';
import ButtonNumbers from '../button_numbers_component/button_numbers';

const Grid = () => {
    return (
        <div className='grid'>
            <div className='ecra_display'>
                <Ecra/> 
            </div>          
            <div className='ecra_buttons'>
                <div className='ecra_btn_numbers'>
                    <div className='btn_AC'>
                        <button className='AC'>AC</button>
                    </div>
                    <div className='btn_numbers template-areas'>
                        <ButtonNumbers number={1} classNameProp="one"/>
                        <ButtonNumbers number={2} classNameProp="two"/>
                        <ButtonNumbers number={3} classNameProp="three"/>
                        <ButtonNumbers number={4} classNameProp="four"/>
                        <ButtonNumbers number={5} classNameProp="five"/>
                        <ButtonNumbers number={6} classNameProp="six"/>
                        <ButtonNumbers number={7} classNameProp="seven"/>
                        <ButtonNumbers number={8} classNameProp="eight"/>
                        <ButtonNumbers number={9} classNameProp="nine"/>
                        <ButtonNumbers number={0} classNameProp="zero"/>
                        <ButtonNumbers number={"."} classNameProp="dot"/>
                    </div>
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
