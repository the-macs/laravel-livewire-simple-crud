<div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-5">
                    <div class="card-header">
                        <strong>Form Input</strong>
                    </div>
                    @if ($isEdit)
                        @livewire('edit-user', ['userId' => $userId], key($userId))
                    @else
                        @livewire('create-user')
                    @endif
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>User Table</strong>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="col-md-12 mr-auto">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model.debounce.500ms="search" placeholder="Search...">
                                    <button class="btn btn-primary btn-sm" type="button" disabled>Search...</button>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Hometown</th>
                                        <th>Act.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <td>{{ $user->age }}</td>
                                            <td>{{ $user->hometown }}</td>
                                            <td>
                                                <button type="button" class="btn btn-secondary"
                                                    wire:click='edit({{ $user->id }})'
                                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Edit</button>
                                                <button type="button" class="btn btn-warning"
                                                    wire:click='delete({{ $user->id }})'
                                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                                                    onclick="return confirm('Sure to delete ?')">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
