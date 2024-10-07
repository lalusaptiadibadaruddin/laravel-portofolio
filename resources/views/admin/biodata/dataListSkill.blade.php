<div class="table-responsive pt-2 pb-2 mb-3">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                {{-- <th scope="col">Profile ID</th> --}}
                <th scope="col">Profile Name</th>
                {{-- <th scope="col">Skill ID</th> --}}
                <th scope="col">Skill Name</th>
                <th scope="col">Skill Level</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($listSkill as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td>{{ $item->profile_id }}</td> --}}
                    <td>{{ $item->profile_name }}</td>
                    {{-- <td>{{ $item->skill_id }}</td> --}}
                    <td>{{ $item->skill_name }}</td>
                    <td>{{ $item->skill_level }}</td>
                    <td>
                        <a id="{{ $item->id }}" class="btn btn-warning editSkill" data-bs-toggle="modal" data-bs-target="#ModalEdit" style="color: white;"><i class="bi bi-pencil-square"></i></a>
                        <a id="{{ $item->id }}" class="btn btn-danger border-0 deleteSkill"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>

