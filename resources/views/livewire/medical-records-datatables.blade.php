<div>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th class="align-middle text-center" scope="col">ID</th>
                <th class="align-middle text-center" scope="col">Pet Name</th>
                <th class="align-middle text-center" scope="col">Findings</th>
                <th class="align-middle text-center" scope="col">Appointment Date</th>
                <th class="align-middle text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medical_records as $med)
                <tr>
                    <td>{{ $med->id }}</td>
                    <td>{{ $med->name }}</td>
                    <td>{{ ucfirst($med->findings) }}</td>
                    <td>{{ $med->appointment_date }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Action Buttons">
                                    
                            {{-- <form method="post" action="{{ route('medical-records.update', $med->id) }}"><button
                                    class="btn btn-warning" type="submit">Edit</button> {{ csrf_field() }}</form> &nbsp --}}
                                       
                            {{-- <form method="post" action="{{ route('medical-records.destroy', $med->id) }}"><button
                                    class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete {{ $med->name }}?')" type="submit">Delete</button> {{ csrf_field() }}</form> --}}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
