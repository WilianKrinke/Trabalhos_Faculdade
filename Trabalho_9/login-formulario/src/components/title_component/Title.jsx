import React, { Component } from 'react';
import './title.css'

class Title extends Component {

    constructor(props){
        super(props);
        this.state = {
            title: "Login"
        }
    }


    render() {
        return (
            <div className='title_class'>
                <h2>{this.state.title}</h2>
            </div>
        )
    }
}

export default Title;
