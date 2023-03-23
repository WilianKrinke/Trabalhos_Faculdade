import React from 'react';
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Home from '../pages/Home/Home';
import Pagetwo from '../pages/Pagetwo/Pagetwo';


const index = () => {
    return (
        <BrowserRouter>
            <Routes>
                <Route exact path='/' element={<Home />}/>
                <Route exact path='/page-2' element={<Pagetwo />}/>
            </Routes>
        </BrowserRouter>
    );
}

export default index;
