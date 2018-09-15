<div class="col-lg-3 col-md-6 mb-4">
    <div class="card h-100">
        <a href="#">
            {{--            <img class="card-img-top" src="{{$product->cover}}" alt="">--}}
            <img class="card-img-top" src="http://placehold.it/700x400"/>
        </a>
        <div class="p-2">
            <h6>
                <a href="#" class="text-dark font-s">{{$product->name}}</a>
            </h6>
            <div class="card-text">
                <div class="mt-2">
                    <span class="badge" style="color:white;background-color: darkgoldenrod">京东商城</span>
                    <span class="badge badge-light">京东自营</span>
                    <span class="badge badge-light">满减</span>
                    <span class="badge badge-light">新人立减</span>
                    <span class="badge badge-light">急速退款</span>
                </div>
                <div class="d-flex">
                    <span class="text-muted">原价</span>
                    <span class="ml-auto text-muted">{{$product->origin_price}}</span>
                </div>
                <div class="d-flex">
                    <span class="text-muted">立减</span>
                    <span class="ml-auto text-danger"><b>-{{$product->bonus}}</b></span>
                </div>
                <div class="d-flex">
                    <span class="text-muted">现价</span>
                    <span class="ml-auto text-danger">{{$product->price}}</span>
                </div>
            </div>
        </div>
        <div class="pl-2 pr-2">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-block btn-raised btn-sm ml-auto">前往jd.com</button>
                </div>
            </div>
        </div>
    </div>
</div>
