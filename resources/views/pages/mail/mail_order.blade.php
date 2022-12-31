<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-witdh, initial-scale=1.0">
    <!-- link boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="
    sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>

    <body>
        <div class="container" style="background-color: darkorange;height:auto-fit;width:50vw;padding:5px;">
            <div class="col-md-12" style="">
                <p style="text-transform: uppercase;font-weight: 600;font-size: 2rem;text-align: center;border-bottom:1px solid #000;">
                Mail xác nhận đơn hàng từ 3 Sir Company</p>

                <div class="row">

                    <div class="col-md-6 logo" style="padding-top: 5px;">
                        <p>Chào bạn <strong style="color: #000;text-decoration: none">{{$shipping_array['customer_name']}}</strong>,</p>
                    </div>

                    <div class="col-md-12">
                        <h3>Bạn đã đặt hàng với thông tin như sau:</h3>
                        <p>Mã đơn hàng: <strong>{{$code['order_code']}}</strong></p>
                        <p>Mã khuyến mãi được áp dụng: <strong>{{$code['coupon_code']}}</strong></p>

                        <h3>Thông tin người nhận</h3>
                        <p>Email: 
                            @if($shipping_array['shipping_mail'] == '')
                                không có
                            @else
                                <span>{{$shipping_array['shipping_email']}}</span>
                            @endif
                        </p>
                        <p>Họ tên người gửi:
                            @if($shipping_array['shipping_name'] == '')
                                không có
                            @else
                                <span>{{$shipping_array['shipping_name']}}</span>
                            @endif
                        </p>
                        <p>Địa chỉ nhận hàng:
                            @if($shipping_array['shipping_address'] == '')
                                không có
                            @else
                                <span>{{$shipping_array['shipping_address']}}</span>
                            @endif
                        </p>
                        <p>Số điện thoại:
                            @if($shipping_array['shipping_phone'] == '')
                                không có
                            @else
                                <span>{{$shipping_array['shipping_phone']}}</span>
                            @endif
                        </p>
                        <p>Hình thức thanh toán:
                            @if($shipping_array['shipping_method'] == 0)
                                Chuyển khoản ATM
                            @else
                                Tiền mặt
                            @endif
                        </p>
                        <p>Ghi chú:
                            @if($shipping_array['shipping_notes'] == '')
                                không có
                            @else
                                <span>{{$shipping_array['shipping_notes']}}</span>
                            @endif
                        </p>

                        <h3>Sản phẩm đã đặt:</h3>
                        <table class="table table-striped" style="border: 1px; width: 50vw;text-align: center;">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá tiền</th>
                                    <th>Số lượng đặt</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $$sub_total = 0;
                                $total = 0;
                                @endphp

                                @foreach($cart_array as $cart)
                                    @php
                                        $sub_total = $cart['product_qty'] * $cart['product_price'];
                                        $total += $sub_total;
                                    @endphp
                                    <tr>
                                        <td>{{$cart['product_name']}} VND</td>
                                        <td>{number_format({$cart['product_price'],0,',','.')}} VND</td>
                                        <td>{{$cart['product_qty']}}</td>
                                        <td>{number_format($sub_total,0,',','.')}} VND</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="4" align="right">Tổng tiền thanh toán: {{number_format($total,0,',','.')}} VND</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>