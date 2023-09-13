
<template>
       <form class="layouts">
            <div class="container-xl mt-4">
                <div class="progress-container container">
                    <div class="d-flex justify-content-between mb-2 mt-3">
                        <span class="fw-bold pt-1 2">Ценна и контакты</span>
                        <button class="btn btn-none fs-5 p-0 m-0 text-primary me-2">
                            <font-awesome-icon :icon="['fas', 'circle-question']" />
                        </button>
                    </div>

                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:95%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="container-sm ">
                    <div class="text-container " style="font-weight:normal; color:#152242;">
                        <span>Ценна и условия сделки </span>
                    </div>
                    <div class="container w-100">
                        <div class="group-container d-flex f-wrap flex-column mt-3">
                            <label for="price" style="font-size:14px;" class="mb-2">Аренда в месяц</label>
                            <div class="price-container d-flex align-items-center overflow-hidden form-control" style="width:250px; height:40px">
                                <input v-maska data-maska="# ### ###" @input="enterPrice" v-model="price" type="text" id="price"  style="border:none; outline:none;">
                                <div class="text-[20px] d-flex justify-center bg-[white] top-[-1px] items-center w-[15%] relative right-[-30px]"  >
                                    <span class="h-full flex leading-[40px]">c</span>
                                </div>
                            </div>

                                        <div class="balcon w-25 mt-3" >
                                            <span for="#balcon" class="mb-2  text-nowrap" style="font-family:lato, sans-seif">Условия проживания</span>
                                            <div class="d-flex text-nowrap mt-2" style="font-family:lato, sans-serif;">
                                                <label v-for="items of cond" :key="items.id" :for="items.id" class="me-2 ">
                                                    <input type="checkbox" :id="items.id" class="d-none">
                                                    <span class="form-control">{{ items.name }}</span>
                                                </label>

                                                <!-- <label for="checkbox2">
                                                    <input type="checkbox" id="checkbox2" class="d-none">
                                                    <span class="form-control">Можно с животными</span>
                                                </label> -->
                                            </div>   
                                        </div>

                                        <div class="balcon">
                                        <p for="#balcon" class="mb-1 mt-2 " style="font-family:lato, sans-seif">Срок аренды</p>
                                        

                                        <div class="container-repair  flex-wrap d-flex text-nowrap">
                                            <input type="radio" class="btn-check" name="options" id="option5" autocomplete="off">
                                            <label class="form-control me-2 my-1" for="option5">От года</label>

                                            <input type="radio" class="btn-check" name="options" id="option6" autocomplete="off">
                                            <label class="form-control me-2 my-1" for="option6">Несколько месяцев</label>
                                        </div>
                                    </div>
                        </div>
                            
                    </div>

                    <div class="container mt-4 mb-2 d-flex justify-content-end mx-1 ">
                        <next-btn class="px-4 mx-4 btn  btn-light text-primary" @click.prevent="navigateTo('/description')">Назад</next-btn>
                        <next-btn class="px-4 btn  btn-primary" @click.prevent="place">Разместить</next-btn>
                    </div>
                </div>
            </div>
        </form>
        
</template>
<script setup>

const {announData}= getData()

const priceObj = ref({})
const priceObj1 = ref({})
const price = ref()

function change(){
    const file =  document.querySelector('.choose-picture > input')
    file.click()
}

function enterPrice(){
    priceObj.price = price.value
}

function place(){
    const progress = document.querySelector('.progress > .progress-bar')
    progress.style.width = '100%'
}

const conditions = fetch('http://127.0.0.1:8000/api/conditions')
    const condition = await conditions
   const c = ref(await condition.json())  
const cond = ref(c.value.filter(item=>item.name == 'Можно с детьми' || item.name == 'Можно с животными'));
    console.log(cond.value);
</script>

<style scoped>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
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

    .text-container{
        margin-top: 16px;
        margin-left: 12px;
    }
    .text-container > span{
        font-weight: 500;
        font-size: 16px;
    }

.container-repair{
    width: max-content;
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
    font-family: Lato,Arial,sans-serif;
        
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

    .text-container{
        margin-top: 0px;
    }
    .text-container > span{
        font-weight: 700;
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
        padding: 20px;
        border-radius: 8px;
    }
}
label > span{
    cursor: pointer;
    border: 2px solid rgb(230, 230, 230);
}
label > input:checked + span{
    background-color: rgb(230, 230, 230);
    border: 2px solid #152242;
}

.container-repair{
    width: 100%;
}

.container-repair > .form-control{
    width: max-content;
    cursor: pointer;
    border: 2px solid rgb(230, 230, 230);
}

.container-repair input:checked + .form-control{
     background-color: rgb(230, 230, 230);
    border: 2px solid #152242;
}




</style>