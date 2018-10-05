<template>
    
</template>

<script>
    import Vue from 'vue';

    export default Vue.extend({
        props: {
            messageBag: {},
        },
        mounted () {
            window.addEventListener('load', event => {
                this.$notify({
                    title: this.messageBag.title,
                    message: this.arrayToList(this.messageBag.text),
                    type: this.messageBag.type,
                    dangerouslyUseHTMLString: true,
                });
            });
        },
        methods: {
            arrayToList: (messages) => {
                if (!Array.isArray(messages)) {
                    return messages;
                }
                let result = '<ul>';
                messages.forEach(message => {
                    result += `<li>${message}</li>`;
                });
                result += '</ul>';
                return result;
            }
        }
    });
</script>

<style lang="scss">
    .el-notification {
        border: 1px solid #BF2932;
    }
</style>