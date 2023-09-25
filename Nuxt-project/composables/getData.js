export default function getData(){
    const responce = useState('responce',()=>{})
    const announData = useState('announ',()=>[])
    const AnnounOgj = useState('AnnounOgj', ()=>{})
    const rotation = useState('rotaote', () => 0)
    const images = useState('images', () => []);
    const isUpload = useState('upload', () => false)
    const formData = useState('formData',()=>[])

    return{formData,isUpload, rotation,responce, announData, AnnounOgj, images}
}