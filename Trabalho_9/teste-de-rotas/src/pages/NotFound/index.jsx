import React from 'react';
import './notfound.css'
import { Link } from "react-router-dom";

const Index = () => {
    return (
        <>
            <main className='main_class_notfound'>
                <h1>404 - NOT FOUND</h1>
                <Link to={'/'}className='buttonClass'>Home</Link>
            </main>
        </>
    );
}

export default Index;
