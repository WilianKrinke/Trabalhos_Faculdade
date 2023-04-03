import React from 'react';
import { BrowserRouter,Routes,Route} from 'react-router-dom'
import Page2 from '../pages/Page2/Page2.jsx';
import Page1 from '../pages/Page1/Page1.jsx';
import Page3 from '../pages/Page3/Page3.jsx'

const Index = () => {
    return (
        <>
            <BrowserRouter>
                <Routes>
                    <Route exact path='/' Component={Page1}/>
                    <Route exact path='/page-two' Component={Page2}/>
                    <Route exact path='/page-three' Component={Page3}/>
                </Routes>
            </BrowserRouter>
        </>
    );
}

export default Index;
