<template>
    <div class="row">
        <form @submit.prevent="submit_form()" v-if="!commentSuccess">
            <div class="mb-3">
                <label for="commentSubject" class="form-label">Тема коментарію:</label>
                <input type="text" class="form-control" id="commentSubject" v-model="subject">
            </div>
            <div class="mb-3">
                <label for="commentBody" class="form-label">Текст коментарію:</label>
                <textarea name="" id="commentBody" cols="30" rows="3" class="form-control" v-model="body"></textarea>
            </div>
            <button class="btn btn-success" type="submit">Відправити</button>
        </form>
        <div class="alert alert-success" role="alert" v-else>Коментар успішно надіслано.</div>
        <div class="toast-container pb-5 mt-5 mx-auto" style="min-width: 100%;" v-for="comment in comments">
            <div class="toast showing" style="min-width:100%">
                <div class="toast-header">
                    <img src="https://via.placeholder.com/50/5F1138/FFFFFF/?text=User" alt="user_avatar" class="rounded">
                    <strong class="mx-auto">{{ comment.subject }}</strong>
                    <small class="text-muted">{{ comment.createdAt }}</small>
                </div>
                <div class="toast-body">{{ comment.body }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            subject: '',
            body: ''
        }
    },
    computed: {
        comments() {
            return this.$store.state.article.comments;
        },
        commentSuccess() {
            return this.$store.state.article.commentSuccess;
        }
    },
    methods: {
        submit_form() {
            this.$store.dispatch('addComment', {
                subject: this.subject,
                body: this.body,
                article_id: this.$store.state.article.id
            });
        }
    },
    mounted() {
        console.log('Component mounted');
    }
}
</script>

<style scoped>

</style>
