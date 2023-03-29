import React from 'react';
import { BrowserRouter , Routes, Route} from 'react-router-dom'
import PageTwo from '../pages/PageTwo/PageTwo';
import Home from '../pages/Home/Home';

const Index = () => {
    return (
        <>
            <BrowserRouter>
                <Routes>
                    <Route exact path='/' Component={<Home />}/>
                    <Route exact path='/page-two' Component={<PageTwo/>}/>
                </Routes>
            </BrowserRouter>
        </>
    );
}

export default Index;
