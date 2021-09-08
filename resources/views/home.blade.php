@extends('layout')

@section('title')Short url generate @endsection

@section('contant')
<form action="{{ route('generateUrl') }}" method="post" id="urlForm">
    @csrf
    <label for="originalUrl">Введите ссылку</label>
    <input type="text" placeholder="https://example.com/page"
           name="originalUrl" id="originalUrl">
    <button type="submit" id="btn">Submit</button>
</form>
<button onclick="myFunction('#originalUrl')">Copy text</button>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">

    function myFunction() {
        /* Получить текстовое поле */
        var copyText = document.getElementById("originalUrl");
        /* Выделите текстовое поле */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* Для мобильных устройств */
        /* Скопируйте текст внутри текстового поля */
        document.execCommand("copy");
    }

    $(document).ready(function (){
        $("#btn").click(function (e){
            e.preventDefault();

            var _token = $("input[name='_token']").val();
            var originalUrl = $("#originalUrl").val();

            $.ajax({
                url: "{{ route('generateUrl') }}",
                type: 'POST',
                data: {_token:_token, originalUrl:originalUrl},
                success: function (response){
                    $("#originalUrl").val(response.data.generatedUrl)
                }
            });
        });
    })
</script>
@endsection
