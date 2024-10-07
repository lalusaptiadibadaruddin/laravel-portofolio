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
                                class="bi bi-plus"></i> Add User</button>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="form-add" enctype="multipart/form-data" action="#" method="POST">
                        @csrf
                        <div class="form-group pb-2">
                            <label for="name" class="pb-1">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="name" required />
                        </div>

                        <div class="form-group pb-2">
                            <label for="email" class="pb-1">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="email" required />
                        </div>

                        <div class="form-group pb-2">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" name="role" id="role"  required aria-label="Default select example">
                                <option value="">Select One</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                              </select>
                          </div>

                        <div class="form-group pb-2">
                            <label for="password" class="pb-1">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="password" required />
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add_user_btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="titleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="form-edit" enctype="multipart/form-data" action="#" method="POST">
                        @csrf
                        <input type="hidden" id="idEdit" name="idEdit" />
                        <div class="form-group pb-2">
                            <label for="name" class="pb-1">Name</label>
                            <input type="text" id="nameEdit" name="name" class="form-control" required />
                        </div>



                        <div class="form-group pb-2">
                            <label for="email" class="pb-1">Email</label>
                            <input type="email" id="emailEdit" name="email" class="form-control" required />
                        </div>

                        <div class="form-group pb-2">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" name="role" id="role"  required aria-label="Default select example">
                                <option value="">Select One</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>

                              </select>
                          </div>

                        <div class="form-group pb-2">
                            <label for="password" class="pb-1">Password</label>
                            <input type="password" name="password" id="passwordEdit" class="form-control"
                                placeholder="password" required />
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="edit_user_btn">Submit</button>
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
                $("#add_user_btn").text('Adding ...');
                $.ajax({
                    url: '{{ route('save.user') }}',
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
                                text: "user has been saved!",
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
                        $("#add_user_btn").text('Submit');
                        $("#ModalAdd").modal('hide');
                    }
                });
            });

            // delete ajax request
            $(document).on('click', '.deleteUser', function(e) {
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
                                url: '{{ route('delete.user') }}',
                                method: 'DELETE',
                                data: {
                                    id: id,
                                    _token: csrf
                                },
                                success: function(response) {

                                    if (response.status == 200) {
                                        swal({
                                            title: "Success!",
                                            text: "user has been deleted!",
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
            $(document).on('click', '.editUser', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('edit.user') }}',
                    method: 'GET',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#nameEdit").val(response.name);
                        $("#emailEdit").val(response.email);
                        $("#passwordEdit").val('');
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
                $("#edit_user_btn").text('Updating ...');
                $.ajax({
                    url: '{{ route('update.user') }}',
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
                                text: "user has been updated!",
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
                        $("#edit_user_btn").text('Submit');
                        $("#ModalEdit").modal('hide');
                    }
                });
            });

            //get record
            fetch();

            function fetch() {
                $.ajax({
                    url: '{{ route('fetch.user') }}',
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
