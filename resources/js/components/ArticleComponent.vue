<template>
    <div class="row mt-5">
        <div class="col-12 p-3">
            <img :src="article.img" class="border rounded mx-auto d-block" alt="...">
            <h5 class="mt-5">{{ article.title }}</h5>
            <p>
                <span class="tag" v-for="(tag, index) in article.tags">
                    <span v-if="tagsLen == (index + 1)">{{ tag.label }}</span>
                    <span v-else>{{ tag.label }} | </span>
                </span>
            </p>
            <p class="card-text">{{ article.body }}</p>
            <p>Опубліковано: <i>{{ article.created_at }}</i></p>
            <div class="mt-3">
                <likes-component></likes-component>
                <views-component></views-component>
            </div>
        </div>
    </div>
</template>

<script>
import ViewsComponent from "./ViewsComponent";
import { mapState} from 'vuex';

export default {
    components: {ViewsComponent},
    computed: mapState({
        article: state => state.article.article,
        tagsLen: state => state.article.article.tags.length
    }),
    mounted() {
        console.log('Article component mounted.')
    }
}
</script>

<style scoped>

</style>
