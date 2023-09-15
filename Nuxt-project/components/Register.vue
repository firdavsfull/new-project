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
          <span v-if="loader" class="spinner-btn" style="color: white;">
            <span class="spinner"></span>
          </span>
          
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
    await fetch("http://192.168.0.114:8000/api/create_user", {
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

        console.log(res);
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
.spinner-btn {
  position: relative;
  overflow: hidden;
  background-color: #0468ff;
  color: #fff;
  font-size: 16px;
  padding: 6px 20px;
  border: none;
  border-radius: 4px;
  cursor: not-allowed;
}

.spinner {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 30px;
  height: 30px;
  border: 1px solid transparent;
  border-top-color: #fff;
  border-radius: 50%;
  animation: spinner-rotate 1s linear infinite;
}

@keyframes spinner-rotate {
  0% {
    transform: translate(-50%, -50%) rotate(0deg);
  }
  100% {
    transform: translate(-50%, -50%) rotate(360deg);
  }
}

</style>