@extends('app')
@section('content')

    @if ($errors->any())
        <div style="color: red;">


            <ul>
                @foreach ($errors->all() as $er)
                    <div class="alert alert-primary" role="alert">
                        {{ $er }}
                        Akun sudah ada
                    </div>
                @endforeach
            </ul>

        </div>
    @endif

    {{--  mengambil dari categories update  --}}
    {{-- "{{ route('category.update', $edit->id) }}" parameter $edit diambil dari categories controller   --}}
    <form action="{{ route('category.update', $edit->id) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="" class="form-label mt-2">Name</label>
            <input type="text" name="category_name" value="{{ $edit->category_name ?? '' }}" class="form-control"
                placeholder="Enter you category name" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Save Change</button>
    </form>
@endsection
