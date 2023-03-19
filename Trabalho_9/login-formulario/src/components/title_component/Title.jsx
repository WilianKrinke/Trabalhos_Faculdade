import React, { Component } from 'react';

class Title extends Component {

    constructor(props){
        super(props);
        this.state = {
            title: "Login"
        }
    }


    render() {
        return (
            <>
                <h2>{this.state.title}</h2>
            </>
        );
    }
}

export default Title;
