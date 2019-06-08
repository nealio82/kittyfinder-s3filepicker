<template>

    <div class="flex border-b border-40">
        <div class="w-1/4 py-4"><h4 class="font-normal text-80">Avatar</h4></div>
        <div class="w-3/4 py-4">
            <div>
                <div data-v-c8563a86=""
                     class="card relative card relative border border-lg border-50 overflow-hidden px-0 py-0"
                     style="max-width: 320px;">
                    <img
                            :src="'https://kittyfinder-uploads.s3-eu-west-1.amazonaws.com/' + field.value"
                            class="block w-full" draggable="false">
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['resource', 'resourceName', 'resourceId', 'field'],
    }
</script>
