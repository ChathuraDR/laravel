<!--this $errors variable is build in variable regarding to the validation errors in laravel -->
@if(count($errors->all()))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        <!-- these error messages are hold in resources->lang->en->validation.php file -->
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif