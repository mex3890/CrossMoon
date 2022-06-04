<template>
    <div id="content-table">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>ID</th>
                <td>{{ assignment[0].id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ assignment[0].name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ assignment[0].description }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ assignment[0].stat }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ assignment[0].category }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ['assignment'],
    data() {
        return {}
    }
}
</script>
