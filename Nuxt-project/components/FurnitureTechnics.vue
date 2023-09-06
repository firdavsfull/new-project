<template>
       <form class="layouts">
            <div class="container-xl mt-4">
                <div class="progress-container container">
                    <div class="d-flex justify-content-between mb-2 mt-3">
                        <span class="fw-bold pt-1 2">Мебель и техника</span>
                        <button class="btn btn-none fs-5 p-0 m-0 text-primary me-2">
                            <font-awesome-icon :icon="['fas', 'circle-question']" />
                        </button>
                    </div>

                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="container-sm">
                    <div class="text-container" style="font-weight:normal; color:#152242;">
                        <span>В квартире есть </span>
                    </div>
                    <div class="container w-100">
                        <div class="col mt-4" style="color:#152242;">

                             <div class="row mt-2">
                                <div class="preview-window">
                                    <div class="balcon w-25 mt-3" >
                                        <span for="#balcon" class="mb-2 fw-bold text-nowrap" style="font-family:lato, sans-seif">мебель</span>
                                        <div class="d-flex text-nowrap mt-2" style="font-family:lato, sans-serif;">
                                            <label for="checkbox-1" class="me-2">
                                                <input :checked="cheks == false" data-name="Без мебели" @change="chooseFurniture" type="checkbox" id="checkbox-1" class="d-none">
                                                <span class="form-control">Без мебели</span>
                                            </label>

                                            <label for="checkbox-2" class="me-2">
                                                <input :checked="chek" data-name="На кухне" @change="chooseFurniture" type="checkbox" id="checkbox-2" class="d-none">
                                                <span class="form-control">На кухне</span>
                                            </label>

                                            <label for="checkbox3">
                                                <input :checked="chek" data-name="В комнатах" @change="chooseFurniture" type="checkbox" id="checkbox3" class="d-none">
                                                <span class="form-control">В комнатах</span>
                                            </label>
                                        </div>   
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="contrainer-balconies">
                                    <div class="balcon">
                                        <p for="#balcon" class="mb-1 mt-2 fw-bold" style="font-family:lato, sans-seif">Ванная комната</p>
                                        

                                        <div class="d-flex text-nowrap mt-2" style="font-family:lato, sans-serif;">
                                            <label for="checkbox-4" class="me-2">
                                                <input type="checkbox" id="checkbox-4" class="d-none">
                                                <span class="form-control">Ванна</span>
                                            </label>

                                            <label for="checkbox-5" class="me-2">
                                                <input type="checkbox" id="checkbox-5" class="d-none">
                                                <span class="form-control">Душевая кабина</span>
                                            </label>

                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="contrainer-balconies  ">
                                    <div class="balcon ">
                                        <p for="#balcon" class="mb-1 mt-2 fw-bold" style="font-family:lato, sans-seif">Техника</p>
                                        

                                        <div class="container-repair  flex-wrap d-flex text-nowrap">
                                            <input type="checkbox" class="btn-check" name="options" id="option5" autocomplete="off">
                                            <label class="form-control me-2 my-1" for="option5">Кондиционер</label>

                                            <input type="checkbox" class="btn-check" name="options" id="option6" autocomplete="off">
                                            <label class="form-control me-2 my-1" for="option6">Холодильник</label>

                                            <input type="checkbox" class="btn-check" name="options" id="option7" autocomplete="off" >
                                            <label class="form-control me-2 my-1" for="option7">Телевизор</label>

                                            <input type="checkbox" class="btn-check" name="options" id="option8" autocomplete="off">
                                            <label class="form-control my-1" for="option8">Посудомоечная машина</label>

                                            <input type="checkbox" class="btn-check" name="options" id="option9" autocomplete="off">
                                            <label class="form-control my-1" for="option9">Стиральная маншина</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="contrainer-balconies  ">
                                    <div class="balcon">
                                        <p for="#balcon" class="mb-1 mt-2 fw-bold" style="font-family:lato, sans-seif">Связь</p>
                                        

                                        <div class="container-repair  flex-wrap d-flex text-nowrap">
                                            <input type="checkbox" class="btn-check" name="options" id="option10" autocomplete="off">
                                            <label class="form-control me-2 my-1" for="option10">Интернет</label>

                                            <input type="checkbox" class="btn-check" name="options" id="option11" autocomplete="off">
                                            <label class="form-control me-2 my-1" for="option11">Телефон</label>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-4 mb-2 d-flex justify-content-end mx-1 ">
                        <next-btn class="px-4 mx-4 btn btn-light mx-4 text-primary" @click.prevent="navigateTo('/feature')">Назад</next-btn>
                        <next-btn class="px-4 btn  btn-primary" @click.prevent="navigateTo('/description')">Далее</next-btn>
                    </div>
                </div>
            </div>
        </form>
        
</template>
<script setup>

const {announData} = getData()
const facilities = ref({})
const cheks = ref('')
function chooseFurniture(event){
    cheks.value = true 
    if(event.target.dataset.name == 'Без мебели'){
        cheks.value = false
    }
}

function next(){
    navigateTo('/feature')
}
function prew(){
    navigateTo('/pictures')
}

function change(){
    const file =  document.querySelector('.choose-picture > input')
    file.click()
}
</script>

<style scoped>
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
        color: #152242;
    }

.container-repair{
    width: 100vw;
    display: flex;
    flex-wrap: nowrap;
    }


}

@media screen and (min-width:640px){
    .container-btn{
            display: flex;
            justify-content: end;
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

    .text-container{
        margin-top: 0px;
    }
    .text-container > span{
        font-weight: 700;
        line-height: 24px;
    }  

    .container-repair{
    width: max-content;
    flex-wrap: nowrap;
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
    width: 60%;
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