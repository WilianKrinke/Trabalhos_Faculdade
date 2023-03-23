import React from 'react';
import Title from '../../components/Title_component'
import { Link } from "react-router-dom";
import './home.css'

const Index = () => {
    return (
        <>
            <header className='header_class'>
                <Title title={'Home'}/>
            </header>
            <main className='main_class_home'>
                <section>                    
                        <Link to={'/contato'} className='buttonClass'>Contato</Link>                    
                </section>
                <section>                    
                        <Link className='buttonClass'>Sobre</Link>                   
                </section>              
            </main>
            <footer>
                
            </footer>                  
        </>
    );
}

export default Index;
