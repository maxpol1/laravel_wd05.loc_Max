<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convert Currency</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        body {
            background: #9d9d9d;
        }

        form {
            background: #fff8e1;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5 pt-5">
            <form action="{{ route('converter') }}" class="border rounded mt-5 pt-5" method="post">
                @csrf

                    <div class="col-md-2 mb-0 text-center">
                        <h4 class="col-md-7 py-2 m-0"> Currency </h4>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <select class="form-select" name="converter_from" required id="#">
                                    @foreach($currencies as $curCode => $currency)
                                    <option value="{{ $curCode }}">{{ $currency['Cur_Name'] }}</option>
                                    @endforeach
{{--                                    <option value="AUD" @if(Request::get('converter_from') =='AUD')--}}
{{--                                         @endif>Australia Dollar</option>--}}
{{--                                    <option value="EUR" @if(Request::get('converter_from') =='AUD')--}}
{{--                                         @endif>Euro</option>--}}
{{--                                    <option value="GBR" @if(Request::get('converter_from') =='AUD')--}}
{{--                                        @endif>Franck</option>--}}
{{--                                    <option value="USD" @if(Request::get('converter_from') =='AUD')--}}
{{--                                        @endif>USD</option>--}}
                                </select>
                            </div>
                            <h4 class="col-md-2 text-center m-0 p-0">To</h4>
                            <div class="col-md-5 mb-3">
                                <select class="form-select" name="converter_to" required id="#">
                                    @foreach($currencies as $curCode => $currency)
                                        <option value="{{ $curCode }}">{{ $currency['Cur_Name'] }}</option>
                                    @endforeach
{{--                                    <option value="AUD" @if(Request::get('converter_to') =='AUD')--}}
{{--                                         @endif>Australia Dollar</option>--}}
{{--                                    <option value="EUR" @if(Request::get('converter_to') =='AUD')--}}
{{--                                        @endif>Euro</option>--}}
{{--                                    <option value="GBR" @if(Request::get('converter_to') =='AUD')--}}
{{--                                       @endif>Franck</option>--}}
{{--                                    <option value="USD" @if(Request::get('converter_to') =='AUD')--}}
{{--                                         @endif>USD</option>--}}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md12">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Amount</label>
                                <input type="number" name="amount" class="form-control"
                                       value="{{ Request::get('amount') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control" value="{{ Request::get('date') }}"
                                       required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>Converted</label>
                            <input type="number" name="amount" value="" disabled>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center mb-4">
                        <button type="submit" class="col-3 btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
