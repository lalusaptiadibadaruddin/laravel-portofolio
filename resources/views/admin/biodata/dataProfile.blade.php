<div class="table-responsive pt-2 pb-2 mb-3">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">User</th>
                <th scope="col">Name</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($profile as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('storage/images/' . $item->image) }}" style="width:50px;"></td>
                    <td>{{ $item->User->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a id="{{ $item->id }}" class="btn btn-warning editProfile" data-bs-toggle="modal" data-bs-target="#ModalEdit" style="color: white;"><i class="bi bi-pencil-square"></i></a>
                        <a id="{{ $item->id }}" class="btn btn-danger border-0 deleteProfile"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>

