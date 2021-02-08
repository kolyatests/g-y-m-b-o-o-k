<template>

    <div class="row content-main ">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header text-center ">
                    <div class="btn btn-outline-danger btn-lg btn-block" @click.prevent="gymEndOk()" style='cursor: pointer;'>
                        <h4 id="100">{{GYMSTART.end_save_100}}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-body  text-center mb-4"><h5 id="103">{{GYMSTART.activity_days_id3_103}}</h5></div>
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-4">
                                <div class="col-2 d-none d-md-block">
                                </div>
                                <div class="col-md-10">
                                    <cart-component/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3" v-show="GYMSTART.see">
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{GYMSTART.comment_101}}:</span>
                        </div>
                        <input type="text" class="form-control" placeholder="о подходе" name="comment" maxlength="40"
                               v-model="desc_about_set_108" :disabled='!GYMSTARTCART.offlInput'>
                    </div>
                    <div class="row " v-show="GYMSTART.see">
                        <div class="input-group col-lg-6 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{GYMSTARTCART.gympovt109}}:</span>
                            </div>
                            <input type="number" class="form-control" name="repmin" maxlength="3"
                                   v-model="rep_min110" placeholder="0,00" min="0" max="300" step="0.01" :disabled='!GYMSTARTCART.offlInput'>
                        </div>
                        <div class="input-group  col-lg-6 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{GYMSTARTCART.gymkg111}}:</span>
                            </div>
                            <input type="number" class="form-control" name="comment" maxlength="5"
                                   v-model="kg_km112" placeholder="0,00" min="0" max="300" step="0.01" :disabled='!GYMSTARTCART.offlInput'>
                        </div>
                    </div>
                    <div class="row" v-show="GYMSTART.see">
                        <div class="col-lg-6" style='cursor: pointer;'>
                            <a class="btn btn-outline-secondary btn-block  mb-3 btn-lg" @click.prevent="gymExeOk()">
                                <h5 id="113">{{GYMSTART.save_set_113}}</h5>
                            </a>
                        </div>
                        <div class="col-lg-6" style='cursor: pointer;'>
                            <a class="btn btn-outline-secondary btn-block  mb-3 btn-lg" @click.prevent="gymAddSet()">
                                <h5 id="114">{{GYMSTART.add_set_114}}</h5>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" v-show="GYMSTART.check" @click.prevent="gymEndExe(GYMSTARTCART.ex)" style='cursor: pointer;'>
                            <a class="btn btn-outline-danger btn-block  mb-3 btn-lg" >
                                <h5 id="115">{{GYMSTART.ex_done_115}}</h5>
                            </a>
                        </div>
                    </div>
                    <gymmini-component/>
                    <div class="card card-body  text-center mb-3"><h5>Результаты</h5></div>
                    <result-component/>
                    <br><br>

                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    export default {
        data() {
            return {

                desc_about_set_108: '',
                rep_min110: 0,
                kg_km112: 0,

            }
        },
        computed:
            mapGetters([
                'GYMSTART',
                'OFFINPUT',
                'OFFSAVE',
                'EDIT',
                'GYMSTARTCART',


            ])
        ,
        watch:{
            EDIT(){
                this.desc_about_set_108=this.EDIT.comment;
                this.rep_min110=this.EDIT.rep_min;
                this.kg_km112=this.EDIT.kg_km;
            },

        },
        methods: {
            ...mapActions([
                'GET_GYMSTARTCART_FROM_API',
                'GET_GYMSTART_FROM_API',
                'GET_GYMMINI_FROM_API',
                'SET_GYMENDEXE',
                'SET_GYMADDSET',
                'SET_GYMEXEOK',
                'GET_GYMSET_FROM_API',
                'SET_GYMENDOK',
            ]),
            gymEndExe() {
                this.SET_GYMENDEXE(this.GYMSTARTCART.ex)
            },

            gymAddSet() {
                //console.table('gymAddSet')

                this.SET_GYMADDSET()

                //this.vuex = (JSON.stringify(localStorage.vuex));
            },
            gymEndOk() {


                this.SET_GYMENDOK()

            },



            gymExeOk() {
                // let ar=[
                //       $comment= this.desc_about_set_108,
                //       $repmin=this.rep_min110,
                //      $kgkm= this.kg_km112,
                //
                // ];
                let set = Math.floor(Math.random() * 1000000)//должно быть произв неповтор число
                let obj = {

                    comment: this.desc_about_set_108,
                    rep_min: this.rep_min110,
                    kg_km: this.kg_km112,
                    set: set,
                    gym_set_up_true:false,
                    gym_set_edit_true: true,
                    gym_set_on_true: true,
                    gym_set_del_true: true,

                    on: false,
                    on_div: 'card card-body bgFFFFFFwhite',
                    up: false,
                    edit: false,
                    del: false,
                    add: false,

                }
                // desc: this.desc_about_train_102,

                this.SET_GYMEXEOK(obj)
                this.desc_about_set_108 = '',
                    this.rep_min110 = 0,
                    this.kg_km112 = 0
            }
        },
        mounted() {

            if (localStorage.vuex===null || localStorage.hasOwnProperty('vuex')===false ||localStorage.vuex==="null") {
                //console.table(this.$store.state.post)
                this.GET_GYMSTART_FROM_API()//массив с данными для начала тренировки
            }else{
                this.vuex = (JSON.stringify(localStorage.vuex));
            }

            mapGetters([
                'GYMSTART'
            ])

        }
    }
</script>

