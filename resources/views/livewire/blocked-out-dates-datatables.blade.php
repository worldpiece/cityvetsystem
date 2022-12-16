<div>
    <div>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th class="align-middle text-center" scope="col">ID</th>
                <th class="align-middle text-center" scope="col">Date</th>
                <th class="align-middle text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blocked_out_dates as $blocked_out_date)
                <tr>
                    <td>{{ $blocked_out_date->id }}</td>
                    <td>{{ $blocked_out_date->start }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Action Buttons">
                            {{-- <form method="post" action="{{ route('admin.edit', $blocked_out_date->id) }}">
                                {{ csrf_field() }}
                                <button class="btn btn-primary" type="submit">Edit</button> 
                            </form> --}}
                            <form method="post" action="{{ route('admin.delete', $blocked_out_date->id) }}">
                                {{ csrf_field() }}
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete {{ $blocked_out_date->start }}?')"
                                    type="submit">Delete
                                </button> 
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
