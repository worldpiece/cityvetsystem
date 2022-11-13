<div>
    <table class="table table-bordered ">
        <thead>
            <tr>
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
                    <td>{{ ucfirst($staff->employee_no) }}</td>
                    <td>{{ ucfirst($staff->first_name) }}</td>
                    <td>{{ ucfirst($staff->middle_name) }}</td>
                    <td>{{ ucfirst($staff->last_name) }}</td>
                    <td>{{ ucfirst($staff->designation) }}</td>
                    <td>{{ ucfirst($staff->contact_no) }}</td>
                    <td>{{ ucfirst($staff->address) }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Action Buttons">
                            <form method="get" action="{{ route('staff.show', $staff->employee_no) }}">
                                <button class="btn btn-success" type="submit">Show</button>
                                {{ csrf_field() }}
                            </form>
                            {{-- <a class="btn btn-primary" onclick="buttonOnClick({{$rec->record_id}}, 'edit')">Edit</a> --}}
                            <form method="post" action="{{ route('staff.edit', $staff->employee_no) }}"><button
                                    class="btn btn-primary" type="submit">Edit</button> {{ csrf_field() }}</form>
                            <form method="post" action="{{ route('staff.delete', $staff->employee_no) }}"><button
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to Delete {{ $staff->first_name }}?')"
                                    type="submit">Delete</button> {{ csrf_field() }}</form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {!! $records->links() !!} --}}
</div>

<!-- Staff Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">View Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/record/update" method="POST" enctype="multipart/form-data" id="form-modal-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" id="csrf" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group col-md-2" style="overflow: auto;">
                            <div class="md-form mb-1">
                                <span class="border-0"><strong>Employee_no</strong></span>
                                <input type="text" name="employee_no" id="employee_no" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4" style="overflow: auto;">
                            <div class="md-form mb-1">
                                <span class="border-0"><strong>First name</strong></span>
                                <input type="text" name="firstname" id="firstname" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4" style="overflow: auto;">
                            <div class="md-form mb-1">
                                <span class="border-0"><strong>Middle name</strong></span>
                                <input type="text" name="middlename" id="middlename" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4" style="overflow: auto;">
                            <div class="md-form mb-1">
                                <span class="border-0"><strong>Last name</strong></span>
                                <input type="text" name="lastname" id="lastname" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="form-group col-md-3" style="overflow: auto;">
                            <div class="md-form mb-1">
                                <span class="border-0">Barangay</span>
                                <select class="form-control" id="barangay" name="barangay">
                                    <option>Alos</option>
                                    <option>Amandiego</option>
                                    <option>Victoria</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="form-modal-data">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End of View Modal -->

<script>
    function fetchModalData(id, action) {
        csrf = $('#csrf').val()
        $.ajax({
            method: 'POST',
            url: "{{ route('staff.show') }}",
            data: {
                _token: csrf,
                id: id
            },
            success: function(data) {
                parsed = JSON.parse(data)
                $('#record_id').val(parsed.record_id)
                $('#lastname').val(parsed.lastname)
                $('#firstname').val(parsed.firstname)
                $('#viewModal').modal('show');
                if (action === 'view') {
                    $("#form-modal-data :input").prop("disabled", true);
                } else {
                    $("#form-modal-data :input").prop("disabled", false);
                }
            },
            error: function(err) {
                console.log(err)
            }
        })
    }
</script>
