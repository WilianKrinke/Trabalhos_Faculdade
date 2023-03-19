

export default function verification(inputEmail, inputPass) {
    const {email,senha} = require('./datas.json')
    const hasVerificated = inputEmail === email && inputPass === senha ? true : false
    return hasVerificated
}