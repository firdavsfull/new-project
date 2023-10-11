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
     
    return{
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
        avatar}
}