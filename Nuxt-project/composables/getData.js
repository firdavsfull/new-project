export default function getData(){
    const responce = useState('responce',()=>{})
    const announData = useState('announ',()=>[])
    const avatar = useState('avatar',()=>{});
    const AnnounOgj = useState('AnnounOgj', ()=>{})
    const rotation = useState('rotaote', () => 0)
    const images = useState('images', () => []);
    const isUpload = useState('upload', () => false)
    const formData = useState('formData',()=>[])
    const city = useState('city',() => '');
    const dataFormBack = useState('dataFormBack',()=>[])
    const direction = useState('direction',()=>'')
    const showAnnouns = useState('showAnnoun',()=>[])
    const typeObject = useState('typeObject', () => '')
    const quantityRoom = useState('quantityRoom',()=>[])
    const priceFrom = useState('priceFrom',()=>'')
    const priceTo = useState('priceTo',()=>'')
     
    return{
        priceFrom,
        priceTo,
        quantityRoom,
        formData,
        dataFormBack,
        isUpload,
        city,
        direction,
        rotation,
        responce,
        announData,
        showAnnouns,
        AnnounOgj,
        images,
        avatar,
        typeObject
    }
}