<template>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
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
                <td>{{assignment.id}}</td>
                <td>{{assignment.name}}</td>
                <td>{{assignment.category}}</td>
                <td>{{assignment.stat}}</td>
                <td>2</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: ['userAssignments', 'urlAssignments', 'csrfToken'],
        data() {
            return {

            }
        }
    }
</script>
