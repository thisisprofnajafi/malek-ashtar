<script setup lang="ts">
import { Head, Link } from '@inertiajs/inertia-vue3';
import useNotyf  from '../composable/useNotyf';
import {onMounted} from 'vue';
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const notif = useNotyf()

onMounted(() => {
    console.log('hi')
    notif.success('خوش آمدید')
})

const say = () => {

}
</script>

<template>
    <Head title="خانه" />
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        </div>
    </div>
</template>
