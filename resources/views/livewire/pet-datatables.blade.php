<div>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th class="align-middle text-center" scope="col">ID</th>
                <th class="align-middle text-center" scope="col">Pet Name</th>
                <th class="align-middle text-center" scope="col">Gender</th>
                <th class="align-middle text-center" scope="col">Date of Birth</th>
                <th class="align-middle text-center" scope="col">Age</th>
                <th class="align-middle text-center" scope="col">Owner</th>
                <th class="align-middle text-center" scope="col">Classification</th>
                <th class="align-middle text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pets as $pet)
                <tr>
                    <td>{{ $pet->id }}</td>
                    <td>{{ $pet->pet_name }}</td>
                    <td>{{ $pet->gender }}</td>
                    <td>{{ $pet->birth_date }}</td>
                    <td>{{ $pet->age }}</td>
                    <td>{{ $client->first_name }}</td>
                    <td>{{ $pet->pet_classification }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Action Buttons">
                            <a class="btn btn-primary" onclick="buttonOnClick({{ $pet->id }}, 'view')">View</a>
                            <a class="btn btn-danger" onclick="buttonOnDelete({{ $pet->id }}, 'delete')">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {!! $records->links() !!} --}}
</div>
