@extends('layouts.backEnd.main')

@section('content')
    <label for="start">Start date:</label>

    <input type="date" class="form-control" id="start" name="trip-start" value="2023-09-07" min="2018-01-01"
        max="2018-12-31" />
@endsection
