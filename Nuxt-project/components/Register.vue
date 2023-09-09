<template>
  <div
    style="z-index: 150"
    class="fixed top-0 right-0 left-0 bottom-0 w-[100%] h-[100%] bg-black/50 flex justify-center items-center"
  >
    <div class="h-[max-content] p-[15px] w-[350px] bg-white relative flex-col">
      <div class="block h-[35px] flex items-center justify-end w-full relative">
        <font-awesome-icon
          @click="hideModal"
          class="text-[24px] h-full text-[#a1a7b3] font-thin absolute top-0 cursor-pointer"
          :icon="['fas', 'xmark']"
        />
      </div>
      <div
        style="font-family: Lato, Arial, sans-serif"
        class="w-full h-[max-content] mb-[24px] text-center mt-[20px] mx-[auto]"
      >
        <h3
          style="white-space: wrap"
          class="text-[#152242] text-[22px] font-bold"
        >
          Войти или<br />
          зарегистрировать
        </h3>
      </div>
      <form class="w-[80%] h-[max-content] flex flex-col mx-auto">
        <input
          v-maska
          data-maska="+(992) ##-###-##-##"
          v-model="tel.phone"
          class="form-control"
          type="text"
          placeholder="phone"
        />
        <button
          @click.prevent="createUser"
          :class="tel.phone.length >= 19 ? 'btn-primary text-white' : 'bg-light'"
          style="font-family: Lato, Arial, sans-serif"
          class="text-primary btn mt-[10px] flex align-items-center"
        >
          <span v-if="!loader">Получить код</span>
          <!-- <img src="" class="w-[32px] h-[32px]" alt=""> -->
          <!-- <span v-if="loader" class="spinner-border" style="color: white;"></span> -->
          <button v-if="loader" class="buttonload">
            <i class="fa fa-spinner fa-spin"></i>
          </button>
        </button>
        <button
          style="font-family: Lato, Arial, sans-serif"
          class="btn-light text-primary btn mt-[10px]"
        >
          Другим способом
        </button>
      </form>

      <div class="help w-[80%] flex justify-center mx-auto mt-[70px] mb-[20px]">
        <a
          style="font-family: Lato, Arial, sans-serif"
          href="#"
          class="no-underline text-[14px]"
          >Нужна помощь?</a
        >
      </div>
    </div>
  </div>
</template>

<style scoped>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
<script setup>
const loader = ref(false);
function hideModal() {
  const { showMadoal, active } = useSwitch();
  document.body.style.overflow = "scroll";
  tel.value = "";
  showMadoal.value = false;
}

const tel = ref({
  phone: "(992)",
});
async function createUser() {
  loader.value = true;
  if (tel.value.phone && tel.value.phone.length >= 9) {
    await fetch("http://127.0.0.1:8000/api/create_user", {
      method: "post",
      headers: {
        "Content-type": "application/json",
      },
      body: JSON.stringify({
        phone: tel.value.phone.replace(/[^0-9]/g, "").slice(3, 12),
      }),
    })
      .then((res) => {
        return res.json();
      })
      .then((res) => {
        const { responce } = getData();
        const { showMadoal } = useSwitch();
        showMadoal.value = false;
        responce.value = res;
        localStorage.setItem("owner", JSON.stringify(responce.value));
      });
  }
  tel.value.phone = "";
  loader.value = false;
}
</script>
<style scoped>
.lds-spinner {
  color: official;
  display: inline-block;
  position: relative;
  /* width: 10px;
  height: 10px; */
}
.lds-spinner div {
  position: relative;
  transform-origin: 40px 40px;
  animation: lds-spinner 1.2s linear infinite;
}
.lds-spinner div:after {
  content: "";
  display: block;
  position: absolute;
  top: 3px;
  left: 37px;
  width: 3px;
  height: 13px;
  border-radius: 20%;
  background: #fff;
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
</style>