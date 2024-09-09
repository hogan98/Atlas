@extends('layouts.app')

@section('title', 'Users')

@section('content')

<div class="container">
    <h1 class="text-center">Users</h1>

    <div class="table-responsive">
        @if(count($users))
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">
                            Name
                        </th>
                        <th scope="col">
                            email
                        </th>
                        <th scope="col">
                            Created At
                        </th>
                        <th scope="col">
                            Updated At
                        </th>
                        <th scope="col">
                            Options
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->created_at?->format('d/m/Y H:i')}}
                            </td>
                            <td>
                                {{ $user->updated_at?->format('d/m/Y H:i')}}
                            </td>
                            <td>
                                <form method="POST" action={{ route('admin.users.destroy', $user) }}>
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-success">Edit</a>
                                    <button class="btn btn-danger" type="submit" onclick="return confirmDelete()">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        @else
            <p>
                There are no users at the moment.
            </p>
        @endif
    </div>
</div>
@endsection

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this User?");
}

</script>