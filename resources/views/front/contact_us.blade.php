@extends('../layouts/nav_footer')
@section('css')
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/contact.css">
@endsection

@section('section')
<section class="contact">
    <div class="container">
        <h2>好康道相報 - 推薦景點</h2>
        <div class="contact_description">
            說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字說明文字
            <ol>
                <li>注意事項</li>
                <li>注意事項</li>
                <li>注意事項</li>
                <li>注意事項</li>
                <li>注意事項</li>
            </ol>
        </div>
        <form method="POST" action="/contact_us_table" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">您的信箱</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">當景點入選時會通知您，並不會另作他用</small>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">您推薦的景點位置</label>
                <select name="location" multiple class="form-control" id="exampleFormControlSelect2">
                  <option>北台灣</option>
                  <option>中台灣</option>
                  <option>南臺灣</option>
                  <option>東台灣</option>
                  <option>離島</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1">上傳照片</label>
                <input name="photo" type="file" class="form-control-file" id="exampleFormControlFile1">
              </div>
              <div class="form-group">
                <label for="exampleInput">景點名稱</label>
                <input name="place_name" type="text" class="form-control" id="exampleInput" aria-describedby="title">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">景點詳述</label>
                <textarea name="place_info" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
            <button type="submit" class="btn btn-primary">送出審查</button>
        </form>
    </div>
</section>
<hr>
@endsection
