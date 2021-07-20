@extends('admin.master.master')
@section('content')
    <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
            <a href="{{route('sanpham.indexAdmin')}}" style="color:black;"><h3>SẢN PHẨM</h3></a>
          </div>
          <div class="add-pro">
            <a href="{{ route('sanpham.create') }}">
              <i class="fas fa-plus"></i>
              <p>Thêm sản phẩm</p>
            </a>
          </div>
        </div>
        @include('admin.mess.message')
        <div class="row">
            <div class="col-sm-12">
                <div class="ds-sanpham">
                   <form action="">
                  <div class="head-table">
                    <div style="    width: calc(100% - 434px);" class="search">
                     
                        <input style="padding-right: 4px" class="search-txt" type="text" placeholder="Search.." name="search">
                      
                    </div>
                    <div style="margin-right: 16px;" class="group-filter-btn">
                      <div class="filter-catagories-sport-wrap">
                        <select style="height: 100%;border-right: none;
                        border-radius: 3px 0 0 3px;" style="border-radius: 3px 0 0 3px; border-right: unset" class="textbox" name="monthethao" id="monthethao">
                          <option value="">Môn thể thao</option>
                          <?php $monthethao = App\MonTheThao::all()  ?>
                          @foreach($monthethao as $i)
                            <option value="{{$i['id']}}">{{$i['ten_the_thao']}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="filter-catagories-sport-wrap">
                        <select style="height: 100%;border-radius: unset;" class="textbox" style="border-radius: unset" name="nhasanxuat" id="nhasanxuat">
                          <option value="">Nhà sản xuất</option>
                          <?php $nhasanxuat = App\NhaSanXuat::all()  ?>
                          @foreach($nhasanxuat as $i)
                            <option value="{{$i['id']}}">{{$i['ten_nha_san_xuat']}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="filter-catagories-sport-wrap">
                        <select style="height: 100%;border-radius: 0 3px 3px 0;
                        border-left: 0;" class="textbox" style="border-radius: 0 3px 3px 0; border-left: unset" name="loaisanpham" id="loaisanpham">
                          <option value="">Loại sản phẩm</option>
                          <?php $loaisanpham = App\LoaiSanPham::all()  ?>
                          @foreach($loaisanpham as $i)
                            <option value="{{$i['id']}}">{{$i['ten_loai_san_pham']}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <input type="submit" style="color: #fff;
                      background-color: #0069d9;
                      border-color: #0062cc;" class="btn" value="Tìm kiếm">
                  </div>
                </form>
                  <div class="ds-sanpham-div">
                    <table class="table-ds-sanpham">
                      <thead>
                          <tr>
                              <th>Tên sản phẩm</th>
                              <th>Nhà sản xuất</th>
                              <th>Loại sản phẩm</th>
                              <th>BM thể thao</th>
                              <th>Giá bán</th>
                              <th>Giá gốc</th>
                              <th>Giảm giá(%)</th>
                              <th>Hình ảnh</th>
                              <th>Yêu thích</th>
                              <th>Đánh giá</th>
                              <th>Mô tả</th>
                              <th>Chức năng</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($dsSanPham as $ds)
                        <tr>
                            <td>{{$ds['ten_san_pham']}}</td>
                            <td>{{$ds->nhaSanXuat->ten_nha_san_xuat}}</td>
                            <td>{{$ds->loaiSanPham->ten_loai_san_pham}}</td>
                            <td>{{$ds->monTheThao->ten_the_thao}}</td>
                            <td>{{$ds['gia_ban']}}</td>
                            <td>{{$ds['gia_goc']}}</td>
                            <td>{{$ds['giam_gia']}}</td>
                            <td>
                              @foreach($ds->anh as $anh)
                                @if($anh->anhchinh == 1)
                                  <img src="{{asset($anh->link)}}" alt="anh">
                                @endif
                              @endforeach
                            </td>
                            <td>
                              <div class="yeu_thich">
                                @foreach($dsYeuThich as $like)
                                  @if($ds->id == $like->san_phams_id)
                                    <span style="margin-right: 2px;">{{ $like->yeu_thich }}</span>
                                    <i style="color:#000" class="fas fa-heart"></i>
                                  @endif
                                @endforeach
                                <div id="popover-catagories" class="popover">
                                  <div class="arrow">
                                  </div>
                                  <ul style="margin-bottom: 0">
                                    @foreach($listYeuThich as $like)
                                      @if($ds->id == $like->san_phams_id)
                                        <li style="padding: 4px;
                                        list-style: none; font-size: 12px; ">{{ $like->taiKhoan->ho_ten }}</li>
                                      @endif
                                    @endforeach
                                  </ul>
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="danh_gia">
                                @foreach($dsDanhGia as $rate)
                                  @if($ds->id == $rate->san_phams_id)
                                    <span style="margin-right: 2px;">{{round($rate->danh_gia,1)}}</span><i style="color:#FF912C;" class='fa fa-star fa-fw'></i>
                                  @endif
                                @endforeach
                                <div id="popover-catagories" style="min-width: 200px;" class="popover">
                                  <div class="arrow"></div>
                                  <ul style="margin-bottom: 0">
                                    @foreach($listDanhGia as $rate)
                                      @if($ds->id == $rate->san_phams_id)
                                        <li style="padding: 4px;
                                        list-style: none; font-size: 12px; display:flex">
                                          <div style="width: 50%">
                                            {{ $rate->taiKhoan->ho_ten }}
                                          </div>
                                          <div style="width: 50%">
                                            <div class='rating-stars text-center'>
                                              <ul id='stars'>
                                                @for($i=0; $i < 5; $i++)
                                                  @if($i < $rate->diem)
                                                    <li class='star'>
                                                      <i style="color:#FF912C;" class='fa fa-star fa-fw'></i>
                                                    </li>
                                                  @else
                                                    <li class='star'>
                                                      <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                  @endif
                                                @endfor
                                              </ul>
                                            </div>
                                          </div>
                                        </li>
                                      @endif
                                    @endforeach
                                  </ul>
                                </div>
                              </div>
                            </td>
                            <td>
                              <?php
                                echo $ds->mo_ta;
                              ?>
                            </td>
                            <td style="display:flex">
                              <a href="{{route('sanpham.edit',['id' => $ds['id']])}}" class="edit-btn"><i class="fas fa-edit"></i></a>
                              <form id="sanpham_{{$ds['id']}}" action="{{route('sanpham.delete',['id' => $ds['id']])}}" method="POST">
                                @csrf
                                @method('DELETE')
                              <span class="delete-btn cursor" data-target="#modalSanPham" data-toggle="modal" data-id="{{$ds['id']}}"><i class="fas fa-trash-alt"></i></span>
                              </form>
                              <a href="{{route('chitietsanpham.index',['id' => $ds['id']])}}" class="view-detail-btn"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                  </table>
                  <nav aria-label="Page navigation example" style="margin-top:20px">
                    <ul class="pagination">
                      {!! $dsSanPham->appends(request()->query())->links() !!}
                    </ul>
                  </nav>
                  </div>
              </div>
            </div>
        </div>
    </div>
         <!-- The Modal -->
  <div class="modal fade" id="modalSanPham">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="color:red">Cảnh báo</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          Bạn có chắc muốn xóa
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" id="sanpham" style="background-color:red;color:white">confirm</button>
        </div>
        
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>
        $('.delete-btn').click(function(){
          let id = $(this).data('id');
          $('#sanpham').attr('data-id',id);
        })
        $('#sanpham').click(function(){
          let id = $(this).data('id');
          $('#sanpham_'+id).submit();
        })
    </script>
@endsection