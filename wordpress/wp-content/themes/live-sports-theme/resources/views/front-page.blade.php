{{-- 
    Front Page Template - Trang hiển thị danh sách trận đấu
    Template Name: Live Sports Homepage
--}}
@extends('layouts.app')

@section('content')
  <div class="live-sports-container">
    {{-- Các nút lọc trận đấu --}}
    <div class="filters">
      <a href="{{ home_url('/') }}" class="filter-btn {{ request()->get('filter', 'all') === 'all' ? 'active' : '' }}">Tất cả</a>
      <a href="{{ home_url('/?filter=live') }}" class="filter-btn live {{ request()->get('filter') === 'live' ? 'active' : '' }}">Trực tiếp</a>
      <a href="{{ home_url('/?filter=finished') }}" class="filter-btn {{ request()->get('filter') === 'finished' ? 'active' : '' }}">Đã kết thúc</a>
      <a href="{{ home_url('/?filter=scheduled') }}" class="filter-btn {{ request()->get('filter') === 'scheduled' ? 'active' : '' }}">Lịch thi đấu</a>
    </div>

    {{-- Component hiển thị danh sách trận đấu với filter tương ứng --}}
    <x-match-list :filter="request()->get('filter', 'all')" />
  </div>
@endsection 