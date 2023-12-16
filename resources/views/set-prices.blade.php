@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Set Price Form') }}</div>

                    <div class="card-body">

                        <form action="{{ route('store-special-prices') }}" method="POST" autocapitalize="off">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="hidden" name="user_id" value="{{ $client->id }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Select Products <span>*</span></label>
                                <select name="product_id[]" id="product" class="form-control product" style="width: 100%"
                                    multiple="multiple" required>
                                    <option value="">Select Option</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('product_id')
                                <div class="error">{{ $message }}</div>
                            @enderror
                            <div class="form-group mb-3">
                                <label for="">Special Price</label><br>
                                <input type="text" name="special_price" style="width:100%;">
                            </div>
                            @error('special_price')
                                <div class="error">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
@endsection
@section('scripts')
    <script type="module">
        $(".product").select2();
    </script>
@endsection
