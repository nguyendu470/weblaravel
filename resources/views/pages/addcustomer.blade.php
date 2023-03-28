@extends('index')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: white">Thêm Khách Hàng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a  style="color: white" href="#">Trang chủ</a></li>
            <li  style="color: white" class="breadcrumb-item active">Thêm Khách Hàng</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      {{-- @include('admin.users.alert') --}}
      @if(Session::has('success'))
      <div class="alert alert-success">
          {{Session::get('success')}}
      </div>
      @endif
      @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
      @endif
      @if(Session::has('qtv'))
        <script>
            
            document.addEventListener("DOMContentLoaded", function (event) {
                Swal.fire({
                    icon: 'error',
                    title: 'Không thể truy cập',
                    text: '{{Session::get('qtv')}}',
                })
        })
        </script>
        @endif
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary" style="width: 50%; margin-left: 25%">
            {{-- <div class="card-header">
              <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
            </div> --}}
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputRoll">Nhân Viên Bán Hàng:</label>
                  {{-- <select name="employe_id" class="form-control" id="exampleInputRoll" >
                    @if(!empty($id_employe))
                    @foreach($id_employe as $key=>$item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                    @else
                    <option value="null">Không có Nhân Viên</option>
                    @endif
                </select>  --}}
                <input type="hidden" value="{{$user->id}}" name="employe_id">
                <input type="text" value="{{$user->name}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputFullname">Họ Tên Khách Hàng:</label>
                  <input type="text" value="{{old('name')}}" name="name" class="form-control"  placeholder="Nhập họ tên khách hàng">
                  
                  {{-- @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->name() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif --}}
                  @error('name')
                  <span style="color: red">* {{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPhone">SĐT:</label>
                  <input type="text" inputmode="numeric"  name="phone" value="{{old('phone')}}" class="form-control" id="exampleInputPhone" placeholder="Nhập SĐT">
                  @error('phone')
                  <span style="color: red">* {{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email:</label>
                  <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" placeholder="Nhập email">
                  @error('email')
                  <span style="color: red">* {{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputAddress">Địa Chỉ:</label>
                  <input type="text" name="address" class="form-control" value="{{old('address')}}" id="exampleInputAddress" placeholder="Nhập địa chỉ">
                  @error('address')
                    <span style="color: red">* {{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputRoll">Trạng Thái</label>
                  {{-- <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> --}}
                  {{-- <input type="radio" name="Admim" value="0" class="form-control" checked="checked" />
                  <input type="radio" name="Employe" value="1" class="form-control" id="exampleInputRoll/> --}}
                  <select name="status" class="form-control" id="exampleInputRoll" >
                    <option value="0">Hoạt động</option>
                    <option value="1">Không hoạt động</option>
                  </select>
                </div>
              <!-- /.card-body -->
              <div class="card-footer row" style="justify-content: flex-end; background-color: white;padding-top: 24px;">
                <button style="background-color:#5C5696;margin-right: 20px;width: 70px" type="submit" class="btn btn-primary">Lưu</button>
                <input style="width: 85px" type="button" class="btn btn-secondary" onclick="location.href='{{route('listemploye')}}'" value="Hủy bỏ">
              </div>
              @csrf
              
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  @endsection