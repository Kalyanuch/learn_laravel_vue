import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        article: {
            comments: [],
            tags: [],
            state: {
                likes: 0,
                views: 0
            },
        },
        slug: ''
    },
    actions: {
        getArticleData(context, payload) {
            axios.get('/api/article-json', {params: {slug: payload}})
                .then((response) => {
                    context.commit('SET_ARTICLE', response.data.data);
                })
                .catch(() => {console.log('Error')});
        },
        viewsIncrement(context, payload) {
            setTimeout(() => {
                axios.put('/api/article-views-increment', {slug: payload})
                    .then((response) => {
                        context.commit('SET_ARTICLE', response.data.data);
                    }).catch(() => {
                        console.log('Error');
                    });
            }, 5000);
        }
    },
    getters: {
        articleViews(state) {
            return state.article.state.views;
        },
        articleLikes(state) {
            return state.article.state.likes;
        }
    },
    mutations: {
        SET_ARTICLE(state, payload) {
            return state.article = payload;
        },
        SET_SLUG(state, payload) {
            return state.slug = payload;
        }
    }
})
