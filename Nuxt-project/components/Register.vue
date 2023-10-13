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
          :class="tel.phone.length >= 19 ? 'bg-primary text-white py-[5px]' : 'bg-light'"
          style="font-family: Lato, Arial, sans-serif"
          class="mt-[10px] rounded-1 flex justify-center h-[40px] text-[rgba(13,110,253,1)] py-[6px] items-center"
        >
          <span v-if="!loader">Получить код</span> 
          <!-- <span v-if="loader" class="spinner-btn" style="color: white;">
            <span class="spinner"></span>
          </span> -->
          
          <div v-if="loader" class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
          </div>

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
const { responce,direction } = getData();
const { showMadoal,active } = useSwitch();
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
  if (tel.value.phone.length >= 19) {
    await fetch("http://192.168.100.45:8000:8000/api/create_user", {
      method: "post",
      headers: {
        "Content-type": "application/json",
      },
      body: JSON.stringify({
        phone: tel.value.phone.replace(/[^0-9]/g, "").slice(3, 12),
      }),
    })
      .then((res) => {
        if (res.ok) {
          window.location.replace(direction.value)
          active.value = false
        }
        return res.json();
      })
      .then((res) => {
        
        showMadoal.value = false;
        responce.value = res;
        localStorage.setItem("owner", JSON.stringify(responce.value));
      });
  }else{
    showMadoal.value = false
  }
  tel.value.phone = "";
  loader.value = false;
}
</script>
<style scoped>
.button {
  position: relative;
  padding: 8px 16px;
  background: #009579;
  border: none;
  outline: none;
  border-radius: 2px;
  cursor: pointer;
}

.button:active {
  background: #007a63;
}

.button__text {
  font: bold 20px "Quicksand", san-serif;
  color: #ffffff;
  transition: all 0.2s;
}

.button--loading .button__text {
  visibility: hidden;
  opacity: 0;
}

.button--loading::after {
  content: "";
  position: absolute;
  width: 16px;
  height: 16px;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  border: 4px solid transparent;
  border-top-color: #ffffff;
  border-radius: 50%;
  animation: button-loading-spinner 1s ease infinite;
}

@keyframes button-loading-spinner {
  from {
    transform: rotate(0turn);
  }

  to {
    transform: rotate(1turn);
  }
}




</style>