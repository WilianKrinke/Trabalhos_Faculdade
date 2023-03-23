import React from 'react';
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Home from '../pages/Home'
import Contato from '../pages/Contato'
import Sobre from '../pages/Sobre'

const index = () => {
    return (
        <BrowserRouter>
            <Routes>
                <Route exact path='/' Component={Home}/>
                <Route exact path='/contato' Component={Contato}/>
                <Route exact path='/sobre' Component={Sobre}/>
            </Routes>            
        </BrowserRouter>
    );
}

export default index;
