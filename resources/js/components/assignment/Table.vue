<template>
    <div id="content-table">
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
                <th>Stats</th>
                <th colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(assignment,key) in userAssignments" :key="key">
                <td>{{ assignment.id }}</td>
                <td>{{ assignment.name }}</td>
                <td>{{ assignment.category }}</td>
                <td>{{ assignment.stat }}</td>
                <td><a :href="urlAssignments + '/' + assignment.id"><i style="color: #21c267;" class='bx bxs-show'></i></a></td>
                <td><a href="#"><i style="color: #000000;" class='bx bxs-edit'></i></a></td>
                <td><a href="#"><i style="color: #ff3c3c;" class='bx bx-trash'></i></a></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ['userAssignments', 'urlAssignments', 'csrfToken'],
    data() {
        return {}
    }
}
</script>
