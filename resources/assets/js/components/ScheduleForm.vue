<template>

</template>
<script>
    export default {
        data() {
            return {
                schedule: {
                    name: "New Schedule",
                    date:
                        "",
                    blocks:
                        []
                }
            }
        },
        methods: {
            addClass() {
                this.schedule.blocks.push({name: '', number: '', start_time: '00:00:00', end_time: '00:00:00'});
            },
            removeClass(index) {
                this.schedule.blocks.splice(index, 1)
            },
            submit() {
                axios.post(laroute.route('schedules.store'), this.schedule)
            }
        },
        mounted() {
        },
        computed: {
        }
    }
</script>