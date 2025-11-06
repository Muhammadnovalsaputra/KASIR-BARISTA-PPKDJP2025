@extends('app')
@section('content')
@section('title', 'Data Categories')
{{--  @dd($users)  --}}
<div class="d-flex justify-content-end">
    <a href="{{ route('order.create') }}" class="btn btn-primary m-4">ADD Order</a>
</div>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Order Number</th>
        <th>Amount</th>
        <th>Change</th>
        <th>SubTotal</th>
        <th>Status</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    @foreach ($datas as $i => $data)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $data->category_name }}</td>
            <td>{{ $data->category_name }}</td>
            <td>{{ $data->category_name }}</td>
            <td>{{ $data->category_name }}</td>
            <td>{{ $data->category_name }}</td>
            <td>{{ $data->category_name }}</td>
            <td>
                <a href="{{ route('order.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>


                <form action="{{ route('order.destroy', $data->id) }}" method="post"
                    onsubmit="return confirm('R u sure wanna delete it')" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                </form>

            </td>
        </tr>
    @endforeach
</table>
@endsection
