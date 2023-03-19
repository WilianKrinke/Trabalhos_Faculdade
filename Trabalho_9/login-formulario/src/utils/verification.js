export default function verification(inputEmail, inputPassString) {
    const {email,senha} = require('./datas.json')
    const inputPassNumber = Number(inputPassString)   

    const hasVerificated = inputEmail === email && inputPassNumber === senha ? true : false
    return hasVerificated
}