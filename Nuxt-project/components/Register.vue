<template>
    <div style="z-index:150;" class="fixed top-0 right-0
     left-0 bottom-0 w-[100%]
     h-[100%] bg-black/50
     flex justify-center items-center
     ">
     <div class="h-[max-content] p-[15px] w-[350px] bg-white relative flex-col ">
            <div class="block h-[35px] flex items-center justify-end w-full relative">
                <font-awesome-icon @click="hideModal" class="text-[24px] h-full text-[#a1a7b3] font-thin absolute top-0 cursor-pointer" 
                :icon="['fas', 'xmark']" />
            </div>  
            <div style="font-family: Lato,Arial,sans-serif;" 
                class="
                w-full h-[max-content]
                mb-[24px] text-center
                mt-[20px]
                mx-[auto]">
                <h3 style="white-space: wrap;" class="
                text-[#152242]
                text-[22px]
                font-bold
            ">Войти или<br> зарегистрировать</h3>
            </div>
        <form class="w-[80%] h-[max-content] flex flex-col mx-auto">
            <input maxlength="9" v-model="tel.phone" class="form-control" type="tel" placeholder="+(992)">
            <button @click.prevent="createUser" :class ="tel.phone.length == 9 ? 'btn-primary text-white':'bg-light'"
            style="font-family: Lato,Arial,sans-serif;"
            class="text-primary btn mt-[10px] flex align-items-center">
            <span v-if="!loader" >Получить код</span>
            <font-awesome-icon v-if="loader" class="text-[20px] font-bold" :icon="['fa', 'spinner']" spin-pulse />
            </button>
            <button style="font-family: Lato,Arial,sans-serif; ;" 
            class="btn-light text-primary btn mt-[10px]">Другим способом</button>
        </form>

        <div class="help w-[80%] flex justify-center mx-auto mt-[70px] mb-[20px] ">
            <a style="font-family: Lato,Arial,sans-serif;" href="#" class="no-underline text-[14px]">Нужна помощь?</a>
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

const loader = ref(false)
const et = ref('_________')
    function hideModal(){
        const {showMadoal,active} = useSwitch()
        document.body.style.overflow ='scroll';
        tel.value = ''
        showMadoal.value = false
    }

    const tel = ref({
    phone:''
    })
   async function createUser(){
       loader.value = true
        if(tel.value.phone && tel.value.phone.length >= 9){
            await fetch('http://192.168.0.114:8000/api/create_user', {
            method: "post",
            headers: {
                "Content-type":'application/json'
            },
            body:  JSON.stringify({
                "phone": tel.value.phone,
            })
                
        }).then(res=> {
            return res.json()
        })
        .then(res => {
            const {responce} = getData()
            const {showMadoal} = useSwitch()
            showMadoal.value = false
            responce.value = res
            localStorage.setItem('owner',JSON.stringify(responce.value))
        })
        }
        tel.value.phone = ''
        loader.value = false

    }
</script>
