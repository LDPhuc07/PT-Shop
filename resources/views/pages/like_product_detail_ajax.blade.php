@if(Auth::check() and Auth::user()->admin != 1)
            <?php
              $is_liked = false;
            ?>
              @foreach($is_like as $like)
                @if($like->san_phams_id == $sanpham->id)
                  <?php
                  $is_liked = true;
                  ?>
                  @break
                @endif
              @endforeach
              @if($is_liked == true)
                <a onclick="dislike({{ Auth::user()->id }},{{ $sanpham->id }})" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
              @else
                <a onclick="like({{ Auth::user()->id }},{{ $sanpham->id }})" class="header__second__like--icon"><i class="far fa-heart"></i></a>
              @endif
            @else
              <a href="{{ route('accounts.logout') }}" class="header__second__like--icon"><i class="far fa-heart"></i></a>
            @endif