<div>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th class="align-middle text-center" scope="col">Medicine Name</th>
                <th class="align-middle text-center" scope="col">Quantity</th>
                <th class="align-middle text-center" scope="col">Expiration Date</th>
                <th class="align-middle text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meds as $med)
                <tr>
                    <td>{{ ucfirst($med->name) }}</td>
                    <td>{{ $med->quantity }}</td>
                    <td>{{ $med->expiry_date }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Action Buttons">
                            <!-- <form method="post" action="{{ route('medicine.edit', $med->id) }}"><button
                                    class="btn btn-primary" type="submit">Edit</button> {{ csrf_field() }}</form> -->
                                    
                            <form method="post" action="{{ route('medicine.stockIn', $med->id) }}"><button
                                    class="btn btn-primary" type="submit">Stock In</button> {{ csrf_field() }}</form> &nbsp

                            <form method="post" action="{{ route('medicine.stockOut', $med->id) }}"><button
                                    class="btn btn-primary" type="submit">Stock out</button> {{ csrf_field() }}</form> &nbsp
                                       
                            <form method="post" action="{{ route('medicine.delete', $med->id) }}"><button
                                    class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete {{ $med->name }}?')" type="submit">Delete</button> {{ csrf_field() }}</form>`
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {!! $records->links() !!} --}}
</div>
