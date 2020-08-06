<template>
    <a
        v-if="!disabled"
        :href="url"
        class="iubenda-white no-brand iubenda-embed"
        :title="title"
        target="_blank"
    >{{ title }}</a>
</template>

<script>
export default {
    name: 'IubendaPrivacyPolicy',
    props: {
        disabled: {
            type: Boolean,
            default: false,
        },
        id: {
            type: [Number, String],
            required: true,
        },
        title: {
            type: String,
            default: 'Privacy Policy',
        },
    },
    computed: {
        url(){
            return `https://www.iubenda.com/privacy-policy/${this.id}`
        },
    },
}
</script>
