<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <input type="text" wire:model="search" 
            class="form-control" placeholder="search...">
            {{-- name="search" ganti ke wire:model="search" --}}
        </div>
        <div class="col-md-2">
            <a href="/user/create" class="btn btn-success btn-block">New</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4">
            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <b>{{ session('message') }}</b>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        @forelse ($users as $item)
        <div class="col-md-4 mt-4">
            <div class="card">
                <div class="card-header">{{ $item->name }}</div>
                <div class="card-body">
                    Email: {{ $item->email }}
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-outline-primary">Edit</a>
                    @if ($confirm == $item->id)
                    <button wire:click="deleted({{ $item->id }})" class="btn btn-danger">Sure?</button>
                    @else
                    <button wire:click="confirmDelete({{ $item->id }})" class="btn btn-outline-danger">Delete</button>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12 mt-4">
            <h1>Sorry, data not found!</h1>
        </div>
        @endforelse
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>