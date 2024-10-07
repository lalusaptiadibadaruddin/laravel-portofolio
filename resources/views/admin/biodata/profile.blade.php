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
                                class="bi bi-plus"></i> Add Profile</button>
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
    </div>
  </div>

    <!-- Modal Add -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="titleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModalLabel">Add Profile</h5>
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
                            <label for="user_id" class="pb-1">User ID</label>
                            <select class="form-select" name="user_id" id="user_id" required aria-label="Default select example">
                                <option value="">Select One</option>
                                @foreach ($listUser as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group pb-2">
                            <label for="title" class="pb-1">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Title" required />
                        </div>

                        <div class="form-group pb-2">
                            <label for="description" class="pb-1">Description</label>
                            <input type="text" name="description" id="description" class="form-control"
                                placeholder="description" required />
                        </div>

                        <div class="form-group pb-2">
                            <label for="email" class="pb-1">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="email" required />
                        </div>

                        <div class="form-group pb-2">
                            <label for="image" class="form-label">Image Profile</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            <input class="form-control" type="file" id="image" name="image"
                                onchange="previewImage()">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add_profile_btn">Submit</button>
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
                    <h5 class="modal-title" id="titleModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="form-edit" enctype="multipart/form-data" action="#" method="POST">
                        @csrf
                        <div class="mt-2 d-flex justify-content-center" id="imagesEdit"></div>
                        <input type="hidden" id="idEdit" name="idEdit" />
                        <div class="form-group pb-2">
                            <label for="name" class="pb-1">Name</label>
                            <input type="text" id="nameEdit" name="name" class="form-control" required />
                        </div>

                        <div class="form-group pb-2">
                            <label for="user_id" class="pb-1">User ID</label>
                            <select class="form-select" name="user_id" id="userEdit" required aria-label="Default select example">
                                <option value="">Select One</option>
                                @foreach ($listUser as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group pb-2">
                            <label for="title" class="pb-1">Title</label>
                            <input type="text" id="titleEdit" name="title" class="form-control" required />
                        </div>

                        <div class="form-group pb-2">
                            <label for="description" class="pb-1">Description</label>
                            <input type="text" id="descriptionEdit" name="description" class="form-control" required />
                        </div>

                        <div class="form-group pb-2">
                            <label for="email" class="pb-1">Email</label>
                            <input type="email" id="emailEdit" name="email" class="form-control" required />
                        </div>

                        <div class="form-group pb-2">
                            <label for="image" class="form-label">Image Profile</label>
                           <img class="img-previewEdit img-fluid mb-3 col-sm-5 d-block">
                            <input class="form-control" type="file" id="imageEdit" name="image"
                                 onchange="previewImageEdit()">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="edit_profile_btn">Submit</button>
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
                $("#add_profile_btn").text('Adding ...');
                $.ajax({
                    url: '{{ route('save.profile') }}',
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
                                text: "profile has been saved!",
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
                        $("#add_profile_btn").text('Submit');
                        $("#ModalAdd").modal('hide');
                    }
                });
            });

            // delete ajax request
            $(document).on('click', '.deleteProfile', function(e) {
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
                                url: '{{ route('delete.profile') }}',
                                method: 'DELETE',
                                data: {
                                    id: id,
                                    _token: csrf
                                },
                                success: function(response) {
                                    if (response.status == 200) {
                                        swal({
                                            title: "Success!",
                                            text: "profile has been deleted!",
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
            $(document).on('click', '.editProfile', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');

                // $("#image_X").css('display', 'none');
                $.ajax({
                    url: '{{ route('edit.profile') }}',
                    method: 'GET',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#nameEdit").val(response.name);
                        $("#userEdit").val(response.user_id);
                        $("#titleEdit").val(response.title);
                        $("#descriptionEdit").val(response.description);
                        $("#emailEdit").val(response.email);

                        $("#imagesEdit").html(
                            `<img src="{{ asset('storage/images/${response.image}') }}" width="100" class="img-fluid img-thumbnail">`
                        );
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
                $("#edit_profile_btn").text('Updating ...');
                $.ajax({
                    url: '{{ route('update.profile') }}',
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
                                text: "profile has been updated!",
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
                        $("#edit_profile_btn").text('Submit');
                        $("#ModalEdit").modal('hide');
                    }
                });
            });

            //get record
            fetch();

            function fetch() {
                $.ajax({
                    url: '{{ route('fetch.profile') }}',
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

         // preview image add
         function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview')
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }

        function previewImageEdit() {
            const image = document.querySelector('#imageEdit');
            const imgPreview = document.querySelector('.img-previewEdit')
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }


    </script>
@endsection
