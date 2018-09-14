<div class="col-lg-4 col-sm-6 product-container">
    <div class="card h-100">
        <a href="#"><img class="card-img-top" src="{{$product->cover}}" alt=""></a>
        <div class="card-body tiny-card-body">
            <h5>
                <a href="#">{{$product->name}}</a>
            </h5>
            <div class="items">
                <p><span class="item-name">店铺现价</span><span class="item-value">{{$product->origin_price}}</span></p>
                <p><span class="item-name">猫联优惠</span><span class="item-value">-{{$product->bonus}}</span></p>
                <p><span class="item-name">店铺优惠</span><span class="item-value">-n</span></p>
                <p>
                    <span class="item-name">优惠价</span>
                    <span class="item-value color-orange">≤{{$product->price}}</span>
                </p>
                <p><span>京东苹果旗舰店</span> <span>京东商城</span></p>
            </div>
        </div>
        <div class="card-footer">
            <a href="#" class="btn btn-block btn-dark">前往购买</a>
        </div>
    </div>
</div>
