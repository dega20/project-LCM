@extends('layouts.app')
@section('content_title', 'Dashboard')
@section('content')
<div class="row">
    <x-dashboard-card type="bg-info" icon="fas fa-users" label="Total Users" value="{{ $totalUsers }}" />
    <x-dashboard-card type="bg-warning" icon="fas fa-suitcase" label="Total Produk" value="{{ $totalProduk }}" />
    <x-dashboard-card type="bg-success" icon="fas fa-shopping-bag" label="Total Layanan" value="{{ $totalLayanan }}" />
    <x-dashboard-card type="bg-teal" icon="fas fa-envelope" label="Total Apply" value="{{ $totalApply }}" />
</div>
{{-- <div class="card">
    <div class="card-header">
            <h4>Dashboard</h4>
                </div>
            <div class="card-body">
        <h5 class="card-title">Welcome to the Dashboard, <strong>{{ Auth::user()->name }}</strong></h5>
        <br>
        <p class="card-text">This is your main dashboard where you can find an overview of your application. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus, quasi! Consequatur voluptatibus a quibusdam, unde architecto dolores suscipit! Doloremque perferendis debitis esse enim autem quod et ea explicabo doloribus nihil? Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi in veritatis optio sit, maiores atque distinctio voluptatem ab hic dolorum iure molestias porro voluptate odio inventore ut, animi neque quo. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non, quo, voluptatum quisquam, quaerat ut eius praesentium aspernatur veniam corporis distinctio voluptate? Veniam quidem molestiae officia quas animi at consequuntur repellendus. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique qui quo recusandae ea ipsum ducimus veritatis ipsa aut fugit consectetur maiores, excepturi quam blanditiis, non tempore laudantium quos inventore consequuntur!</p>
        </div>
</div> --}}
@endsection