<table class="table-ds-sanpham">
    <thead>
        <tr>
            <th>Mã hóa đơn</th>
            <th>Tên khách hàng</th>
            <th>Ngày lập hóa đơn</th>
            <th>Tổng tiền</th>
            <th>Chốt đơn</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
      @foreach($arrays as $bill)
      <tr>
          <td>{{ $bill->id }}</td>
          <td>{{ $bill->taiKhoan->ho_ten}}</td>
          <td>{{ $bill->ngay_lap_hd }}</td>
          <td>{{number_format($bill->tong_tien,0,',','.').' '.'VNĐ'}}</td>
          @if ($bill->chot_don == true)
            <td>
              <a class="checked">Đã Chốt</a>
            </td>
          @else
            <td> 
              <a onclick="checkbill({{ $bill->id }})" class="not-check-btn">Chưa Chốt</a>
            </td>
          @endif
          <td>
            <a onclick="deleteBill({{ $bill->id }})" class="delete-btn"><i class="fas fa-trash-alt"></i></a>
            <a  onclick="showModal('admin/bill/bill-detail/{{ $bill->id }}','Chi tiết hóa đơn')" class="view-detail-btn"><i class="fas fa-eye"></i></a>
            <a target="_blank" class="print-bill-btn" href="{{ route('admin.bill.print',$bill->id) }}"><i class="fas fa-print"></i></a>
            <div class="modal fade" id="form-modal" role="dialog">
              <div class="modal-dialog">
      
                  <!-- Modal content-->
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title"></h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div style="padding: 0" class="modal-body">
                      </div>
                  </div>
              </div>
            </div>
          </td>
      </tr>
      @endforeach
  </tbody>
</table>