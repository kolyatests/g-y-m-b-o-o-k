<template>


    <div>
        <div  :class="gym.on_div" v-for="(gym,index) in GYMSTARTCART.gym_set"  :key="index" class="mb-2">
            <div class="ramka ">
                <div class="ramka">
                    <h4>{{(index+1)+'#'+gym.rep_min+'X'+gym.kg_km+'   '+gym.comment}}</h4>
                </div>
                <div  v-show="gym.gym_set_on_true && GYMSTART.check" @click.prevent="gym_set_on(gym.set)" style = 'cursor: pointer;'>
                    <img src="/storage/image/icons8-tick-box-50.png" width="40" alt="" title="ok"/>
                </div>
                <div  v-show="gym.gym_set_up_true" @click.prevent="gym_set_up(gym.set)" style = 'cursor: pointer;'>
                    <img src="/storage/image/icons8-long-arrow-up-50.png" width="40" alt="" title="insert"/>
                </div>
                <div v-show="gym.gym_set_edit_true" @click.prevent="gym_set_edit(gym.set)" style = 'cursor: pointer;'>
                    <img src="/storage/image/icons8-inscription-50.png" width="40" alt="" title="edit"/>
                </div>
                <div  v-show="gym.gym_set_del_true" @click.prevent="gym_set_del(index)" style = 'cursor: pointer;'>
                    <img src="/storage/image/icons8-trash-50.png" width="40" alt="" title="delete"/>
                </div>

            </div>
        </div>
        <div class="card card-body" v-show="GYMSTARTCART.offlInput">
            <div class="ramka">
                <div >
                    <h4>#</h4>
                </div>
                <div class="" @click.prevent="gymDelSet()" style = 'cursor: pointer;'>
                    <img src="/storage/image/icons8-trash-50.png" width="40" alt="" title="delete"/>
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
            }
        },
        computed:
            mapGetters([
                'GYMADDSET',
                'GYMSET',
                'GYMSTART',
                'GYMSTARTCART',
            ]),
        methods: {
            ...mapActions([
                'SET_GYMDELSET',
                'SET_GYMSETON',
                'SET_GYMSETUP',
                'SET_GYMSETEDIT',
                'SET_GYMSETDEL',
            ]),
            gymDelSet() {

                this.SET_GYMDELSET()
            },
            gym_set_on(set) {
                this.SET_GYMSETON(set)
            },
            gym_set_up(set) {
                this.SET_GYMSETUP(set)
            },
            gym_set_edit(set) {
                this.SET_GYMSETEDIT(set)
            },
            gym_set_del(set) {
                this.SET_GYMSETDEL(set)
            },
        },
    }
</script>


