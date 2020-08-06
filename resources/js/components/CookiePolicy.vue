<script>
import PrivacyPolicy from "./PrivacyPolicy";

export default {
    name: 'IubendaCookiePolicy',
    extends: PrivacyPolicy,
    props: {
        title: {
            type: String,
            default: 'Cookie Policy',
        },
    },
    computed: {
        url(){
            return `https://www.iubenda.com/privacy-policy/${this.id}/cookie-policy`
        },
    },
}
</script>
