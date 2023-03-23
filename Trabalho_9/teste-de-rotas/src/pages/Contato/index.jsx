import React from 'react';
import Title from "../../components/Title_component";
import { Link } from "react-router-dom";
import './contato.css'

const Index = () => {
    return (
        <>
            <header className='header_class'>
                <Title title={'Contato'}/>
            </header>
            <main className='main_class_contato'>
                <section className='section_class section_datas'>
                    <h4>Nome: Wilian Krinke</h4>
                    <h4>E-mail:  krinkewilian@gmail.com</h4>;
                </section>

                <section className='section_class section_button'>
                    <Link to={'/'} className='buttonClass'>Home</Link>
                </section>
            </main>
        </>
    )
}

export default Index;
