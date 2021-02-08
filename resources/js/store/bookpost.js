export default {
    state: {
        allPosts: [],//массив с  Постами+
        popularPosts: [],//массив с Популярные Посты+
        featuredPosts: [],//массив с Рекомендованные Посты+
        categories: [],//массив с Категории+
        post: [],//массив с Выбраным Постом+

        viewPagePost: '',//какая страница сейчас отображается+
        viewPagePosts: '',//какая страница сейчас отображается+

        postNow: '',//какой пост сейчас отображается+
        pagination: [],//
        errors: [],//ошибки при сохр комментария
        messages: '',
        clearTextarea:false,
    },

    mutations: {
        CLEAR_TEXTAREA_TRUE(state) {
            state.clearTextarea = true;
        },
        CLEAR_TEXTAREA_FALSE(state) {
            state.clearTextarea = false;
        },

        updateMessage(state, messages) {
            state.messages = messages;
        },


        PAGE_CHANGE_POST(state) //меняем страница которая сейчас отображается на post+
        {
            state.viewPagePost = true
            state.viewPagePosts = false
        },
        PAGE_CHANGE_POSTS(state) //меняем страница которая сейчас отображается на posts+
        {

            state.viewPagePost = false
            state.viewPagePosts = true
        },
        POST_SET(state, response) //записываем данные полученные из сети от action в state.post
        {
            state.post = []
            state.post.push(response)//??

        },
        SET_POST_LIKE(state, response) //
        {
            state.post[0].LikesCount = response

        },
        SET_COMMENT_LIKE(state, response) //
        {
            state.post[0].Comments[0].LikesCount = response

        },
        POSTS_SET(state, response) //записываем данные полученные из сети от action в state.allPosts+
        {
            state.allPosts = []
            state.allPosts.push(response);
        },
        SIDEBAR_SET(state, response) //записываем данные полученные из сети от action в state  sidebar+
        {
            state.popularPosts.push(response['popularPosts']);
            state.featuredPosts.push(response['featuredPosts']);
            state.categories.push(response['categories']);
        },
        POST_NOW_SET(state, post_slug) //записываем какой пост сейчас отображается в state.postNow
        {
            state.postNow = post_slug//
        },
        MAKE_PAGINATION(state, pagination) //
        {
            state.pagination = []
            var obj = {
                'current_page': pagination.current_page,
                'last_page': pagination.last_page,
                'prev_page_url': pagination.prev_page_url,
                'next_page_url': pagination.next_page_url,
            };
            state.pagination.push(obj);

        },
        SET_ERRORS(state, response) //
        {
            state.errors = []
            state.errors.push(response);

        },


        //
        // GYMSTART_CHANGE(state, gymstart) {//массив с данными для начала тренировки
        //     state.gymstart = gymstart
        // },
        // GYMSTARTCART_CHANGE(state, gymstartcart) {//массив с данными //получение параметров какое упражнение сейчас
        //     state.gymstartcart = gymstartcart
        //
        // },
        // GYMMINI_CHANGE(state, gymmini) {//массив с данными для упражнений мини
        //     state.gymmini = gymmini
        // },
        // GYMMINI_FALSE(state, i) {// для упражнений мини уходим с этого упражнения
        //     if (state.gymmini[i].dir_mini === 'ramkagifis') {
        //         state.gymmini[i].dir_mini = 'ramkagifoff'
        //     }
        //     if (state.gymmini[i].dir_mini === 'ramkagifison') {
        //         state.gymmini[i].dir_mini = 'ramkagifon'
        //     }
        // },
        // GYMMINI_TRUE(state, i) {//для упражнений переходим на  это упражнение
        //     if (state.gymmini[i].dir_mini === 'ramkagifoff') {
        //         state.gymmini[i].dir_mini = 'ramkagifis'
        //     }
        //     if (state.gymmini[i].dir_mini === 'ramkagifon') {
        //         state.gymmini[i].dir_mini = 'ramkagifison'
        //     }
        // },
        // GYMSET_ON(state, [i, j]) {// сет выполнен--фон красный
        //     if (state.gymmini[i].gym_set[j].on === false) {
        //
        //         state.gymmini[i].gym_set[j].on_div = 'card card-body bgF7BCBEred'
        //         state.gymmini[i].gym_set[j].on = true
        //         state.gymmini[i].gym_set[j].gym_set_edit_true = false
        //
        //     } else {
        //         state.gymmini[i].gym_set[j].on_div = 'card card-body bgFFFFFFwhite'
        //         state.gymmini[i].gym_set[j].on = false
        //         state.gymmini[i].gym_set[j].gym_set_edit_true = true
        //
        //     }
        // },
        // GYMSET_DEL(state, [i, j]) {// удаляем сет
        //     state.gymmini[i].gym_set.splice(j, 1)
        // },
        // GYMEX_OK(state, i) {// упражнение выполнено--фон красный
        //
        //     if (state.gymmini[i].is_ok === false && state.gymmini[i].dir_mini === 'ramkagifis') {
        //
        //         state.gymmini[i].dir_mini = 'ramkagifison'
        //         state.gymmini[i].is_ok = true//выполнено упражнение
        //     } else {
        //         state.gymmini[i].dir_mini = 'ramkagifis'
        //         state.gymmini[i].is_ok = false//не выполнено упражнение
        //     }
        // },
        // OFFINPUT_ON(state, i) {//показывыем добавить подход
        //     console.log('gymAddSet5')
        //     console.log(i)
        //     state.gymmini[i].offlInput = true
        //     state.gymstartcart.offlInput = true
        //
        // },
        // OFFINPUT_OFF(state, i) {//прячем добавить подход
        //     state.gymmini[i].offlInput = false
        //     state.gymstartcart.offlInput = false
        // },
        // SAVE_SET(state, [obj, i]) {//добавить сет в упражнение
        //
        //     state.gymmini[i].gym_set.push(obj);
        //
        // },
        // UPDATE_SET(state, [obj, i]) {//обновляем сет в упражнение
        //     for (var p = 0; p < this.getters.GYMMINI[i].gym_set.length; p++) {//пробегаем по всем сетам в этом упражнении
        //         if (state.gymmini[i].gym_set[p].set === state.set) {
        //             state.gymmini[i].gym_set[p].comment = obj.comment;//вкл редактирование -выключаем кнопка вверх на всех сетах
        //             state.gymmini[i].gym_set[p].kg_km = obj.kg_km;//
        //             state.gymmini[i].gym_set[p].rep_min = obj.rep_min;//делаем фон везде на сетах белый
        //
        //             state.gymmini[i].gym_set[p].edit = false
        //             state.gymmini[i].gym_set[p].on_div = 'card card-body bgFFFFFFwhite'//
        //             state.gymmini[i].gym_set[p].gym_set_up_true = false//
        //             for (var p = 0; p < this.getters.GYMMINI[i].gym_set.length; p++) {
        //                 state.gymmini[i].gym_set[p].gym_set_up_true = false;//вкл редактирование -выключаем кнопка вверх на всех сетах
        //                 state.gymmini[i].gym_set[p].gym_set_on_true = true;//
        //                 state.gymmini[i].gym_set[p].gym_set_del_true = true;//
        //             }
        //             state.editAp = false;
        //
        //         }
        //     }
        //
        // },
        // EDIT(state, [i, j]) {//редактирование в input переносим данные из сета в input
        //     if (state.gymmini[i].gym_set[j].edit === false) {
        //         state.edit = state.gymmini[i].gym_set[j]//закидываем значение сета в input
        //         for (var p = 0; p < this.getters.GYMMINI[i].gym_set.length; p++) {//пробегаем по всем сетам в этом упражнении
        //             state.gymmini[i].gym_set[p].gym_set_up_true = false;//вкл редактирование -выключаем кнопка вверх на всех сетах
        //             state.gymmini[i].gym_set[p].edit = false;//
        //             if (state.gymmini[i].gym_set[p].on_div !== 'card card-body bgF7BCBEred') {
        //                 state.gymmini[i].gym_set[p].on_div = 'card card-body bgFFFFFFwhite';//делаем фон везде на сетах белый
        //             }
        //
        //         }
        //         state.gymmini[i].gym_set[j].on_div = 'card card-body bgE7FFB1yellow'//-устан салатовый
        //         for (var p = 0; p < this.getters.GYMMINI[i].gym_set.length; p++) {
        //             state.gymmini[i].gym_set[p].gym_set_up_true = true;//вкл редактирование -появляется кнопка вверх на всех сетах
        //             state.gymmini[i].gym_set[p].gym_set_on_true = false;//
        //             state.gymmini[i].gym_set[p].gym_set_del_true = false;//
        //         }
        //         state.gymmini[i].gym_set[j].edit = true
        //         state.gymmini[i].offlInput = true
        //         state.editAp = true
        //     } else {
        //         state.gymmini[i].gym_set[j].edit = false
        //         state.gymmini[i].gym_set[j].on_div = 'card card-body bgE7FFB1yellow'//
        //         state.gymmini[i].gym_set[j].gym_set_up_true = false//
        //         for (var p = 0; p < this.getters.GYMMINI[i].gym_set.length; p++) {
        //             state.gymmini[i].gym_set[p].gym_set_up_true = false;//вкл редактирование -выключаем кнопка вверх на всех сетах
        //             state.gymmini[i].gym_set[p].gym_set_on_true = true;//
        //             state.gymmini[i].gym_set[p].gym_set_del_true = true;//
        //         }
        //         state.editAp = false
        //     }
        //
        //
        // },
        // GYMSET_EDIT_UP(state, [i, j]) {//
        //     state.edit = state.gymmini[i].gym_set[j]//закидываем значение сета в input
        // },
        // SET_UPDATE(state, set) {//из какого сета редактируем данные
        //     state.set = set
        // },
    },

    actions: {
        GET_POST_FROM_API: async ({commit, dispatch, getters}, post_slug) => //получить отдельный пост
        {
            axios
                .get('/book/api/post/' + post_slug)
                .then(response => {
                    // console.table(response.data.Comments)

                    commit('POST_SET', response.data);//передаем данные в mutations для записи в стейт
                })
                .catch(error => {
                    console.log('Ошибка! GET_POST_FROM_API')
                    // dispatch('POST_SHOW_FROM_API',{commit, dispatch, getters},post_slug)
                })

            commit('PAGE_CHANGE_POST');//переключаем на страницу с отдельным постом
            commit('POST_NOW_SET', post_slug);//какой пост сейчас отображается


        },
        GET_POSTS_FROM_API: async ({commit, dispatch, getters}, page_url) => //получить все посты
        {
            page_url = page_url || '/book/api/posts'
            axios
                .get(page_url)
                .then(response => {
                    console.table(response.data.data)
                    commit('POSTS_SET', response.data.data);//передаем данные в mutations для записи в стейт
                    commit('MAKE_PAGINATION', response.data)


                })
                .catch(error => {
                    console.log('Ошибка! GET_POSTS_FROM_API')

                    // dispatch('POST_SHOW_FROM_API',{commit, dispatch, getters},post_slug)
                })
            commit('PAGE_CHANGE_POSTS');//переключаем на страницу с всеми постами
        },
        GET_MY_POSTS_FROM_API: async ({commit, dispatch, getters}, page_url) => //получить все мои посты
        {
            axios
                .get('/book/api/my_posts')
                .then(response => {
                    commit('POSTS_SET', response.data.data);//передаем данные в mutations для записи в стейт
                    commit('MAKE_PAGINATION', response.data)
                })
                .catch(error => {
                    console.log('Ошибка! GET_MY_POSTS_FROM_API')
                    // dispatch('POST_SHOW_FROM_API',{commit, dispatch, getters},post_slug)
                })
            commit('PAGE_CHANGE_POSTS');//переключаем на страницу с всеми постами
        },
        GET_POPULAR_POSTS_FROM_API: async ({commit, dispatch, getters}, page_url) => //получить все мои посты популярные
        {
            axios
                .get('/book/api/popular_posts')
                .then(response => {
                    commit('POSTS_SET', response.data.data);
                    commit('MAKE_PAGINATION', response.data)
                })
                .catch(error => {
                    console.log('Ошибка! GET_POPULAR_POSTS_FROM_API')
                })
            commit('PAGE_CHANGE_POSTS');//переключаем на страницу с всеми постами
        },
        GET_FEATURED_POSTS_FROM_API: async ({commit, dispatch, getters}, page_url) => //получить все мои посты популярные
        {
            axios
                .get('/book/api/featured_posts')
                .then(response => {
                    commit('POSTS_SET', response.data.data);
                    commit('MAKE_PAGINATION', response.data)
                })
                .catch(error => {
                    console.log('Ошибка! GET_FEATURED_POSTS_FROM_API')
                })
            commit('PAGE_CHANGE_POSTS');//переключаем на страницу с всеми постами
        },

        GET_CATEGORY_POSTS_FROM_API: async ({commit, dispatch, getters}, categorySlug) => //получить все посты из выбраной категории
        {
            axios
                .get('/book/api/category/' + categorySlug)
                .then(response => {
                    // console.table(response.data.data,categorySlug)
                    commit('POSTS_SET', response.data.data);//передаем данные в mutations для записи в стейт
                    commit('MAKE_PAGINATION', response.data)

                })
                .catch(error => {
                    console.log('Ошибка! GET_CATEGORY_POSTS_FROM_API')

                })
            commit('PAGE_CHANGE_POSTS');//переключаем на страницу с всеми постами для выбранной категории
        },
        GET_SIDEBAR_FROM_API: async ({commit, dispatch, getters},) => //получить SIDEBAR
        {
            axios
                .get('/book/api/sidebar')
                .then(response => {

                    commit('SIDEBAR_SET', response.data);//передаем данные в mutations для записи в стейт
                })
                .catch(error => {
                    console.log('Ошибка! GET_SIDEBAR_FROM_API')

                })
        },
        GET_TAG_POSTS_FROM_API: async ({commit, dispatch, getters}, tag_slug) => //показать  посты с данным тегом
        {
            axios
                .get('/book/api/tag/' + tag_slug)
                .then(response => {
                    // console.table(response.data.data,tag_slug)
                    commit('POSTS_SET', response.data.data);//передаем данные в mutations для записи в стейт
                    commit('MAKE_PAGINATION', response.data)

                })
                .catch(error => {
                    console.log('Ошибка! GET_TAG_POSTS_FROM_API')

                })
            commit('PAGE_CHANGE_POSTS');//переключаем на страницу с всеми постами для выбранной категории
        },
        SET_POST_DESTROY_FROM_API: async ({commit, dispatch, getters}, post_id) =>//удаляем пост
        {
            axios
                .get('/book/api/destroy_post/' + post_id)
                .then(response => {
                    dispatch('GET_POSTS_FROM_API');//
                })
                .catch(error => {
                    console.log('Ошибка! SET_POST_DESTROY_FROM_API')

                })
        },
        SET_POST_LIKE_FROM_API: async ({commit, dispatch, getters}, post_id) => // лайкаем пост
        {
            axios
                .get('/book/api/post_like/' + post_id)
                .then(response => {
                    commit('SET_POST_LIKE', response.data)
                })
                .catch(error => {
                    console.log('Ошибка! SET_POST_LIKE_FROM_API', error)

                })
        },
        SET_COMMENT_LIKE_FROM_API: async ({commit, dispatch, getters}, comment_id) => //лайкаем комментарий
        {
            axios
                .get('/book/api/comment_like/' + comment_id)
                .then(response => {
                    commit('SET_COMMENT_LIKE', response.data)
                })
                .catch(error => {
                    console.log('Ошибка! SET_COMMENT_LIKE_FROM_API')

                })
        },
        SET_COMMENT_DESTROY_FROM_API: async ({commit, dispatch, getters}, comment_id) => //удаляем комментарий
        {
            axios
                .get('/book/api/destroy_comment/' + comment_id)
                .then(response => {
                    dispatch('GET_POST_FROM_API', getters.POST_NOW);//
                })
                .catch(error => {
                    console.log('Ошибка! SET_COMMENT_DESTROY_FROM_API')

                })
        },
        SET_MESSAGE_FROM_API: async ({commit, dispatch, getters}, message) => //удаляем комментарий
        {
            axios
                .post('/book/api/comment/store', {message})
                .then(response => {
                    console.table(response.data)
                    dispatch('GET_POST_FROM_API', getters.POST_NOW);//
                    commit('CLEAR_TEXTAREA_TRUE')
                    commit('updateMessage','')
                })
                .catch(error => {
                    // commit('SET_ERRORS', error.response.data.errors.message)
                })
        },


        // PROFILE_USER: async ({commit, dispatch, getters}, payload) => {//показать профиль юзера
        // },
        // POST_EDIT: async ({commit, dispatch, getters}, payload) => {//показать редактируем пост
        // },


        //
        // GET_GYMSTART_FROM_API: async ({commit, dispatch}) => {//массив с данными для начала тренировки
        //     axios
        //         // .get('/api/gymStarNew')
        //         .get('/sport/gym_star_new')
        //         .then(response => {
        //             dispatch('GET_GYMMINI_FROM_API');//массив с данными для упражнений мини
        //             commit('GYMSTART_CHANGE', response.data);
        //         })
        //         .catch(error => {
        //             console.log(error);
        //             dispatch('GET_GYMSTART_FROM_API')
        //         })
        //
        // },
        // GET_GYMMINI_FROM_API: async ({commit}) => {//массив с данными для упражнений мини
        //     axios
        //         // .get('/api/gymAll')
        //         .get('/sport/gym_all')
        //         .then(response => {
        //             // console.table(response.data)
        //             commit('GYMMINI_CHANGE', response.data);
        //             for (var i = 0; i < response.data.length; i++) {
        //                 if (response.data[i].isexenow === true) {
        //                     commit('GYMSTARTCART_CHANGE', response.data[i])
        //                 }
        //             }
        //         })
        //         .catch(error => {
        //             //console.log(error);
        //             //console.log('1==========');
        //             dispatch('GET_GYMMINI_FROM_API')
        //         })
        //
        // },
        // SET_GYMEXENEXT: async ({commit, dispatch, getters}, payload) => {//выбрать другое упражнение
        //
        //     for (var i = 0; i < getters.GYMMINI.length; i++) {
        //         //result.push(data.data[i]);
        //         if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex) {
        //             commit('GYMMINI_FALSE', i)
        //         }
        //     }
        //     for (var i = 0; i < getters.GYMMINI.length; i++) {
        //         if (getters.GYMMINI[i].ex === payload) {
        //             commit('GYMMINI_TRUE', i)
        //             commit('GYMSTARTCART_CHANGE', getters.GYMMINI[i]);
        //         }
        //     }
        //
        //
        // },
        // SET_GYMSETON: async ({commit, dispatch, getters}, payload) => {//сет выполнен
        //
        //     for (var i = 0; i < getters.GYMMINI.length; i++) {
        //
        //         if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex) {
        //             for (var j = 0; j < getters.GYMMINI[i].gym_set.length; j++) {
        //                 if (getters.GYMMINI[i].gym_set[j].set === payload) {
        //                     commit('GYMSET_ON', [i, j])
        //                 }
        //             }
        //         }
        //     }
        // },
        // SET_GYMSETDEL: async ({commit, dispatch, getters}, payload) => {//удаляем сет
        //     for (var i = 0; i < getters.GYMMINI.length; i++) {
        //
        //         if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex) {
        //
        //
        //             commit('GYMSET_DEL', [i, payload])
        //
        //         }
        //     }
        //
        //
        // },
        // SET_GYMENDEXE: async ({commit, dispatch, getters}, payload) => {//выбираем упражнение выполнено-помечаем красным
        //
        //     for (var i = 0; i < getters.GYMMINI.length; i++) {
        //         //result.push(data.data[i]);
        //         if (getters.GYMMINI[i].ex === payload) {
        //             commit('GYMEX_OK', i)
        //         }
        //     }
        //
        // },
        // SET_GYMADDSET: async ({commit, dispatch, getters}) => {//помечаем , что добавляем сет, выводим дополн строку
        //
        //     for (var i = 0; i < getters.GYMMINI.length; i++) {
        //         if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex) {
        //             //console.log('gymAddSet4')
        //             commit('OFFINPUT_ON', i);//показывыем добавить подход
        //
        //         }
        //     }
        //
        // },
        // SET_GYMEXEOK: async ({commit, getters, dispatch}, obj) => {//сохраняем подход
        //
        //     if (getters.EDITUP === false) {
        //         for (var i = 0; i < getters.GYMMINI.length; i++) {
        //
        //             if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex && getters.GYMMINI[i].offlInput === true) {
        //                 commit('SAVE_SET', [obj, i]);//Сохранить результат подхода
        //                 commit('OFFINPUT_OFF', i);//прячем добавить подход
        //             }
        //         }
        //     } else {
        //         for (var i = 0; i < getters.GYMMINI.length; i++) {
        //
        //             if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex && getters.GYMMINI[i].offlInput === true) {
        //                 commit('UPDATE_SET', [obj, i]);//обновляем сет в упражнение
        //                 commit('OFFINPUT_OFF', i);//прячем добавить подход
        //             }
        //         }
        //
        //     }
        //
        // },
        // SET_GYMDELSET: async ({commit, getters, dispatch}) => {//удаляем добавляемый сет
        //
        //     for (var i = 0; i < getters.GYMMINI.length; i++) {
        //         //result.push(data.data[i]);
        //         if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex) {
        //             commit('OFFINPUT_OFF', i);//прячем добавить подход
        //
        //         }
        //     }
        // },
        // SET_GYMSETUP: async ({commit, getters, dispatch}, payload) => {//всавляем результаты сета в форму
        //     for (var i = 0; i < getters.GYMMINI.length; i++) {
        //
        //         if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex) {
        //             for (var j = 0; j < getters.GYMMINI[i].gym_set.length; j++) {
        //                 if (getters.GYMMINI[i].gym_set[j].set === payload) {
        //                     commit('GYMSET_EDIT_UP', [i, j])//редактирование в input переносим данные из сета в input
        //                 }
        //             }
        //         }
        //     }
        //
        //
        // },
        // SET_GYMSETEDIT: async ({commit, getters, dispatch}, payload) => {//редактируем сет
        //     commit('SET_UPDATE', payload);//из какого сета редактируем данные
        //     for (var i = 0; i < getters.GYMMINI.length; i++) {
        //
        //         if (getters.GYMMINI[i].ex === getters.GYMSTARTCART.ex) {
        //             for (var j = 0; j < getters.GYMMINI[i].gym_set.length; j++) {
        //                 if (getters.GYMMINI[i].gym_set[j].set === payload) {
        //                     commit('EDIT', [i, j])//редактирование в input переносим данные из сета в input
        //                 }
        //             }
        //         }
        //     }
        //
        //
        // },
        // SET_GYMENDOK: async ({commit, getters, dispatch}) => {//сохраняем в базу
        //
        //     axios
        //         .post('/sport/gym_exe_ok', {data: getters.GYMMINI})
        //         .then(response => {
        //
        //         })
        //         .catch(error => {
        //             console.log(error);
        //
        //             dispatch('SET_GYMENDOK')
        //         })
        //
        //     //console.table(localStorage);
        //     localStorage.vuex = null
        //     //console.table(localStorage);
        //
        //
        //     window.location.href = '/sport';
        //
        //
        // },

    }
    ,


    getters: {
        ALL_POSTS(state) {
            return state.allPosts;//массив с  Постами+
        },
        POPULAR_POSTS(state) {
            return state.popularPosts;//массив с  Постами+
        },

        FEATURED_POSTS(state) {
            return state.featuredPosts;//массив с  Постами+
        },
        CATEGORIES(state) {
            return state.categories;//массив с  Постами+
        },
        POST(state) {
            return state.post;//массив с  Постами+
        },
        PAGINATION(state) {
            return state.pagination;//
        },
        VIEW_PAGE_POST(state) {
            return state.viewPagePost;//массив с  Постами+
        },
        VIEW_PAGE_POSTS(state) {
            return state.viewPagePosts;//массив с  Постами+
        },
        POST_NOW(state) {
            return state.postNow;//
        },
        SET_ERRORS(state) {
            return state.errors;//
        },

        GET_MESSAGES(state) {
            return state.messages;//
        },
        CLEAR_TEXTAREA(state) {
            return state.clearTextarea;//
        },

    }
}

