import React from 'react';
import {useNavigate} from 'react-router-dom'


const HistoryButton = ({path,titlebtn}) => {
    const history = useNavigate()

    const goTo = (e) => {
        e.preventDefault()
        history(path)
    }
    
    return (
        <>
            <button onClick={e => goTo(e)}>{titlebtn}</button>
        </>
    );
}

export default HistoryButton;
