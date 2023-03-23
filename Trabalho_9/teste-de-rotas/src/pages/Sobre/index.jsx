import React from 'react';
import './sobre.css'
import Title from '../../components/Title_component'
import { Link } from "react-router-dom";

const Index = () => {
    return (
        <>
            <header className='header_class'>
                <Title title={'Sobre'}/>
            </header>
            <main className='main_class_sobre'>
                <section className='section_datas'>
                    <h4>Linguagem: Javascript</h4>
                    <h4>Bibliotecas: React versão 18.2.0</h4>
                </section>
                <section>
                    <Link to={'/'} className='buttonClass'>Home</Link>
                </section>
            </main>
        </>
    );
}

export default Index;
