<!-- :style="announData[0].objects == 'Квартира' || announData[0].objects !== 'Комната'? 'margin-top: 80px;' : ''" -->
<template>
  <form id="forms" enctype="multipart/form-data" class="picture-room-container">
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

                    <div v-if="images.length" class="flex justify-center overflow-hidden md:mx-[auto] mt-[10px]  w-[100%] min-h-[50px] rounded-[13px] border">
                        <div class="w-full p-[10px] sm:mx-[auto] mx-[auto] flex flex-wrap justify-start " style="flex-basis: 100%;">
                            <div draggable="true" v-for="img of images" :key="img" class="relative flex responsive m-[10px] w-[48%] h-[150px] sm:h-[170px] sm:w-[250px] sm:h-[170px] md:w-[200px] md:h-[120px] lg:min-w-[180px] lg:h-[120px]  overflow-hidden rounded">
                                <div @click="removeImg(img, images)" class="absolute overflow-hidden right-[10px] top-[-10px] cursor-pointer text-[white] text-shadow text-[30px]">&times;</div>
                                <img  class="left-[0] w-full h-full" :src="`http://127.0.0.1:8000/api/image/${img.large}`" :alt="img">
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
</template>
<script setup>
function change(event){
 const file =  document.querySelector('.choose-picture > input')
 file.click()
}
    const pictures = ref([])
    const images = ref(JSON.parse(localStorage.getItem('images')) || []) 
    const imageLoader = ref(false)
async function sendPictures(event){
 const file =  document.querySelector('.choose-picture > input')
 const files = Array.from(file.files)
 if (!files.length) {
    return
 }
 const form = document.querySelector('#forms')
 const FormD = new FormData(form);
    FormD.append(`images[]`,files)

    imageLoader.value = true
   await fetch('http://127.0.0.1:8000/api/upload-image',{
    method:'post',
    body:FormD
   }).then(res=>{
    if (res.ok) {
        console.log('Картинки успешно отправлены на сервер');
    }else{
        console.log('Произошла ошибка при отправке картинок');
    }
    return res.json()
   })
   .then(r=>{
    r.forEach(file => {
       images.value.push(file)
       localStorage.setItem('images',JSON.stringify(images.value))
    });
    imageLoader.value = false
})
}

function removeImg(img,picture){
    picture.splice(picture.indexOf(img),1)
    localStorage.setItem('images',JSON.stringify(picture))
}
</script>

<style scoped>

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
@media screen and (min-width: 320px) {
  .picture-room-container {
    display: flex;
    width: 100%;
    flex-direction: column;
  }
  .picture-room-container > span {
    font-size: 16px;
    font-family: lato, sans-serif;
    letter-spacing: -0.2;
    font-weight: 700;
    line-height: 24px;
  }
  .picture-room {
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
}

@media screen and (min-width: 640px) {
  .picture-room-container {
    display: flex;
    width: 100%;
    flex-direction: column;
  }
  .picture-room-container > span {
    font-size: 16px;
    font-family: lato, sans-serif;
    letter-spacing: -0.2;
    font-weight: 700;
    line-height: 24px;
  }
  .picture-room {
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
}
</style>