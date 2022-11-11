<div>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th class="align-middle text-center" scope="col">ID</th>
                <th class="align-middle text-center" scope="col">Employee No.</th>
                <th class="align-middle text-center" scope="col">First Name</th>
                <th class="align-middle text-center" scope="col">Middle Name</th>
                <th class="align-middle text-center" scope="col">Last Name</th>
                <th class="align-middle text-center" scope="col">Designation</th>
                <th class="align-middle text-center" scope="col">Contact No.</th>
                <th class="align-middle text-center" scope="col">Address</th>
                <th class="align-middle text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $staff)
                <tr>
                    <td>{{ $staff->id }}</td>
                    <td>{{ ucfirst($staff->employee_no) }}</td>
                    <td>{{ ucfirst($staff->first_name) }}</td>
                    <td>{{ ucfirst($staff->middle_name) }}</td>
                    <td>{{ ucfirst($staff->last_name) }}</td>
                    <td>{{ ucfirst($staff->designation) }}</td>
                    <td>{{ ucfirst($staff->contact_no) }}</td>
                    <td>{{ ucfirst($staff->address) }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Action Buttons">
                            <form method="get" action="{{ route('staff.show', $staff->id) }}"><button
                                class="btn btn-success" type="submit">Show</button> {{ csrf_field() }}</form>
                            <form method="post" action="{{ route('staff.edit', $staff->id) }}"><button
                                    class="btn btn-primary" type="submit">Edit</button> {{ csrf_field() }}</form>
                            <form method="post" action="{{ route('staff.delete', $staff->id) }}"><button
                                    class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete {{ $staff->first_name }}?')" type="submit">Delete</button> {{ csrf_field() }}</form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {!! $records->links() !!} --}}
</div>
