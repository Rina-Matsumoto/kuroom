<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>教室追加</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <h3 class="relative w-full text-2xl font-semibold">教室追加</h3>
        @if(session('message'))
            {{session('message')}}
        @endif
        <form action="/admin/create" method="POST">
            @csrf
            <div class="title mt-10">
                <!--<input type="text" name="classroom[classroom_name]" placeholder="教室名"/>-->
                <div class="w-72">
                  <div class="relative h-10 w-full min-w-[200px]">
                    <input
                        type="text"
                        name="classroom[classroom_name]"
                        class="peer h-full w-full rounded-[7px] border border-gray-200 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text--gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-400 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-indigo-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                        placeholder=" "/>
                        <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-pink-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-pink-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-pink-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                            教室名
                        </label>
                  </div>
                </div>
                <br>
            </div>
            <div class="flex flex-row space-x-8">
                <select name="classroom[day_id]" class="flex mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                    @foreach($days as $day)
                    <option value="{{$day->id}}">{{$day->day}}</option>
                    @endforeach
                </select>
                <select name="classroom[time_id]" class="flex mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                    @foreach($times as $time)
                    <option value = "{{$time->id}}" name="classroom[time_id]">{{$time->time}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button class="flex mt-24 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="submit">追加</button>
        </form>
        <div class="footer">
            <button onclick="location.href='/admin/index'" class="flex mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button>
        </div>
    </body>
</html>