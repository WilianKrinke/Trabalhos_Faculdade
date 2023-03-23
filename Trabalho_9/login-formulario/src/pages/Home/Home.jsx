import React, { Component } from 'react';
import './home.css'
import Title from '../../components/title_component/Title';
import Form from '../../components/form_component/Form';

class Home extends Component {
    render() {
        return (
            <>
                <header>
                    <Title/>
                </header>
                <main>
                    <section>
                        <Form />
                    </section>
                </main>       
            </>
        );
    }
}

export default Home;
