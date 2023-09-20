<!-- :style="announData[0].objects == 'Квартира' || announData[0].objects !== 'Комната'? 'margin-top: 80px;' : ''" -->
<template>
  <form
    @change.prevent="saveImages"
    id="forms"
    enctype="multipart/form-data"
    class="picture-room-container"
  >
    <!-- <span>Фото и планировка - от 5 и больше</span> -->
    <div class="picture-room">
      <div>
        <font-awesome-icon style="color: darkgray" :icon="['fas', 'camera']" />
      </div>
      <p>Не добавляйте чужие фото, картинки с водяными знаками и рекламу.</p>
    </div>
    <div class="choose-picture">
      <button
        @click.prevent="change"
        style="background-color: rgba(15, 72, 157, 0.1); color: #0468ff"
        class="btn w-100 fw-bold font-monospace"
      >
        Выберите файлы
      </button>
      <input type="file" multiple style="display: none" id="input" />
    </div>

    <div
      class="flex justify-center overflow-hidden md:mx-[auto] mt-[10px] w-[100%] min-h-[50px] rounded-[13px] border"
    >
      <div
        class="w-full p-[10px] sm:mx-[auto] mx-[auto] flex flex-wrap justify-start"
        style="flex-basis: 100%"
      >
        <div
        v-for="(img, index) of pictures"
        :key="img.url"
          @dragend="handleDrop(img,pictures)"
          @dragleave="handleDragLeave(pictures)"
          @dragenter="handleDragEnter(pictures)"
          @dragstart="handleDragStart"
          draggable="true"
          id="images"
          class="relative flex responsive mx-[auto] m-[10px] w-[48%] h-[150px] sm:h-[170px] sm:w-[250px] sm:h-[170px] md:w-[200px] md:h-[120px] lg:min-w-[180px] lg:h-[120px] overflow-hidden rounded"
        >
          <div :data-id="index"
            @click="removeImg(img, pictures)"
            class="absolute overflow-hidden right-[10px] top-[-10px] cursor-pointer text-[white] text-shadow text-[30px]"
          >
            &times;
          </div>
          <img
            :data-id="index"
            class="left-[0] w-full h-full"
            :src="img.url"
            alt="img"
          />
        </div>
        <!-- <div v-if="imageLoader" class="w-[100%] flex justify-center">
          <div class="lds-spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div> -->
        <!-- <div
          @click.prevent="change"
          v-if="images.length"
          class="border border-[blue] relative justify-center flex m-[10px] w-[48%] h-[150px] sm:h-[170px] sm:w-[125px] sm:h-[85px] md:w-[200px] md:h-[120px] lg:min-w-[180px] lg:h-[120px] rounded"
        ></div> -->
      </div>
    </div>
  </form>
</template>
<script setup>
function change(event) {
  const file = document.querySelector(".choose-picture > input");
  file.click();
}
const pictures = ref([]);
const imageLoader = ref(false);
const formD = ref(new FormData());

function saveImages(e) {
  const files = e.target.files;
  for (let i = 0; i < files.length; i++) {
    formD.value.append("images[]", files[i]);
    const reader = new FileReader();
    reader.onload = (e) => {
      pictures.value.push({
        url: e.target.result,
        position: pictures.value.length,
        file: files[i],
      });
    };
    reader.readAsDataURL(files[i]);
  }
  setTimeout(() => {
    update_formdate();
  }, 50);
}

const update_formdate = () => {
  formD.value = new FormData()
  for (let i = 0; i < pictures.value.length; i++) {
    formD.value.append("images[]", pictures.value[i].file);
  }
};

function removeImg(img, picture) {
  picture.splice(picture.indexOf(img), 1);
}

let currentIndex = null;
let enterIndex = null;
function handleDragStart(e) {
  currentIndex = parseInt(e.target.dataset.id);
  e.dataTransfer.dropEffect = "move";
  e.dataTransfer.effectAllowed = "move";
  e.dataTransfer.setData("itemId", e.target.dataset.id);
}

function handleDragEnter(picture) {
  enterIndex = parseInt(event.target.dataset.id);
}
function handleDragLeave(picture) {
  
}

function handleDrop(img,picture) {
  
  event.dataTransfer.dropEffect = "move";
  const draggImage = picture[enterIndex];
  const pos = picture[enterIndex].position;

  if (currentIndex !== null) {
    // const index = parseInt(event.target.dataset.id);
    picture[enterIndex] =  picture[currentIndex]
    picture[currentIndex] = draggImage
    picture[enterIndex].position =  img.position
    picture[currentIndex].position = pos 
    console.log(picture);
    currentIndex = null;
    enterIndex = null;
  }
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
@media screen and (max-width: 420px) {
  .responsive {
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