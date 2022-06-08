<template>
    <div class="form-assignment">
        <form>
            <h3>Create Assignment</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="assignment name">
<!--                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Select a category</option>
                    <option v-for="category in categories" :value="category.id">{{category.name}}</option>

                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Category</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Select a status</option>
                    <option v-for="stat in stats" :value="stat.id">{{stat.name}}</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['stats', 'categories'],
        data() {
            return {

            }
        }
    }
</script>
