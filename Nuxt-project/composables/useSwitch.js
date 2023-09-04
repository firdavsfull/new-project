export default function useSwitch(){
    const isShow = useState('isShow', () => true)
    const active = useState('isActive',() => false)
    const showMadoal = useState('showM', () => false)
    const showNavBar = useState('navBar',()=> true)
    const toggleShow = () => isShow.value = !isShow.value
    return {showNavBar, showMadoal, isShow, toggleShow, active }
}