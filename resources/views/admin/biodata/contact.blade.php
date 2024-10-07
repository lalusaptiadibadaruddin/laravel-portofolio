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
                                class="bi bi-plus"></i> Add Contact</button>
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
                    <h5 class="modal-title" id="titleModalLabel">Add Contact</h5>
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
                            <label for="social_id" class="pb-1">Media Social</label>
                            <select class="form-select" name="social_id" id="social_id" required aria-label="Default select example">
                                <option value="">Select One</option>
                                @foreach ($listSocial as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group pb-2">
                            <label for="name" class="pb-1">Contact</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="contact" required />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add_contact_btn">Submit</button>
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
                    <h5 class="modal-title" id="titleModalLabel">Edit Contact</h5>
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
                            <label for="social_id" class="pb-1">Media Social</label>
                            <select class="form-select" name="social_id" id="socialEdit" required aria-label="Default select example">
                                <option value="">Select One</option>
                                @foreach ($listSocial as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pb-2">
                            <label for="name" class="pb-1">Contact</label>
                            <input type="text" id="nameEdit" name="name" class="form-control" required />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="edit_contact_btn">Submit</button>
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
                $("#add_contact_btn").text('Adding ...');
                $.ajax({
                    url: '{{ route('save.contact') }}',
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
                                text: "Contact has been saved!",
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
                        $("#add_contact_btn").text('Submit');
                        $("#ModalAdd").modal('hide');
                    }
                });
            });

            // delete ajax request
            $(document).on('click', '.deleteContact', function(e) {
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
                                url: '{{ route('delete.contact') }}',
                                method: 'DELETE',
                                data: {
                                    id: id,
                                    _token: csrf
                                },
                                success: function(response) {
                                    if (response.status == 200) {
                                        swal({
                                            title: "Success!",
                                            text: "Contact has been deleted!",
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
            $(document).on('click', '.editContact', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('edit.contact') }}',
                    method: 'GET',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#profileEdit").val(response.profile_id);
                        $("#socialEdit").val(response.social_id);
                        $("#nameEdit").val(response.name);
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
                $("#edit_contact_btn").text('Updating ...');
                $.ajax({
                    url: '{{ route('update.contact') }}',
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
                                text: "contact has been updated!",
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
                        $("#edit_contact_btn").text('Submit');
                        $("#ModalEdit").modal('hide');
                    }
                });
            });

            //get record
            fetch();

            function fetch() {
                $.ajax({
                    url: '{{ route('fetch.contact') }}',
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
