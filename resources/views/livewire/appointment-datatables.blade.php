<div>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th class="align-middle text-center" scope="col">Date</th>
                <th class="align-middle text-center" scope="col">Client Name</th>
                <th class="align-middle text-center" scope="col">Pet Name</th>
                <th class="align-middle text-center" scope="col">Gender</th>
                <th class="align-middle text-center" scope="col">Symptoms</th>
                <th class="align-middle text-center" scope="col">Type of Appointment</th>
                {{-- <th class="align-middle text-center" scope="col">Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ date('m/d/Y', strtotime($appointment->start)) }}</td>
                    <td>{{ ucfirst($appointment->first_name) }}</td>
                    <td>{{ ucfirst($appointment->pet_name) }}</td>
                    <td>{{ ucfirst($appointment->gender) }}</td>
                    <td>{{ ucfirst($appointment->symptoms) }}</td>
                    <td>{{ ucfirst($appointment->type_of_appointment) }}</td>
                    {{-- <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Action Buttons">
                            <form method="post" action="{{ route('appointment.edit', $appointment->id) }}"><button
                                    class="btn btn-primary" type="submit">Edit</button> {{ csrf_field() }}</form>
                            <form method="post" action="{{ route('appointment.destroy', $appointment->id) }}"><button
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to Delete {{ $appointment->_name }}?')"
                                    type="submit">Delete</button> {{ csrf_field() }}</form>
                            <a class="btn btn-primary" onclick="buttonOnClick({{ $appointment->id }}, 'view')">View</a>
                            <a class="btn btn-danger"
                                onclick="buttonOnDelete({{ $pet->id }}, 'delete')">Delete</a>
                        </div>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {!! $records->links() !!} --}}
</div>
