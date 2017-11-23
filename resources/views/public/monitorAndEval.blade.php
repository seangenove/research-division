@extends('layouts.public')

@section('content')
<div class="container">
    <div class="col-md-12">
        <form>
                <div class="form-group">
                    <label for="email"> Q1: Where do you Smoke?</label>
                    <input type="text" class="form-control" id="email">
                </div>

                <div class="form-group">
                    <label for="email"> Q2: Are you in favor of the Non-Smoking Ordinance? Why?</label>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>

            <div class="form-group">
                <label for="email"> Q3: Are you Against Smoking?</label>
                <div class="radio">
                    <label><input type="radio" name="optradio">Yes</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="optradio">No</label>
                </div>
            </div>

            <div class="form-group">
                <label for="email"> Q4: Why do you Smoke?</label>
                <div class="checkbox">
                    <label><input type="checkbox" value="">Feeling irritable‚ on edge‚ grouchy</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="">Feeling down or sad</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="">Having trouble sleeping</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="">Feeling restless and jumpy</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="">Having trouble thinking clearly and concentrating</label>
                </div>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
@endsection