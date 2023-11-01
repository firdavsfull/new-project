export default function useSwitch(){
    const isShow = useState('isShow', () => true)
    const active = useState('isActive',() => false)
    const showMadoal = useState('showM', () => false)
    const showNavBar = useState('navBar',()=> true)
    const showCity = useState('showCity',() => false)
    const showFIlterModal = useState('showFIlterModal',()=>false)
    const toggleShow = () => isShow.value = !isShow.value
    return {showCity,showNavBar, showMadoal, isShow, toggleShow, active, showFIlterModal }
}