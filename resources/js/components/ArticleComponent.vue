<template>
    <div class="row mt-5">
        <div class="col-12 p-3">
<!--            <article-component></article-component>-->
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
                <span class="badge bg-primary" v-if="article.state">{{ article.state.likes }} <i class="far fa-thumbs-up"></i></span>
                <span class="badge bg-danger" v-if="article.state">{{ article.state.views }} <i class="far fa-eye"></i></span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        article() {
            return this.$store.state.article;
        },
        tagsLen() {
            return this.$store.state.article.tags.length;
        }
    },

    mounted() {
        console.log('Component mounted.')
    }
}
</script>

<style scoped>

</style>
