@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card mt-3">
                    <div class="card-header">
                        Diskon
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <div class="row">
                            <div class="col-md-12 d-flex flex-row-reverse my-3">
                                <a href="{{route('admin.discount.create')}}" class="btn btn-primary btn-sm">Add Discount</a>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Percentage</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($discounts as $discount)
                                    <tr>
                                        <td>{{$discount->name}}</td>
                                        <td>{{$discount->code}}</td>
                                        <td>{{$discount->description}}</td>
                                        <td>{{$discount->percentage}}%</td>
                                        <td>
                                            <form action="{{route('admin.discount.edit', $discount->id)}}">
                                                @csrf
                                                <button class="btn-warning btn-sm">Edit</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.discount.destroy', $discount->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                            
                                        
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No Discount</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection