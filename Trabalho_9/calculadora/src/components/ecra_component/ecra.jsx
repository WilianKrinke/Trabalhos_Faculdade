import React, { Component } from 'react';
import "./ecra.css"


class Ecra extends Component {

    constructor(props){
        super(props)
        this.state = {
            num: 0.75,
        }
    }


    render() {
        return (
            <div className='ecra'>
                <p className='display'>{this.state.num}</p>
            </div>
        );
    }
}

export default Ecra;
