//import createPersistedState from 'vuex-persistedstate';

export default {
    //plugins: [createPersistedState()],


    state: {
        gymstart: [],//массив с данными для начала тренировки
        gymstartcart: [],///получение параметров какое упражнение сейчас
        gymmini: [],//массив с данными для упражнений мини
        edit: [],//редактирование в input
        editAp: false,//редактирование подхода
        set: 0,//с какого сета редактируем данные
    },

    mutations: {


        GYMSTART_CHANGE(state, gymstart) {//массив с данными для начала тренировки
            state.gymstart = gymstart
        },
        GYMSTARTCART_CHANGE(state, gymstartcart) {//массив с данными //получение параметров какое упражнение сейчас
            state.gymstartcart = gymstartcart

        },
        GYMMINI_CHANGE(state, gymmini) {//массив с данными для упражнений мини
            state.gymmini = gymmini
        },
        GYMMINI_FALSE(state, i) {// для упражнений мини уходим с этого упражнения
            if (state.gymmini[i].dir_mini === 'ramkagifis') {
                state.gymmini[i].dir_mini = 'ramkagifoff'
            }
            if (state.gymmini[i].dir_mini === 'ramkagifison') {
                state.gymmini[i].dir_mini = 'ramkagifon'
            }
        },
        GYMMINI_TRUE(state, i) {//для упражнений переходим на  это упражнение
            if (state.gymmini[i].dir_mini === 'ramkagifoff') {
                state.gymmini[i].dir_mini = 'ramkagifis'
            }
            if (state.gymmini[i].dir_mini === 'ramkagifon') {
                state.gymmini[i].dir_mini = 'ramkagifison'
            }
        },
        GYMSET_ON(state, [i, j]) {// сет выполнен--фон красный
            if (state.gymmini[i].gym_set[j].on === false) {

                state.gymmini[i].gym_set[j].on_div = 'card card-body bgF7BCBEred'
                state.gymmini[i].gym_set[j].on = true
                state.gymmini[i].gym_set[j].gym_set_edit_true = false

            } else {
                state.gymmini[i].gym_set[j].on_div = 'card card-body bgFFFFFFwhite'
                state.gymmini[i].gym_set[j].on = false
                state.gymmini[i].gym_set[j].gym_set_edit_true = true

            }
        },
        GYMSET_DEL(state, [i, j]) {// удаляем сет
            state.gymmini[i].gym_set.splice(j, 1)
        },
        GYMEX_OK(state, i) {// упражнение выполнено--фон красный

            if (state.gymmini[i].is_ok === false && state.gymmini[i].dir_mini === 'ramkagifis') {

                state.gymmini[i].dir_mini = 'ramkagifison'
                state.gymmini[i].is_ok = true//выполнено упражнение
            } else {
                state.gymmini[i].dir_mini = 'ramkagifis'
                state.gymmini[i].is_ok = false//не выполнено упражнение
            }
        },
        OFFINPUT_ON(state, i) {//показывыем добавить подход
            console.log('gymAddSet5')
            console.log(i)
            state.gymmini[i].offlInput = true
            state.gymstartcart.offlInput = true

        },
        OFFINPUT_OFF(state, i) {//прячем добавить подход
            state.gymmini[i].offlInput = false
            state.gymstartcart.offlInput = false
        },
        SAVE_SET(state, [obj, i]) {//добавить сет в упражнение

            state.gymmini[i].gym_set.push(obj);

        },

        UPDATE_SET(state, [obj, i]) {//обновляем сет в упражнение
            // console.log(state.set)
            for (var p = 0; p < this.getters.GYMMINI[i].gym_set.length; p++) {//пробегаем по всем сетам в этом упражнении
                if (state.gymmini[i].gym_set[p].set === state.set) {
                    state.gymmini[i].gym_set[p].comment = obj.comment;//вкл редактирование -выключаем кнопка вверх на всех сетах
                    state.gymmini[i].gym_set[p].kg_km = obj.kg_km;//
                    state.gymmini[i].gym_set[p].rep_min = obj.rep_min;//делаем фон везде на сетах белый

                    state.gymmini[i].gym_set[p].edit = false
                    state.gymmini[i].gym_set[p].on_div = 'card card-body bgFFFFFFwhite'//
                    state.gymmini[i].gym_set[p].gym_set_up_true = false//
                    for (var p = 0; p < this.getters.GYMMINI[i].gym_set.length; p++) {
                        state.gymmini[i].gym_set[p].gym_set_up_true = false;//вкл редактирование -выключаем кнопка вверх на всех сетах
                        state.gymmini[i].gym_set[p].gym_set_on_true = true;//
                        state.gymmini[i].gym_set[p].gym_set_del_true = true;//
                    }
                    state.editAp = false;

                }
            }

        },


        EDIT(state, [i, j]) {//редактирование в input переносим данные из сета в input
            if (state.gymmini[i].gym_set[j].edit === false) {
                state.edit = state.gymmini[i].gym_set[j]//закидываем значение сета в input
                for (var p = 0; p < this.getters.GYMMINI[i].gym_set.length; p++) {//пробегаем по всем сетам в этом упражнении
                    state.gymmini[i].gym_set[p].gym_set_up_true = false;//вкл редактирование -выключаем кнопка вверх на всех сетах
                    state.gymmini[i].gym_set[p].edit = false;//
                    if (state.gymmini[i].gym_set[p].on_div !== 'card card-body bgF7BCBEred') {
                        state.gymmini[i].gym_set[p].on_div = 'card card-body bgFFFFFFwhite';//делаем фон везде на сетах белый
                    }

                }
                state.gymmini[i].gym_set[j].on_div = 'card card-body bgE7FFB1yellow'//-устан салатовый
                for (var p = 0; p < this.getters.GYMMINI[i].gym_set.length; p++) {
                    state.gymmini[i].gym_set[p].gym_set_up_true = true;//вкл редактирование -появляется кнопка вверх на всех сетах
                    state.gymmini[i].gym_set[p].gym_set_on_true = false;//
                    state.gymmini[i].gym_set[p].gym_set_del_true = false;//
                }
                state.gymmini[i].gym_set[j].edit = true
                state.gymmini[i].offlInput = true
                state.editAp = true
            } else {
                state.gymmini[i].gym_set[j].edit = false
                state.gymmini[i].gym_set[j].on_div = 'card card-body bgE7FFB1yellow'//
                state.gymmini[i].gym_set[j].gym_set_up_true = false//
                for (var p = 0; p < this.getters.GYMMINI[i].gym_set.length; p++) {
                    state.gymmini[i].gym_set[p].gym_set_up_true = false;//вкл редактирование -выключаем кнопка вверх на всех сетах
                    state.gymmini[i].gym_set[p].gym_set_on_true = true;//
                    state.gymmini[i].gym_set[p].gym_set_del_true = true;//
                }
                state.editAp = false
            }


        },

        GYMSET_EDIT_UP(state, [i, j]) {//
            state.edit = state.gymmini[i].gym_set[j]//закидываем значение сета в input
        },
        SET_UPDATE(state, set) {//из какого сета редактируем данные
            state.set = set
        },


    },

    actions: {
        GET_GYMSTART_FROM_API: async ({commit, dispatch}) => {//массив с данными для начала тренировки
            axios
                // .get('/api/gymStarNew')
                .get('/sport/gym_star_new')
                .then(response => {
                    dispatch('GET_GYMMINI_FROM_API');//массив с данными для упражнений мини
                    commit('GYMSTART_CHANGE', response.data);
                })
                .catch(error => {
                    console.log(error);
                    dispatch('GET_GYMSTART_FROM_API')
                })

        },
        GET_GYMMINI_FROM_API: async ({commit}) => {//массив с данными для упражнений мини
            axios
                // .get('/api/gymAll')
                .get('/sport/gym_all')
                .then(response => {
                    // console.table(response.data)
                    commit('GYMMINI_CHANGE', response.data);
                    for (var i = 0; i < response.data.length; i++) {
                        if (response.data[i].isexenow === true) {
                            commit('GYMSTARTCART_CHANGE', response.data[i])
                        }
                    }
                })
                .catch(error => {
                    //console.log(error);
                    //console.log('1==========');
                    dispatch('GET_GYMMINI_FROM_API')
                })

        },
        SET_GYMEXENEXT: async ({commit, dispatch, getters}, payload) => {//выбрать другое упражнение

            for (var i = 0; i < getters.GYMMINI.length; i++) {
                //result.push(data.data[i]);
                if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex) {
                    commit('GYMMINI_FALSE', i)
                }
            }
            for (var i = 0; i < getters.GYMMINI.length; i++) {
                if (getters.GYMMINI[i].ex === payload) {
                    commit('GYMMINI_TRUE', i)
                    commit('GYMSTARTCART_CHANGE', getters.GYMMINI[i]);
                }
            }


        },
        SET_GYMSETON: async ({commit, dispatch, getters}, payload) => {//сет выполнен

            for (var i = 0; i < getters.GYMMINI.length; i++) {

                if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex) {
                    for (var j = 0; j < getters.GYMMINI[i].gym_set.length; j++) {
                        if (getters.GYMMINI[i].gym_set[j].set === payload) {
                            commit('GYMSET_ON', [i, j])
                        }
                    }
                }
            }
        },
        SET_GYMSETDEL: async ({commit, dispatch, getters}, payload) => {//удаляем сет
            for (var i = 0; i < getters.GYMMINI.length; i++) {

                if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex) {


                    commit('GYMSET_DEL', [i, payload])

                }
            }


        },
        SET_GYMENDEXE: async ({commit, dispatch, getters}, payload) => {//выбираем упражнение выполнено-помечаем красным

            for (var i = 0; i < getters.GYMMINI.length; i++) {
                //result.push(data.data[i]);
                if (getters.GYMMINI[i].ex === payload) {
                    commit('GYMEX_OK', i)
                }
            }

        },
        SET_GYMADDSET: async ({commit, dispatch, getters}) => {//помечаем , что добавляем сет, выводим дополн строку
            for (var i = 0; i < getters.GYMMINI.length; i++) {
                if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex) {
                    //console.log('gymAddSet4')
                    commit('OFFINPUT_ON', i);//показывыем добавить подход

                }
            }

        },
        SET_GYMEXEOK: async ({commit, getters, dispatch}, obj) => {//сохраняем подход
            if (getters.EDITUP === false) {
                for (var i = 0; i < getters.GYMMINI.length; i++) {

                    if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex && getters.GYMMINI[i].offlInput === true) {
                        commit('SAVE_SET', [obj, i]);//Сохранить результат подхода
                        commit('OFFINPUT_OFF', i);//прячем добавить подход
                    }
                }
            } else {
                for (var i = 0; i < getters.GYMMINI.length; i++) {

                    if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex && getters.GYMMINI[i].offlInput === true) {
                        commit('UPDATE_SET', [obj, i]);//обновляем сет в упражнение
                        commit('OFFINPUT_OFF', i);//прячем добавить подход
                    }
                }

            }

        },
        SET_GYMDELSET: async ({commit, getters, dispatch}) => {//удаляем добавляемый сет

            for (var i = 0; i < getters.GYMMINI.length; i++) {
                //result.push(data.data[i]);
                if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex) {
                    commit('OFFINPUT_OFF', i);//прячем добавить подход

                }
            }
        },
        SET_GYMSETUP: async ({commit, getters, dispatch}, payload) => {//всавляем результаты сета в форму
            for (var i = 0; i < getters.GYMMINI.length; i++) {

                if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex) {
                    for (var j = 0; j < getters.GYMMINI[i].gym_set.length; j++) {
                        if (getters.GYMMINI[i].gym_set[j].set === payload) {
                            commit('GYMSET_EDIT_UP', [i, j])//редактирование в input переносим данные из сета в input
                        }
                    }
                }
            }


        },
        SET_GYMSETEDIT: async ({commit, getters, dispatch}, payload) => {//редактируем сет
            commit('SET_UPDATE', payload);//из какого сета редактируем данные
            for (var i = 0; i < getters.GYMMINI.length; i++) {

                if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex) {
                    for (var j = 0; j < getters.GYMMINI[i].gym_set.length; j++) {
                        if (getters.GYMMINI[i].gym_set[j].set === payload) {
                            commit('EDIT', [i, j])//редактирование в input переносим данные из сета в input
                        }
                    }
                }
            }


        },
        SET_GYMENDOK: async ({commit, getters, dispatch}) => {//сохраняем в базу

            axios
                .post('/sport/gym_exe_ok', {data: getters.GYMMINI})
                .then(response => {

                })
                .catch(error => {
                    console.log(error);

                    dispatch('SET_GYMENDOK')
                })

            //console.table(localStorage);
            localStorage.vuex = null
            //console.table(localStorage);


            window.location.href = '/sport';


        },


    }
    ,


    getters: {

        GYMSTART(state) {
            return state.gymstart;//массив с данными для начала тренировки
        }
        ,
        GYMSTARTCART(state) {
            return state.gymstartcart;//получение параметров какое упражнение сейчас
        }
        ,
        GYMMINI(state) {
            return state.gymmini;//массив с данными для упражнений мини
        }
        ,
        EDIT(state) {
            return state.edit;//редактирование в input
        },
        EDITUP(state) {
            return state.editAp;//что сохраняем новое или редактируем
        }
        ,
        SET(state) {
            return state.set;//
        }
        ,


    }
}


// ramka100-3-red
// ramka100-3-yellow
// ramka100-3-redyellow
// ramka100-3-white
// gym_set_edit_true-   true-показывает кнопку edit
// gym_set_up_true-         true показывает кнопку up
// on_div-                      "ramka100-3-white----фон белый
