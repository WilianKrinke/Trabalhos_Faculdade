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
            <header className='title_class'>
                <h1>{this.state.title}</h1>
            </header>
        )
    }
}

export default Title;
