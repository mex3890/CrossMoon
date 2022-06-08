<template>
    <div id="content-table">
        <div class="header-table">
            <h4>Assignments</h4>
            <a :href="urlCreate" class="btn btn-primary assignment-button">Create Assignment</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID
                        <form method="GET" :action="urlAssignments">
                            <input type="hidden" name="_token" :value="csrfToken">

                        </form>
                    </th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(assignment,key) in userAssignments" :key="key">
                    <td>{{ assignment.id }}</td>
                    <td>{{ assignment.name }}</td>
                    <td>{{ assignment.category }}</td>
                    <td>
                        <span :class="{
                            finish:assignment.stat === 'Finished',
                            inprogress:assignment.stat === 'In progress',
                            created:assignment.stat === 'Created'}">
                        {{ assignment.stat }}
                    </span></td>
                    <td class="action"><a :href="urlAssignments + '/' + assignment.id"><i style="color: #21c267;" class='bx bxs-show'></i></a>
                    </td>
                    <td class="action"><a href="#"><i style="color: #000000;" class='bx bxs-edit'></i></a></td>
                    <td class="action"><a href="#"><i style="color: #ff3c3c;" class='bx bx-trash'></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ['userAssignments', 'urlAssignments', 'urlCreate', 'csrfToken'],
    data() {
        return {
            isfinish: ass
        }
    }
}
</script>
