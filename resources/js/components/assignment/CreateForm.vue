<template>
    <div class="form">
        <form>
            <h3>Create Assignment</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="assignment name">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        props: [],
        data() {
            return {

            }
        }
    }
</script>

<style scoped>
    .form {
        background-color: #ffffff;
        border-radius: 5px;
        border: 1px solid rgba(192, 192, 192, 0.3);
        box-shadow: 0 0 10px #ccc, 5px 5px 10px #ccc;
        padding: 20px 40px;
    }
</style>
