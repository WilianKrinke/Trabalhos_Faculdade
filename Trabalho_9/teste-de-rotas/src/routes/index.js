import React from 'react';
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Home from '../pages/Home'
import Contato from '../pages/Contato'

const index = () => {
    return (
        <BrowserRouter>
            <Routes>
                <Route exact path='/' Component={Home}/>
                <Route exact path='/contato' Component={Contato}/>
            </Routes>            
        </BrowserRouter>
    );
}

export default index;
