<template>
    <p class="text-left"><img
            :src="'https://kittyfinder-uploads.s3-eu-west-1.amazonaws.com/' + field.value"
            class="align-bottom rounded-full w-8 h-8" style="object-fit: cover;"></p>
</template>

<script>
    export default {
        props: ['resourceName', 'field'],
    }
</script>
