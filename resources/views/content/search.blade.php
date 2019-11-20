@extends('content.master')
@section('search')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Search')}}</div>
                    <div class="card-body">
                        <form method="GET" action="{{url('search')}}">
                            <input type="hidden" name="page" value="1">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="manufacture" class=" col-md-3 col-form-label text-md-left">manufacture</label>
                                        <input type="text" class="col-md-9 form-control{{ $errors->has('manufacture') ? ' is-invalid' : '' }}" name="manufacture" value="" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price" class=" col-md-4 col-form-label text-md-left">price</label>
                                        <br/>
                                        <label>Min</label>
                                        <select name="price_min" class="form-group col-md-4">
                                            <option value=" "></option>
                                            <option>5000</option>
                                            <option>10000</option>
                                        </select>
                                        <label> Max</label>
                                        <select name="price_max" class="form-group col-md-4">
                                            <option value=" "></option>
                                            <option>5000</option>
                                            <option>10000</option>
                                            <option>15000</option>
                                            <option>20000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="model_name" class=" col-md-3 col-form-label text-md-left">Model</label>
                                        <input type="text" class="col-md-9 form-control{{ $errors->has('model_name') ? ' is-invalid' : '' }}" name="model" value="" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="year" class=" col-md-4 col-form-label text-md-left">Year</label>
                                        <br/>
                                        <label>From</label>
                                        <select name="year_from" class="form-group col-md-4">
                                            <option value=" "></option>
                                            <option>1995</option>
                                            <option>1996</option>
                                            <option>1997</option>
                                            <option>1998</option>
                                            <option>1999</option>
                                            <option>2000</option>
                                            <option>2001</option>
                                            <option>2002</option>
                                            <option>2003</option>
                                            <option>2004</option>
                                            <option>2005</option>
                                            <option>2006</option>
                                            <option>2007</option>
                                            <option>2008</option>
                                            <option>2009</option>
                                            <option>2010</option>
                                            <option>2011</option>
                                            <option>2012</option>
                                            <option>2013</option>
                                            <option>2014</option>
                                            <option>2015</option>
                                            <option>2016</option>
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                        </select>
                                        <label> To</label>
                                        <select name="year_to" class="form-group col-md-4">
                                            <option value=" "></option>
                                            <option>1995</option>
                                            <option>1996</option>
                                            <option>1997</option>
                                            <option>1998</option>
                                            <option>1999</option>
                                            <option>2000</option>
                                            <option>2001</option>
                                            <option>2002</option>
                                            <option>2003</option>
                                            <option>2004</option>
                                            <option>2005</option>
                                            <option>2006</option>
                                            <option>2007</option>
                                            <option>2008</option>
                                            <option>2009</option>
                                            <option>2010</option>
                                            <option>2011</option>
                                            <option>2012</option>
                                            <option>2013</option>
                                            <option>2014</option>
                                            <option>2015</option>
                                            <option>2016</option>
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="district" class=" col-md-3 col-form-label text-md-left">District</label>
                                        <input type="text" class="col-md-9 form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" name="district" value="" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="colour" class=" col-md-3 col-form-label text-md-left">Colour</label>
                                        <select name="colour" class="form-control col-md-10">
                                            <option value=" "></option>
                                            <option>red</option>
                                            <option>green</option>
                                            <option>orange</option>
                                            <option>yellow</option>
                                            <option>pink</option>
                                            <option>white</option>
                                            <option>violet</option>
                                            <option>brown</option>
                                            <option>sandal</option>
                                            <option>blue</option>
                                            <option>black</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state" class=" col-md-3 col-form-label text-md-left">State</label>
                                        <br/>
                                        <select name="state" class="form-control col-md-9">
                                            <option value=" "></option>
                                            <option>AndhraPradesh</option>
                                            <option>Arunachal Pradesh</option>
                                            <option>Assam</option>
                                            <option>Bihar</option>
                                            <option>Chandigarh</option>
                                            <option>Goa</option>
                                            <option>Gujarat</option>
                                            <option>Haryana</option>
                                            <option>Himachal Pradesh</option>
                                            <option>Jammu and Kashmir</option>
                                            <option>Jharkhand</option>
                                            <option>kerala</option>
                                            <option>Karnataka</option>
                                            <option> Madhya Pradesh</option>
                                            <option>Maharashtra</option>
                                            <option>Manipur</option>
                                            <option>Meghalaya</option>
                                            <option>Mizoram</option>
                                            <option>Nagaland</option>
                                            <option>Odisha</option>
                                            <option>Punjab</option>
                                            <option>Rajasthan</option>
                                            <option>Sikkim</option>
                                            <option>Tamilnadu</option>
                                            <option>Telangana</option>
                                            <option>Tripura</option>
                                            <option>Uttar Pradesh</option>
                                            <option>Uttarakhand</option>
                                            <option>WestBengal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cc" class=" col-md-4 col-form-label text-md-left">CC</label>
                                        <br/>
                                        <label>Min</label>
                                        <select name="cc_min" class="form-group col-md-4">
                                            <option value=" "></option>
                                            <option>5000</option>
                                            <option>10000</option>
                                        </select>
                                        <label> Max</label>
                                        <select name="cc_max" class="form-group col-md-4">
                                            <option value=" "></option>
                                            <option>5000</option>
                                            <option>10000</option>
                                            <option>15000</option>
                                            <option>20000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary ">
                                        {{ __('Search') }}
                                    </button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
