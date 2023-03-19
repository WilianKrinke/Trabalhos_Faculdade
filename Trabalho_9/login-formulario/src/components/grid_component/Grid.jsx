import React, { Component } from 'react';
import './grid.css'
import Title from '../title_component/Title';
import Form from '../form_component/Form';

class Grid extends Component {
    render() {
        return (
            <div className='grid_class'>
                <Title/>
                <Form />                
            </div>
        );
    }
}

export default Grid;
