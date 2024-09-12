@extends('layouts.app')

@section('title', 'Status')

@section('content')

<div class="container">
    <h1 class="text-center">Status</h1>
        
    <div class="mb-4">
        <a class="btn btn-primary text-white" href="{{ route('admin.status.create') }}">Add a Status</a>
    </div>

    <div class="table-responsive">
        @if(count($statuses))
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">
                            Name
                        </th>
                        <th scope="col">
                            Colour 
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
                    @foreach ($statuses as $status)
                        <tr>
                            <td>
                                {{ $status->name }}
                            </td>
                            <td>
                                {{ $status->colour }}
                            </td>
                            <td>
                                {{ $status->created_at?->format('d/m/Y H:i')}}
                            </td>
                            <td>
                                {{ $status->updated_at?->format('d/m/Y H:i')}}
                            </td>
                            <td>
                                <form method="POST" action={{ route('admin.status.destroy', $status) }}>
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('admin.status.edit', $status) }}" class="btn btn-success">Edit</a>
                                    <button class="btn btn-danger" type="submit" onclick="return confirmDelete()">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        @else
            <p>
                There are no statuses at the moment.
            </p>
        @endif
    </div>
</div>
@endsection

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this status?");
}

</script>