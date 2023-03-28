@extends('index')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1  style="color: white">Danh Sách Nhân Viên</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li   class="breadcrumb-item"><a style="color: white" href="#">Trang Chủ</a></li>
                    <li  style="color: white" class="breadcrumb-item active">Danh Sách Nhân Viên</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        {{-- @include('admin.users.alert') --}}
        {{-- @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif --}}
        @if(Session::has('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function (event) {
                Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '{{Session::get('error')}}',
                showConfirmButton: false,
                timer: 1500
                })
            })
        </script>
        @endif
        @if(Session::has('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function (event) {
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '{{Session::get('success')}}',
                    showConfirmButton: false,
                    timer: 1500
                    })
                })
            </script>
        @endif
        <div class="row">
            <!-- left column -->
            
            <div class="card card-primary">

            
            <div class="card-body">
                    {{-- <div class="row">
                        <div class="col-sm-12">
                            <table id="employeTable" class="table table-bordered table-striped dataTable dtr-inline"
                                style="text-align:center" aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                       
                                        <th  style="text-align:center" class="sorting sorting_asc">STT</th>
                                        <th  style="text-align:center" class="sorting sorting_asc">Tên Nhân Viên</th>
                                        <th  style="text-align:center" class="sorting sorting_asc">SĐT</th>
                                        <th  style="text-align:center" class="sorting sorting_asc">Email</th>
                                        <th  style="text-align:center" class="sorting sorting_asc">Địa Chỉ</th>
                                        <th  style="text-align:center" class="sorting sorting_asc">Trạng Thái</th>
                                        <th  style="text-align:center" class="sorting sorting_asc">Vai Trò</th>
                                        <th  style="text-align:center" class="sorting sorting_asc"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($users))
                                    @foreach ($users as $key=> $item)
                                    <tr class="odd">
                                        
                                        <td class="dtr-control sorting_1">{{$key+1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>
                                          @if ($item->status==0)
                                          <span class="badge badge-success">Hoạt dộng</span>
                                          @else
                                          <span class="badge badge-danger">Không hoạt động</span>
                                          @endif
                                        </td>
                                        <td>
                                          @if ($item->roll==0)
                                          <span class="badge badge-primary">QTV</span>
                                          @else
                                          <span class="badge badge-info">NV</span>
                                          @endif
                                        </td>
                                        <td>
                                            <a href="{{route('addemploye')}}" class="btn btn-success btn-sm"><i class="fas fa-plus-square"></i></a>
                                            <a href="{{route('employe_edit',['id'=>$item->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('employe_delete',['id'=>$item->id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7">Không có người dùng</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                

                    <div class="event-schedule-area-two bg-color pad100">
                        <div class="container" style="max-width: 100%; margin-bottom: 10px;">
                            <!-- row end-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="home" role="tabpanel">
                                            <div class="table-responsive">
                                                <table id="employeTable" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 5%;" class="text-center" scope="col">STT</th>
                                                            <th style="width: 12%;" class="text-center" scope="col">Ảnh Đại Diện</th>
                                                            <th style="width: 43%;" class="text-center" scope="col">Thông Tin Nhân Viên</th>
                                                            <th style="width: 10%;" class="text-center" scope="col">Vai Trò</th>
                                                            <th style="width: 15%;" class="text-center" scope="col">Trạng Thái</th>
                                                            <th style="width: 15%;" class="text-center" class="text-center" scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (!empty($users))
                                                        @foreach ($users as $key=> $item)
                                                        <tr class="inner-box">
                                                            <td class="text-center" scope="row">
                                                                <div class="event-date">
                                                                    <h3>{{$key+1}}</h3>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="event-img">
                                                                    <img src="{{$item->avatar}}" alt="" />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="event-wrap">
                                                                    <h5 style=" margin-bottom: 0;color:#0561d5;">{{$item->name}}</h5>
                                                                    <div class="meta">
                                                                        <div class="organizers">
                                                                            <i class="fas fa-phone-square-alt" style="padding: 5px 5px; color:green"></i><span>{{$item->phone}}</span>
                                                                        </div>
                                                                        <div class="categories">
                                                                            <i class="fas fa-envelope" style="padding: 5px 5px; color:darkgray"></i><span>{{$item->email}}</span>
                                                                        </div>
                                                                        <div class="time">
                                                                            <i class="fas fa-map-marker-alt" style="padding: 5px 5px;color:red"></i><span>{{$item->address}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="r-no">
                                                                    @if ($item->roll==0)
                                                                    <span class="badge badge-primary" style="font-size: 13px;">QTV</span>
                                                                    @else
                                                                    <span class="badge badge-info" style="font-size: 13px;">NV</span>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="r-no">
                                                                    @if ($item->status==0)
                                                                    <span class="badge badge-success" style="font-size: 13px;">Hoạt dộng</span>
                                                                    @else
                                                                    <span class="badge badge-danger" style="font-size: 13px;">Không hoạt động</span>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="{{route('addemploye')}}" class="btn btn-success btn-sm"><i class="fas fa-plus-square"></i></a>
                                                                <a href="{{route('employe_edit',['id'=>$item->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                                <a href="{{route('employe_delete',['id'=>$item->id])}}" onclick="return confirm('Bạn có chắc muốn Xóa?')" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td colspan="7">Không có người dùng</td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /col end-->
                            </div>
                            <!-- /row end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.col (right) -->
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection