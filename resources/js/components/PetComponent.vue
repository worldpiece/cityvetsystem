<template>
    <div>
        <h1>Pet Details</h1>
        <table class="table table-hover">
            <thead>
                <th>Pet ID</th>
                <th>Pet Name</th>
                <th>Description</th>
                <th>Owner Name</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>Thor</td>
                    <td>Permese Cat</td>
                    <td>World Piece</td>
                    <td>
                        <button class="btn btn-success">Update</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>02</td>
                    <td>Loki</td>
                    <td>Siamese Cat</td>
                    <td>Jack Dawson</td>
                    <td>
                        <button class="btn btn-success">Update</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
