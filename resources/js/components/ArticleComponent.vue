<template>
    <div class="container">
        <h1>{{ hello }}</h1>
        <h2>{{ helloToUpper }}</h2>
        <h3>{{ sum(6,8) }}</h3>
        <img :src="img" alt="">
        <p v-if="true">true</p>
        <ul>
            <li v-for="(index, car) in this.cars">{{ index }} - {{ car }}</li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            hello: 'Hello World!',
            img: 'https://via.placeholder.com/600/5F113B/FFFFFF/?text=Laravel:8.*',
            cars: ['BMW', 'Nissan', 'Volvo', 'Audi']
        }
    },

    computed: {
        helloToUpper() {
            return this.hello.toUpperCase();
        }
    },

    methods: {
        sum(a, b) {
            return a + b;
        }
    },

    mounted() {
        console.log('Component mounted.')
    }
}
</script>

<style scoped>

</style>
