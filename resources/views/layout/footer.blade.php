<footer id="footer" class="p-5 bg-black text-secondary text-center">
    <div class="container">
        <p class="m-0">
            <a href="{{route('feedback')}}" class="text-secondary">{{__('feedback')}}</a>
        </p>
        <p class="m-0">
            Copyright &copy; {{config('app.name')}} {{config('app.domain')}} {{date('Y')}}
        </p>
    </div>
</footer>
