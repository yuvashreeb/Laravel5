<form action="{{URL::route('multipleupload')}}" method="post" enctype="multipart/form-data">
    <input type="file" name="upload[]" multiple/>
    <input type="hidden" name='_token' value="{{csrf_token()}}"/>
    <input type="submit" value="upload"/>
</form>
@if(isset($value))
{{$value}}
@endif