import React from 'react';
import './title.css'

const Title = ({title}) => {
    return (
        <>
            <header className='title_class'>
                <h1>{title}</h1>
            </header>
        </>
    );
}

export default Title;

