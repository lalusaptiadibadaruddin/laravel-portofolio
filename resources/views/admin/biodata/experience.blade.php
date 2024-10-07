@extends('layouts.main')

@section('container')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $subtitle }}</h4>
    </div>
    <div class="card-body">
            <div class="container">
                <div class="row my-0">
                    <div class="col-lg-12">
                        <button class="btn btn-secondary rounded mb-2" data-bs-toggle="modal" data-bs-target="#ModalAdd"><i
                                class="bi bi-plus"></i> Add Experience</button>
                        <div class="card shadow">
                            <div class="card-body" id="dataPage">
                                <div class="d-flex justify-content-center mt-3">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
  </div>

    <!-- Modal Add -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="titleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModalLabel">Add Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="form-add" enctype="multipart/form-data" action="#" method="POST">
                        @csrf

                        <div class="form-group pb-2">
                            <label for="profile_id" class="pb-1">Profile Name</label>
                            <select class="form-select" name="profile_id" id="profile_id" required aria-label="Default select example">
                                <option value="">Select One</option>
                                @foreach ($listProfile as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group pb-2">
                            <label for="company" class="pb-1">Company</label>
                            <input type="text" name="company" id="company" class="form-control"
                                placeholder="Company" required />
                        </div>

                        <div class="form-group pb-2">
                            <label for="position" class="pb-1">Position</label>
                            <input type="text" name="position" id="position" class="form-control"
                                placeholder="Position" required />
                        </div>


                        <div class="mb-2 row">
                            <div class="col-sm-4">
                                <label for="start_date" class="col-sm-4 col-form-label">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control"
                                required />
                            </div>
                            <div class="col-sm-8">
                                <label for="end_date" class="col-sm-8 col-form-label">End Date (Kosongkan jika masih kerja)</label>
                                <input type="date" name="end_date" id="end_date" class="form-control"/>
                            </div>

                        </div>


                        <div class="form-group pb-2">
                            <label for="description" class="pb-1">Description</label>
                            <input type="text" name="description" id="description" class="form-control"
                                placeholder="description" required />
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add_experience_btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="titleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModalLabel">Edit Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="form-edit" enctype="multipart/form-data" action="#" method="POST">
                        @csrf

                        <input type="hidden" id="idEdit" name="idEdit" />

                        <div class="form-group pb-2">
                            <label for="profile_id" class="pb-1">Profile Name</label>
                            <select class="form-select" name="profile_id" id="profileEdit" required aria-label="Default select example">
                                <option value="">Select One</option>
                                @foreach ($listProfile as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group pb-2">
                            <label for="company" class="pb-1">Company</label>
                            <input type="text" id="companyEdit" name="company" class="form-control" required />
                        </div>

                        <div class="form-group pb-2">
                            <label for="position" class="pb-1">Position</label>
                            <input type="text" id="positionEdit" name="position" class="form-control" required />
                        </div>

                        <div class="mb-2 row">
                            <div class="col-sm-4">
                                <label for="start_date" class="col-sm-4 col-form-label">Start Date</label>
                                <input type="date" id="startEdit" name="start_date"  class="form-control"
                                required />
                            </div>
                            <div class="col-sm-8">
                                <label for="end_date" class="col-sm-8 col-form-label">End Date (Kosongkan jika masih kerja)</label>
                                <input type="date" id="endEdit"  name="end_date" class="form-control"/>
                            </div>

                        </div>


                        <div class="form-group pb-2">
                            <label for="description" class="pb-1">Description</label>
                            <input type="text" id="descriptionEdit" name="description" class="form-control" required />
                        </div>




                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="edit_experience_btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- untuk jquery ajax --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(function() {
            // add ajax request
            $("#form-add").submit(function(e) {
                e.preventDefault();
                const dataForm = new FormData(this);
                $("#add_experience_btn").text('Adding ...');
                $.ajax({
                    url: '{{ route('save.experience') }}',
                    method: 'POST',
                    data: dataForm,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            swal({
                                title: "Success!",
                                text: "experience has been saved!",
                                icon: "success",
                                button: "Close",
                            });
                            fetch();
                            $("#form-add")[0].reset();
                        } else {
                            swal({
                                title: "Error!",
                                text: "Someting Wrong",
                                icon: "error",
                                button: "Close",
                            });
                        }
                        $("#add_experience_btn").text('Submit');
                        $("#ModalAdd").modal('hide');
                    }
                });
            });

            // delete ajax request
            $(document).on('click', '.deleteExperience', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this record!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: '{{ route('delete.experience') }}',
                                method: 'DELETE',
                                data: {
                                    id: id,
                                    _token: csrf
                                },
                                success: function(response) {
                                    if (response.status == 200) {
                                        swal({
                                            title: "Success!",
                                            text: "experience has been deleted!",
                                            icon: "success",
                                            button: "Close",
                                        });
                                        fetch();
                                    } else {
                                        swal({
                                            title: "Error!",
                                            text: "Someting Wrong",
                                            icon: "error",
                                            button: "Close",
                                        });
                                    }
                                }
                            });
                        } else {
                            swal("Record is safe!");
                        }
                    });
            });

            // edit ajax request
            $(document).on('click', '.editExperience', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');

                // $("#image_X").css('display', 'none');
                $.ajax({
                    url: '{{ route('edit.experience') }}',
                    method: 'GET',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#profileEdit").val(response.profile_id);
                        $("#companyEdit").val(response.company);
                        $("#positionEdit").val(response.position);
                        $("#startEdit").val(response.start_date);
                        $("#endEdit").val(response.end_date);
                        $("#descriptionEdit").val(response.description);

                        $("#idEdit").val(response.id);
                    }
                });
            });

            // update ajax request
            $("#form-edit").submit(function(e) {
                //stop submit the form, we will post it manually.
                e.preventDefault();
                // Get form
                var form = $('#form-edit')[0];
                // FormData object
                var dataForm = new FormData(form);
                $("#edit_experience_btn").text('Updating ...');
                $.ajax({
                    url: '{{ route('update.experience') }}',
                    method: 'POST',
                    data: dataForm,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            swal({
                                title: "Updated!",
                                text: "experience has been updated!",
                                icon: "success",
                                button: "Close",
                            });
                            fetch();
                        } else {
                            swal({
                                title: "Error!",
                                text: "Someting Wrong",
                                icon: "error",
                                button: "Close",
                            });
                        }
                        $("#edit_experience_btn").text('Submit');
                        $("#ModalEdit").modal('hide');
                    }
                });
            });

            //get record
            fetch();

            function fetch() {
                $.ajax({
                    url: '{{ route('fetch.experience') }}',
                    method: 'GET',
                    success: function(response) {
                        $("#dataPage").html(response);
                        $("table").DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
        });



    </script>
@endsection
