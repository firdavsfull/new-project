<template>
       <form class="layouts">
            <div class="container-xl mt-4">
                <div class="progress-container container">
                    <div class="d-flex justify-content-between mb-2 mt-2">
                        <span class="fw-bold pt-1">Особенности</span>
                        <button class="btn btn-none fs-5 p-0 m-0 text-primary me-2">
                            <font-awesome-icon :icon="['fas', 'circle-question']" />
                        </button>
                    </div>

                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="container-sm">
                    <div class="text-container " style="font-weight:normal; color:#152242;">
                        <span>Особенности квартиры </span>
                    </div>
                    <div class="container w-100">
                        <div class="col mt-4" style="color:#152242;">
                            <div class="row">
                                <div class="contrainer-balconies">
                                    <div class="balcon w-25 flex flex-col">
                                        <label for="#balcon" class="mb-2 fw-bold" style="font-family:lato, sans-seif">Балкон</label>
                                        
                                        <div class="dropdown">
                                                <button class="w-[100px] form-select text-left" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    нет
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="#">есть</a></li>
                                                    <li><a class="dropdown-item" href="#">нет</a></li>
                                                </ul>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>

                             <div class="row mt-2">
                                <div class="preview-window">
                                    <div class="balcon w-25 mt-3" >
                                        <span for="#balcon" class="mb-2 fw-bold text-nowrap" style="font-family:lato, sans-seif">Вид из окно</span>
                                        <div class="d-flex text-nowrap mt-2" style="font-family:lato, sans-serif;">
                                            <label for="checkbox-1" class="me-3">
                                                <input type="checkbox" id="checkbox-1" class="d-none">
                                                <span class="form-control">Во двор</span>
                                            </label>

                                            <label for="checkbox2">
                                                <input type="checkbox" id="checkbox2" class="d-none">
                                                <span class="form-control">На улица</span>
                                            </label>
                                        </div>   
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="contrainer-balconies">
                                    <div class="balcon">
                                        <p for="#balcon" class="mb-1 mt-2 fw-bold" style="font-family:lato, sans-seif">Ремонт</p>
                                        

                                        <div class="container-repair  flex-wrap d-flex text-nowrap">
                                            <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off">
                                            <label class="form-control me-2 my-1" for="option1">Без ремонта</label>

                                            <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                                            <label class="form-control me-2 my-1" for="option2">Косметический</label>

                                            <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off" >
                                            <label class="form-control me-2 my-1" for="option3">Евро</label>

                                            <input type="radio" class="btn-check" name="options" id="option4" autocomplete="off">
                                            <label class="form-control my-1" for="option4">Дизайнерксий</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="contrainer-balconies">
                                    <div class="balcon w-25">
                                        <label for="#balcon" class="mb-2 fw-bold" style="font-family:lato, sans-seif">Лифт</label>
                                        <div class="dropdown">
                                                <button class="w-[100px] form-select text-left" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    нет
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="#">есть</a></li>
                                                    <li><a class="dropdown-item" href="#">нет</a></li>
                                                </ul>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="contrainer-balconies  ">
                                    <div class="balcon">
                                        <p for="#balcon" class="mb-1 mt-2 fw-bold" style="font-family:lato, sans-seif">Парковка</p>
                                        

                                        <div class="container-repair  flex-wrap d-flex text-nowrap">
                                            <input type="radio" class="btn-check" name="options" id="option5" autocomplete="off">
                                            <label class="form-control me-2 my-1" for="option5">Наземная</label>

                                            <input type="radio" class="btn-check" name="options" id="option6" autocomplete="off">
                                            <label class="form-control me-2 my-1" for="option6">Многоуровневая</label>

                                            <input type="radio" class="btn-check" name="options" id="option7" autocomplete="off" >
                                            <label class="form-control me-2 my-1" for="option7">Подземная</label>

                                            <input type="radio" class="btn-check" name="options" id="option8" autocomplete="off">
                                            <label class="form-control my-1" for="option8">На крыше</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-4 mb-2 d-flex justify-content-end mx-1 ">
                        <next-btn class="px-4 mx-4 btn btn-light mx-4 text-primary" @click.prevent="navigateTo('/pictures')">Назад</next-btn>
                        <next-btn class="px-4 btn  btn-primary" @click.prevent="navigateTo('/technicsandfurniture')">Далее</next-btn>
                    </div>
                </div>
            </div>
        </form>
        
</template>
<script setup>
const {announData} = getData()
const aprtFeatures = ref({})

function change(){
    const file =  document.querySelector('.choose-picture > input')
    file.click()
}

function isBalcon(event){
    // event.target.children.item(0)
console.log(announData.value);
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
    }

.container-repair{
    width: max-content;
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