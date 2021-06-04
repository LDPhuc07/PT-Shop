                <h2>Hồ sơ của tôi</h2>
                @foreach($arrays as $account)
                <form id="editProfile" data-parsley-validate>
                  @method('PUT')
                  @csrf
                  <input type="hidden" id="user_id" value="{{ $account->id }}">
                  <div class="form-group">
                    <label for="fullname" class="form-label">Tên đầy đủ</label>
                    <input id="fullname" name="ho_ten" type="text" placeholder="VD: Quốc Trung" class="form-control" value="{{ $account->ho_ten }}">
                    <span class="form-message"></span>
                    @if($errors->has('ho_ten'))
                      <span style="font-size: 13px; color:red">
                          <i class="fas fa-times"></i>
                          {{ $errors->first('ho_ten') }}
                      </span>
                      <style>
                          input[name='ho_ten'] {
                              border: 1px solid red;
                          }
                      </style>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control" value="{{ $account->email }}" >
                    <span class="form-message"></span>
                    @if($errors->has('email'))
                      <span style="font-size: 13px; color:red">
                          <i class="fas fa-times"></i>
                          {{ $errors->first('email') }}
                      </span>
                      <style>
                          input[name='email'] {
                              border: 1px solid red;
                          }
                      </style>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="email" class="form-label">Địa chỉ</label>
                    <input id="email" name="dia_chi" type="text" placeholder="VD: 86/2/3 Bình Thạnh TP HCM" class="form-control" value="{{ $account->dia_chi }}" >
                    <span class="form-message"></span>
                    @if($errors->has('dia_chi'))
                      <span style="font-size: 13px; color:red">
                          <i class="fas fa-times"></i>
                          {{ $errors->first('dia_chi') }}
                      </span>
                      <style>
                          input[name='dia_chi'] {
                              border: 1px solid red;
                          }
                      </style>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input id="sdt" name="so_dien_thoai" type="number" placeholder="VD: 089" class="form-control" value="{{ $account->so_dien_thoai }}">
                    <span class="form-message"></span>
                    @if($errors->has('so_dien_thoai'))
                      <span style="font-size: 13px; color:red">
                          <i class="fas fa-times"></i>
                          {{ $errors->first('so_dien_thoai') }}
                      </span>
                      <style>
                          input[name='so_dien_thoai'] {
                              border: 1px solid red;
                          }
                      </style>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="avatar" class="form-label">Cập nhật avatar</label>
                    <input id="avatar" name="avatar" type="file" class="form-control">
                    <span class="form-message"></span>
                  </div>
                  <button type="submit" class="form-submit">Lưu</button>
                </form>
                @endforeach