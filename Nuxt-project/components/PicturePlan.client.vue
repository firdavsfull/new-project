
<template>
    <main class="layouts">
         <div class="container-xl mt-4">
             <div class="progress-container">
                 <div class="d-flex justify-content-between mb-2 mt-3">
                     <span class="fw-bold pt-1 2">Фотография и планировка</span>
                     <button class="btn btn-none fs-5 p-0 m-0 text-primary me-2">
                         <font-awesome-icon :icon="['fas', 'circle-question']" />
                     </button>
                 </div>

                 <div class="progress">
                     <div class="progress-bar" role="progressbar" style="width:30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
             </div>
        <div class="rounded-[15px] mx-[auto] my-[10px] sm:max-w-[95%] max-w-[95%] lg:max-w-[70%] lg:shadow-2xl">
            <div  class="mx-[20px] mt-[10px] h-[auto]">
                <div style="margin-top:10px;" v-if="announData[0].objects == 'Квартира' || announData[0].objects == 'Комната'" class="text-container">
                    <span>Параметры Квартиры </span>
                </div>
             <div v-if="announData[0].objects == 'Квартира' || announData[0].objects == 'Комната'" class="quantity-room-container">
                 <p>Количество Комнат</p>
                 <div class="quantity-room">
                     <label class="quantity-room-item" for="1">
                         <input :checked="apartmentParams.quantityRoom == 1" @change="quantityRoom" data-name="1" name="radioInput" type="radio" id="1">
                         <span :style="!apartmentParams.quantityRoom ?'border:1px solid red;':''" class="form-control">1</span>
                     </label>
                     <label class="quantity-room-item" for="2">
                         <input :checked="apartmentParams.quantityRoom == 2" @change="quantityRoom" data-name="2" name="radioInput" type="radio"  id="2">
                         <span :style="!apartmentParams.quantityRoom ?'border:1px solid red;':''" class="form-control">2</span>
                     </label>
                     <label class="quantity-room-item" for="3">
                         <input :checked="apartmentParams.quantityRoom == 3" @change="quantityRoom" data-name="3" name="radioInput" type="radio"  id="3">
                         <span :style="!apartmentParams.quantityRoom ?'border:1px solid red;':''" class="form-control">3</span>
                     </label>
                     <label class="quantity-room-item" for="4">
                         <input :checked="apartmentParams.quantityRoom == 4" @change="quantityRoom" data-name="4" name="radioInput" type="radio"  id="4">
                         <span :style="!apartmentParams.quantityRoom ?'border:1px solid red;':''" class="form-control">4</span>
                     </label>
                     <label class="quantity-room-item" for="5">
                         <input :checked="apartmentParams.quantityRoom == 5" @change="quantityRoom" data-name="5" name="radioInput" type="radio"  id="5">
                         <span :style="!apartmentParams.quantityRoom ?'border:1px solid red;':''" class="form-control">5</span>
                     </label>
                 </div>
             </div>

             <div v-if="announData[0].objects == 'Квартира' || announData[0].objects == 'Комната'" class="area-room-container">
                 <div class="area-room">
                    <div class="room">
                     <p>  Общая площадь</p>
                     <div style="flex-direction:column;" class="relative">

                     <div :style="!apartmentParams.generalArea ?'border:1px solid red;':''" class="input-area form-control">
                         <input @input="verfied" v-model="apartmentParams.generalArea" type="text" v-maska
                            data-maska="####">
                         <div>м<sup class="text-[10px]">2</sup></div>
                     </div>
                    <p style="font-size:11px;" 
                    v-if="mooreArea"
                    class="
                    overflow-hidden
                    whitespace-nowrap
                    leading-[15px] text-[red] font-normal lg:relative md:relative md:left-0 absolute sm:relative sm:left-0 top-[4px] lg:left-0 left-[50%]">Общая площадь должна быть 
                         <br>больше жилой + кухни
                     </p>
                     </div>
                    </div> 
                     

                    <div v-if="announData[0].objects == 'Квартира' || announData[0].objects == 'Комната'" class="room">
                     
                     <p>Жилая площадь</p>
                     <div :style="!apartmentParams.liveArea ?'border:1px solid red;':''" class="input-area form-control">
                         <input @input="verfied" v-model="apartmentParams.liveArea" type="text" v-maska data-maska="####">
                         <div>м<sup class="text-[10px]">2</sup></div>
                     </div>
                    </div>
                 </div>
             </div>
             <div v-if="announData[0].objects == 'Квартира' || announData[0].objects == 'Комната'" class="area-room-container mt-5">
                 <div class="area-room">
                     <div class="room">
                     <p>Кухня</p>
                     <div :style="!apartmentParams.kitchenArea ?'border:1px solid red;':''" class="input-area form-control">
                         <input @input="verfied" v-model="apartmentParams.kitchenArea" type="text" v-maska data-maska="####">
                         <div>м<sup class="text-[10px]">2</sup></div>
                     </div>
                    </div>
                 </div>
             </div>

                <form id="forms" enctype="multipart/form-data" class="picture-room-container" :style="announData[0].objects == 'Квартира' || announData[0].objects !== 'Комната'? 'margin-top: 80px;' : ''">
                 <span>Фото и планировка - от 5 и больше</span>
                    <div class="picture-room">
                        <div>
                            <font-awesome-icon style="color:darkgray;" :icon="['fas', 'camera']" />
                        </div>
                            <p>На фото не должно быть людей, животных,
                                алкоголя, табака, оружия. Не добавляйте
                                чужие фото, картинки с водяными знаками
                                и рекламу.
                            </p>  
                    </div>
                    <div class="choose-picture">
                        <button v-if="!images.length" @click.prevent='change'  style="background-color:rgba(15,72,157,.1); color:#0468ff;" class="btn w-100  fw-bold font-monospace">Выберите файлы</button>
                        <input @change.prevent="sendPictures" name="images[]" type="file" accept=".png, .jpeg, .jpg" multiple style="display:none;" id="">
                    </div>

                    <div class="flex justify-center overflow-hidden md:mx-[auto] mt-[10px]  w-[100%] min-h-[50px] rounded-[13px] border">
                        <div class="w-full p-[10px] sm:mx-[auto] mx-[auto] flex flex-wrap justify-start " style="flex-basis: 100%;">
                            <div draggable="true" v-for="img of images" :key="img" class="relative flex responsive m-[10px] w-[48%] h-[150px] sm:h-[170px] sm:w-[250px] sm:h-[170px] md:w-[200px] md:h-[120px] lg:min-w-[180px] lg:h-[120px]  overflow-hidden rounded">
                                <div @click="removeImg(img, images)" class="absolute overflow-hidden right-[10px] top-[-10px]  text-[white] text-shadow text-[30px]">&times;</div>
                                <img  class="left-[0] w-full h-full" :src="`http://192.168.0.114:8000/api/image/${img.large}`" :alt="img">
                                </div>
                                <div v-if="imageLoader" class="w-[100%] flex justify-center ">
                                    <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
                                </div>
                            </div>
                            <div @click.prevent="change" v-if="images.length" class="border border-[blue] relative justify-center flex m-[10px] w-[48%] h-[150px] sm:h-[170px] sm:w-[125px] sm:h-[85px] md:w-[200px] md:h-[120px] lg:min-w-[180px] lg:h-[120px] rounded">
                                
                            </div>
                        </div>
                    
                 </div>
                </form>

             <div class="video-link-container">
                 <div style="margin-top:24px;">
                     <div style="display:inline;">
                         <span>Видео</span>
                     </div>
                 </div>
             </div>
             <div class="container-input-link">
                 <div style="flex-basis:280px; margin-top:16px">
                     <label for="link-video">
                         Ссылка на Youtube
                     </label>
                     <textarea v-model="apartmentParams.linkvideo" class="font-monospace"  id="link-video" rows="1" placeholder="https://"></textarea>
                 </div>
             </div>
             <div class="container mt-4 mb-2 d-flex justify-content-end mx-1">
             <next-btn class="btn btn-light text-primary px-4 mx-4" @click.prevent="prew">Назад</next-btn>    
             <next-btn class="btn btn-primary px-4" @click.prevent="next" >Далее</next-btn>
             </div>
             
         </div>
         </div>
        </div>
         
        </main>
</template>

<script setup>


const {announData} = getData()
const apartmentParams = ref({})
const apartmentParams1 = ref({})
const mooreArea = ref(false)
const generalArea = ref('')
const liveArea = ref('')
const kitchenArea = ref('')
const videoLink = ref('')


function quantityRoom (event){
 apartmentParams.value.quantityRoom = parseInt(event.target.dataset.name)
}

function verfied(){
        if (
            parseInt(apartmentParams.value.liveArea) 
            + parseInt(apartmentParams.value.kitchenArea) 
            > parseInt(apartmentParams.value.generalArea)
            || parseInt(apartmentParams.value.generalArea) 
            < parseInt(apartmentParams.value.kitchenArea)
            || parseInt(apartmentParams.value.liveArea) 
            > parseInt(apartmentParams.value.generalArea) 
            ) {
            mooreArea.value = true
        }else {
            mooreArea.value = false
        }
    }

function next(){
 announData.value[0] = JSON.parse(localStorage.getItem('announ'))[0]
 announData.value[1] = JSON.parse(localStorage.getItem('announ'))[1]
 announData.value[2] = apartmentParams.value
 localStorage.setItem('announ', JSON.stringify(announData.value))
 

 if (announData.value[0].objects == 'Участок') {
    navigateTo('/technicsandfurniture')
 }else{
    navigateTo('/feature')
 }

 if (parseInt(apartmentParams.value.liveArea) + parseInt(apartmentParams.value.kitchenArea) > parseInt(apartmentParams.value.generalArea)) {
    navigateTo('/pictures')
    announData.value[2] = ''
    localStorage.setItem('announ', JSON.stringify(announData.value))
 }
}
function prew(){
 navigateTo('/map')
}


onMounted(()=>{
    announData.value[0] = JSON.parse(localStorage.getItem('announ'))[0]
 if (JSON.parse(localStorage.getItem('announ'))[2]) {
     apartmentParams.value = JSON.parse(localStorage.getItem('announ'))[2];
 }else{
     apartmentParams.value = apartmentParams1.value
 }

 
})

function change(event){
 const file =  document.querySelector('.choose-picture > input')
 file.click()
}
    const pictures = ref([])
    const images = ref(JSON.parse(localStorage.getItem('images')) || []) 
    const imageLoader = ref(false)
async function sendPictures(event){
 const file =  document.querySelector('.choose-picture > input')
 

   
 
}


function removeImg(img,picture){
    picture.splice(picture.indexOf(img),1)
    localStorage.setItem('images',JSON.stringify(picture))
}
</script>

<style scoped>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
-webkit-appearance: none;
margin: 0;
}

.lds-spinner {
  color: official;
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-spinner div {
  transform-origin: 40px 40px;
  animation: lds-spinner 1.2s linear infinite;
}
.lds-spinner div:after {
  content: " ";
  display: block;
  position: absolute;
  top: 3px;
  left: 37px;
  width: 6px;
  height: 18px;
  border-radius: 20%;
  background: #006cfd;
}
.lds-spinner div:nth-child(1) {
  transform: rotate(0deg);
  animation-delay: -1.1s;
}
.lds-spinner div:nth-child(2) {
  transform: rotate(30deg);
  animation-delay: -1s;
}
.lds-spinner div:nth-child(3) {
  transform: rotate(60deg);
  animation-delay: -0.9s;
}
.lds-spinner div:nth-child(4) {
  transform: rotate(90deg);
  animation-delay: -0.8s;
}
.lds-spinner div:nth-child(5) {
  transform: rotate(120deg);
  animation-delay: -0.7s;
}
.lds-spinner div:nth-child(6) {
  transform: rotate(150deg);
  animation-delay: -0.6s;
}
.lds-spinner div:nth-child(7) {
  transform: rotate(180deg);
  animation-delay: -0.5s;
}
.lds-spinner div:nth-child(8) {
  transform: rotate(210deg);
  animation-delay: -0.4s;
}
.lds-spinner div:nth-child(9) {
  transform: rotate(240deg);
  animation-delay: -0.3s;
}
.lds-spinner div:nth-child(10) {
  transform: rotate(270deg);
  animation-delay: -0.2s;
}
.lds-spinner div:nth-child(11) {
  transform: rotate(300deg);
  animation-delay: -0.1s;
}
.lds-spinner div:nth-child(12) {
  transform: rotate(330deg);
  animation-delay: 0s;
}
@keyframes lds-spinner {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}


@media screen and (max-width:420px) {
    .responsive{
        width: 100%;
        height: 200px;
    }
}
@media screen and (min-width:320px) {
    
 .progress{
     height: 7px;
     background-color: rgba(138, 187, 218, 0.24);
 }
 /* .progress-container{
     padding: 0 20px;
 } */
 .progress-bar{
     background-image: linear-gradient(to right, #ffe1ff ,#006cfd 99.9%,#006cfd );
     border-top-right-radius: 5px;
     border-bottom-right-radius: 5px;

 }

 .text-container > span{
     font-weight: 700;
     font-size: 16px;
 }
 
 .quantity-room-container{
     width: 100%;
     margin-top: 32px;
 }
 .quantity-room-container > p{
     font-size: 14px;
 }
 .quantity-room{
     display: flex;
     width: 35%;
     /* max-width: 50%; */
     /* width: 43%; */
     justify-content: space-between;
     background-color: #fff;
 }
 .quantity-room >label > input{
     display: none;
 }

 .quantity-room >label > input:checked + span{
     border-color: #006cfd;
     background-color: rgba(192, 192, 192, 0.39);
 }
 .quantity-room-item{
     margin-right: 10px;
 }

 .area-room-container{
     margin-top: 32px;
     width: 100%;
     height: 90px;
 }
 .area-room{
     display: flex;
     width: 80%;
     height: 100%;
     flex-direction: column;
     justify-content: space-between;
 }

.room > p{
 font-size: 14px;
 margin-bottom: 5px;
 }

.input-area{
 display: flex;
 width: 45%;
 justify-content: space-between;
}

 .input-area > input{
     border: none;
     outline: none;
     width: 85px;

 }
 .input-area > button{
     border: none;
     outline: none;
     background: none;
 }
 .input-area > button > sup{
     font-size: 10px;
 }

 .picture-room-container{
     display: flex;
     width: 100%;
     flex-direction: column;
 }
 .picture-room-container > span{
     font-size: 16px;
     font-family: lato, sans-serif;
     letter-spacing: -0.2;
     font-weight: 700;
     line-height: 24px;
 }
 .picture-room{
     display: flex;
     align-items: center;
 }
 .picture-room > p {
     margin-top: 10px;
     width: 35%;
     margin-left: 15px;
     font-size: 12px;
     height: max-content;
 }
 .video-link-container{
     display: flex;
     min-width: 100%;
 }
 .video-link-container  span{
     letter-spacing: -0.2px;
     font-weight: 700;
     line-height: 24px;
     font-size: 16px;
     font-style: normal;
     font-stretch: normal;
 }
 .container-input-link{
     display: flex;
     max-width: 100%;

 }
 .container-input-link label{
     display: block;
     margin-bottom: 6px;
     color: #152242;
     font-size: 14px;
     line-height: 20px;
 }
 .container-input-link textarea{
     height: 40px;
     overflow: hidden;
     color: #152242;
     padding: 8px 12px;
     font-size: 16px;
     font-family: monospace;
     line-height: 24px;
     border: 1px solid #ced1d7;
     outline: none;
     width: 100%;
     resize: none;
     border-radius: 4px;
 }
 .container-sm{
     margin-top: 20px;
 }
}

@media screen and (min-width:640px){
 .container-btn{
         display: flex;
         justify-content: flex-end;
     }
 .layouts{
     display: flex;
     flex-direction: column;
     margin: 0;
     justify-content: center;
     font-family: Lato, sans-serif;
 }
 .container-xl{
     height: max-content;
     display: flex;
     flex-direction: column;
 }
 .progress{
     height: 7px;
     background-color: rgba(138, 187, 218, 0.24);
 }
 /* .progress-container{
     padding: 0 20px;
 } */
 .progress-bar{
     background-image: linear-gradient(to right, #ffe1ff ,#006cfd 99.9%,#006cfd );
     border-top-right-radius: 5px;
     border-bottom-right-radius: 5px;

 }

 
 .text-container > span{
     font-weight: 700;
 }
 
 .quantity-room-container{
     width: 100%;
     margin-top: 32px;
 }
 .quantity-room-container > p{
     font-size: 14px;
 }
 .quantity-room{
     display: flex;
     max-width: 100px;
     /* justify-content: space-between; */
     background-color: #fff;
 }
 .quantity-room > label > input{
     display: none;
 }

 .quantity-room >label > input:checked + span{
     border-color: #006cfd;
     background-color: rgba(192, 192, 192, 0.39);
 }
 

 .area-room-container{
     margin-top: 32px;
     width: 100%;
     height: 90px;
 }
 .area-room{
     display: flex;
     width: 80%;
     height: 100%;
     flex-direction: row;
     justify-content: space-between;
 }

.room > p{
 font-size: 14px;
 margin-bottom: 5px;
 }

.input-area{
 display: flex;
 width: 50%;
 justify-content: space-between;
}

 .input-area > input{
     border: none;
     outline: none;
     width: 70%;

 }
 .input-area > button{
     border: none;
     outline: none;
     background: none;
 }
 .input-area > button > sup{
     font-size: 10px;
 }

 .picture-room-container{
     display: flex;
     width: 100%;
     flex-direction: column;
 }
 .picture-room-container > span{
     font-size: 16px;
     font-family: lato, sans-serif;
     letter-spacing: -0.2;
     font-weight: 700;
     line-height: 24px;
 }
 .picture-room{
     display: flex;
     align-items: center;
 }
 .picture-room > p {
     margin-top: 10px;
     width: 35%;
     margin-left: 15px;
     font-size: 12px;
     height: max-content;
 }
 .video-link-container{
     display: flex;
     min-width: 100%;
 }
 .video-link-container  span{
     letter-spacing: -0.2px;
     font-weight: 700;
     line-height: 24px;
     font-size: 16px;
     font-style: normal;
     font-stretch: normal;
 }
 .container-input-link{
     display: flex;
     max-width: 100%;

 }
 .container-input-link label{
     display: block;
     margin-bottom: 6px;
     color: #152242;
     font-size: 14px;
     line-height: 20px;
 }
 .container-input-link textarea{
     height: 40px;
     overflow: hidden;
     color: #152242;
     padding: 8px 12px;
     font-size: 16px;
     font-family: monospace;
     line-height: 24px;
     border: 1px solid #ced1d7;
     outline: none;
     width: 100%;
     resize: none;
     border-radius: 4px;
 }
}

 .progress{
     height: 7px;
 }
 .progress-bar{
     background-image: linear-gradient(to right, #ffe1ff ,#006cfd 99.9%,#006cfd );
     border-top-right-radius: 5px;
     border-bottom-right-radius: 5px;

 }
 .progress-container{
     padding: 0 20px;
 }
@media screen and (min-width: 1024px) {
 .progress-container{
     width: 30%;
     padding: 15px;
 }
 .progress{
     height: 7px;
 }
     .container-xl{
     display: flex;
     max-width: 1300px;
     flex-direction: row;
     justify-content: space-between;
 }
 .justify-content-between > span{
     font-size: 14px;
 }
 .justify-content-between > button{
     display: none;
 }

  .container-sm{
     width: 67%;
     height: max-content;
     margin-top: 10px;
     margin-bottom: 20px;
     box-shadow: 0 0 30px rgba(0, 0, 0, 0.16);
     padding: 20px 35px;
     border-radius: 8px;
 }


 .quantity-room-container{
     width: 100%;
     margin-top: 32px;
 }
 .quantity-room-container > p{
     font-size: 14px;
 }
 .quantity-room{
     display: flex;
     /* min-width: 10%; */
     justify-content: space-between;
     background-color: #fff;
 }
 .quantity-room > label > input{
     display: none;
 }

 .quantity-room >label > input:checked + span{
     border-color: #006cfd;
     background-color: rgba(192, 192, 192, 0.39);
 }
 .quantity-room-item{
     margin-left: 0;
 }
 
}



</style>