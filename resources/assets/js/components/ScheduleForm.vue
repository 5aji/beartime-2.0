<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="/admin/schedules" method="post">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            New Schedule
                        </div>
                        <div class="panel-body">
                            <div class="form-row">
                                <div class="form-group col-sm-8">
                                    <label for="scheduleName">Name</label>
                                    <input v-model="schedule.name" type="text" class="form-control" id="scheduleName"
                                           placeholder="Enter name">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="scheduleDate">Date</label>
                                    <input type="text" v-model="schedule.date" class="form-control" id="scheduleDate"
                                           placeholder="Enter date">
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Name</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(block, index) in schedule.blocks">
                                    <td><input type="number" class="form-control" placeholder="optional"
                                               v-model="block.number"
                                               name="blocks[][number]"/></td>
                                    <td><input class="form-control" placeholder="optional" v-model="block.name"
                                               name="blocks[][name]"/>
                                    </td>
                                    <td><input type="time" class="form-control" placeholder="start time"
                                               v-model="block.start_time"
                                               name="blocks[][start_time]"/></td>
                                    <td><input type="time" class="form-control" placeholder="end time"
                                               v-model="block.end_time"
                                               name="blocks[][end_time]"/></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" @click="removeClass(index)">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="panel-footer">

                            <button type="button" class="btn btn-primary" @click="addClass">Add Class</button>
                            <button class="btn btn-primary"
                                    @click="submit">Create Schedule
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


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
                axios.post()
            }
        },
        mounted() {
            $('#scheduleDate').datepicker({});
        },
        computed: {
            submit_url: function () {
                //return laroute.route('schedules.store')
            }
        }
    }
</script>