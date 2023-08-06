<!DOCTYPE html>
<html>
<head>
<title>Email Cảm Ơn Mua Hàng</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
body {
  font-family: Arial, sans-serif;
}

.header {
  background: #007bff;
  padding: 20px;
  color: #fff; 
}

.header h1 {
  margin: 0;
}

.content {
  padding: 20px;  
}

.products th, .products td {
  padding: 10px;
  border: 1px solid #ddd;
  text-align: left;
}

.footer {
  background: #007bff;
  color: #fff;
  padding: 20px;
  text-align: center;
}

.footer a {
  color: #fff;
}
</style>

</head>

<body>

<div class="header">
  <h1>Cảm ơn bạn đã mua hàng!</h1> 
</div>

<div class="content">

  <p>Kính gửi {{$bill->name}},</p>
  
  <p>Cảm ơn bạn đã mua hàng tại COZA Store. Chúng tôi rất vui vì được phục vụ quý khách.</p>

  <p>Đây là chi tiết đơn hàng của bạn:</p>

  <div class="container mt-3">
   <table class="table table-bordered">
       <thead>
           <tr>
               <th>STT</th>
               <th>Tên sản phẩm</th>
               <th>Hình ảnh</th>
               <th>Đơn giá</th>
               <th>Số lượng</th>
               <th>màu</th>
               <th>kích cỡ</th>
               <th>Thành tiền</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($billdetail as $detail)
           <tr>

            <td>{{ $detail->id}}</td>
            <td>{{ $detail->name }}</td>
            <td> <img src="{{ $detail->image ? '' . Storage::url($detail->image) : '' }}"
                    width="50px"></td>
            <td>{{ $detail->price }}</td>
            <td>{{ $detail->quantity }}</td>

            <td>
                <div style="background-color: {{ $detail->color }}; width: 50px; height: 50px"></div>
            </td>
            <td>{{ $detail->size }}</td>
            <td>{{ $detail->total }}</td>

        </tr>
           @endforeach
                   
            

       </tbody>
   </table>
</div>
  
  <p>Tổng giá trị đơn hàng: <strong>{{ $bill->total}}</strong></p>

  <p>Chúng tôi sẽ giao hàng trong vòng 2-3 ngày làm việc kể từ ngày nhận được đơn đặt hàng.</p>

  <p>Nếu bạn có bất kỳ thắc mắc nào, vui lòng liên hệ với chúng tôi.</p>

  <p>Chúc bạn một ngày tốt lành!</p>

  <p>Trân trọng,</p>
  <p>COZA Store</p>

</div>

<div class="footer">
  <p>Liên hệ chúng tôi: <a href="mailto:support@yourstore.com">support@yourstore.com</a></p>
</div>

</body>
</html>