<template>

    <div class="card card-body mb-3 " style='cursor: pointer;'>
        <div class="row">
            <div :class="gym.dir_mini" class="ml-2 mb-2"
                 @click.prevent="gymexenext(gym.ex)"
                 v-for="(gym,index) in GYMMINI" :key="index">

                <img class="" :src="'/storage/image/menu/menu_'+gym.ex+'.png'" width="72" height="72" alt=""/>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    export default {
        computed:
            mapGetters([
                 'GYMMINI'
            ]) ,

        methods: {
            ...mapActions([
                'SET_GYMEXENEXT',

            ]),
            gymexenext(exe) {
                this.SET_GYMEXENEXT(exe)
            },
        },

    }
</script>

<style scoped>

</style>
