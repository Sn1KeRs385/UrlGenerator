@extends('templates.page-template')

@section('content')
    <div class="bg-gray-700 shadow md:rounded-20 px-60 py-30 text-gray-100 w-full md:max-w-3xl">
        <div><b>Статистика по короткой ссылке: <a href="{{$short_url}}" target="_blank">{{$short_url}}</a></b></div>
        @if(!$is_active)
            <div class="mt-5 text-red-500">Истекло</div>
        @endif
        <div class="my-30 w-full h-2 bg-black/25"></div>
        <div class="flex flex-col gap-y-10">
            @foreach($clicks as $click)
                <div class="flex flex-col w-full bg-gray-900 pb-10 pl-15 rounded-10 w-full">
                    <div class="mt-5 mr-5 self-end rounded-15 bg-gray-400 text-14 w-max py-3 px-8">
                        {{$click->created_at->toRfc7231String()}}
                    </div>
                    <div class="mt-5 pr-15">
                        <div><b>Геопозиция: </b> {{$click->geo_info ?? 'не удалось определить'}}</div>
                        <div class="mt-5"><b>UserInfo: </b> {{$click->user_agent}}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
