<template>
    <div class="row content-main">
        <div class="col-lg-6 text-center" v-show="VISIBLE">
            <ramka1-component/>
            <br><br><br><br>
        </div>
        <div class="col-lg-6 text-center" v-show="VISIBLE">
            <aj-component/>
            <br><br><br><br>
        </div>
        <div class="col-lg-12" v-show="!VISIBLE">
            <exercise-component/>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";

    export default {
        name: "choiseComponent",
        data() {
            return {}
        },
        computed: {
            ...mapGetters([
                'VISIBLE'
            ])
        },
        mounted() {

        }
    }
</script>


<style scoped>

</style>
