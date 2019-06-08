<template>
    <default-field :field="field" :errors="errors">

        <template slot="field">
            <div class="mb-6">
                <div data-v-c8563a86=""
                     class="card relative card relative border border-lg border-50 overflow-hidden px-0 py-0"
                     style="max-width: 320px;">
                    <img
                            id="previewImage"
                            class="block w-full" draggable="false"
                            :src="'https://kittyfinder-uploads.s3-eu-west-1.amazonaws.com/' + field.value"
                    >
                </div>

            </div>

            <input
                    ref="fileField"
                    type="file"
                    name="imageUpload"
                    @change="fileChange"
            />

            <input
                    type="text"
                    :id="field.name"
                    :dusk="field.attribute"
                    name="field.name"
                    v-model="value"
                    />

        </template>
    </default-field>
</template>

<script>
    import {FormField, HandlesValidationErrors} from 'laravel-nova'

    export default {
        mixins: [FormField, HandlesValidationErrors],

        props: ['resourceName', 'resourceId', 'field'],

        methods: {
            /*
             * Set the initial, internal value for the field.
             */
            setInitialValue() {
                this.value = this.field.value || ''
            },

            /**
             * Fill the given FormData object with the field's internal value.
             */
            fill(formData) {
                formData.append(this.field.attribute, this.value || '')
            },

            /**
             * Update the field's internal value.
             */
            async fileChange(event) {
                let path = event.target.value
                let fileName = path.match(/[^\\/]*$/)[0]
                this.fileName = fileName
                this.file = this.$refs.fileField.files[0]

                await axios.get('/nova/presignedurl?'
                    + 'filename=' + this.fileName
                    + '&filetype=' + this.file.type
                ).then(async response => {

                    let options = {
                        headers: {
                            "Content-Type": this.file.type,
                            "x-amz-acl": 'public-read'
                        }
                    };

                    await axios.put(response.data.url, this.file, options).then(result => {
                        document.getElementById('previewImage').setAttribute('src', response.data.path);

                        this.value = response.data.filename
                    });
                })
            },
        },
    }
</script>
