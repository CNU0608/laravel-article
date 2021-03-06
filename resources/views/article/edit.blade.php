@extends('home.index')

@section('title', '修改article')

@section('content')
    <h1>修改文章：{{ $article->title }}</h1>
    {!! Form::model($article, ['url'=>'article/update']) !!}
    {!! Form::hidden('id',$article->id) !!}}
    <div class="form-group">
        {!! Form::label('title','标题') !!}
        {!! Form::text('title',$article->title,['class'=>'form-control','placeholder'=>'输入标题']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content','正文') !!}
        {!! Form::textarea('content',$article->content,['class'=>'form-control','placeholder'=>'请输入你要发表的内容']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('published','发布日期') !!}
        {!! Form::input('data','published_at',$article->published_at->format('Y-m-d'),['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tag_list','选择标签') !!}
        {!! Form::select('tag_list[]',$tags,null,['class'=>'form-control js-example-basic-multiple','multiple'=>'multiple']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('修改文章',['class'=>'btn btn-success form-control']) !!}
    </div>
    {!! Form::close() !!}
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <script type="text/javascript">
        $(function() {
            $('.js-example-basic-multiple').select2({
                placeholder:"添加标签",
                tags: true
            });
        });
    </script>
@endsection

