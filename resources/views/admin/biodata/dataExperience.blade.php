<div class="table-responsive pt-2 pb-2 mb-3">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Profile Name</th>
                <th scope="col">Company</th>
                <th scope="col">Position</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($experience as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->joinProfilExperience->name }}</td>
                    <td>{{ $item->company }}</td>
                    <td>{{ $item->position }}</td>
                    <td>{{ $item->start_date }}</td>
                    <td>@if (is_null($item->end_date))
                        Sekarang
                    @else
                      {{ $item->end_date }}
                    @endif
                    </td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <a id="{{ $item->id }}" class="btn btn-warning editExperience" data-bs-toggle="modal" data-bs-target="#ModalEdit" style="color: white;"><i class="bi bi-pencil-square"></i></a>
                        <a id="{{ $item->id }}" class="btn btn-danger border-0 deleteExperience"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>

